<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;
use App\Http\Requests\clientRequest;
use App\client;

class clientController extends Controller{
  public function index(){
    $clients = client::latest()->get();
    return response()->json($clients);
  }//end function

  public function store(clientRequest $request){
    $request = Request::merge(array_map("trim", $request->all()));
    $client = client::create($request->all());
    return response()->json($client, 201);
  }//end function

  public function show($id){
    $client = client::findOrFail($id);
    return response()->json($client);
  }//end function

  public function update(clientRequest $request, $id){
    $client = client::findOrFail($id);
    $client->update($request->all());
    return response()->json($client, 200);
  }//end function

  public function destroy($id){
    client::destroy($id);
    return response()->json(null, 204);
  }//end function
}//end class
