<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;
use App\Http\Requests\ParameterRequest;
use App\Parameter;
use Auth;

class ParameterController extends Controller{

  public function index(Parameter $model){
    return view('parameters.index', ['parameters' => $model->paginate(15)]);
  }//end function

  public function create()  {
      return view('parameters.create');
  }//end function
  public function edit(Parameter $parameter){
      return view('parameters.edit', compact('parameter'));
  }//end function


  public function store(ParameterRequest $request){
    $request->request->add(['insert_user_id' => Auth::user()->id]);
    $merge_request = Request::merge(array_map('trim', $request->all()));

    $valid_request = $merge_request->validate([
      'parameter' => 'required|unique:parameters|max:16',
      'description' => 'required|max:64',
      'value' => 'required|max:16',
      'insert_user_id' => 'required'
    ]);

    $parameter = Parameter::create($valid_request);
    return redirect()->route('parameters.index')->with([
       'status' => __('Parameter created.')
      ,'type'=>'success'
      ,'strong' => __('Success').'!'
      ,'icon' => 'fa-check'
    ]);

  }//end function

  //for json response
  /*public function index(){
    $parameters = Parameter::latest()->get();
    return response()->json($parameters);
  }//end function*/

  //for json response
  /*public function store(ParameterRequest $request){
    $request = Request::merge(array_map("trim", $request->all()));
    $parameter = Parameter::create($request->all());
    return response()->json($parameter, 201);
  }//end function*/

  public function show($id){
    $parameter = Parameter::findOrFail($id);
    return response()->json($parameter);
  }//end function

  public function update(ParameterRequest $request, $id){
    $request->request->add(['update_user_id' => Auth::user()->id]);
    $parameter = Parameter::findOrFail($id);
    $parameter->update($request->all());
    //$parameter->update(['update_user_id', Auth::user()->id]);
    return redirect()->route('parameters.index')->with([
       'status' => __('Parameter updated.')
      ,'type'=>'success'
      ,'strong' => __('Success').'!'
      ,'icon' => 'fa-check'
    ]);
    //return response()->json($parameter, 200);
  }//end function

  public function destroy($id){
    Parameter::destroy($id);
    return redirect()->route('parameters.index')->with([
       'status' => __('Parameter deleted.')
      ,'type'=>'default'
      ,'strong' => __('Success').'!'
      ,'icon' => 'fa-warning'
    ]);
    //return response()->json(null, 204);
  }//end function
}//end class
