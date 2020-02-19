@extends('layouts.app', ['title' => __('Parameter Management')])

@section('content')
    @include('parameters.partials.header', ['title' => __('Parameter Management')])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Parameters List') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                              @php
                                    $actions = array(
                                      array(
                                          'title'=>'Add Parameter'
                                        , 'route'=> 'parameters.create'
                                        , 'icon'=>'fa-plus'
                                        , 'color' => 'primary'
                                      ),
                                      array(
                                          'title'=>'Export'
                                        , 'icon'=>'fa-file-excel-o'
                                        , 'color' => 'default'
                                      ),
                                    );
                                  @endphp
                                  @include('layouts.components.actions_list', [ 'actions' => $actions ])
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        @if (session('status'))
                            @include('layouts.components.alerts')
                        @endif
                    </div>

                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">{{ __('ID') }}</th>
                                    <th scope="col">{{ __('Parameter') }}</th>
                                    <th scope="col">{{ __('Description') }}</th>
                                    <th scope="col">{{ __('Value') }}</th>
                                    <!-- <th scope="col">{{ __('Example') }}</th> -->

                                    <th scope="col">{{ __('Creation Date') }}</th>
                                    <th class='text-right' scope="col">{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($parameters as $parameter)
                                    <tr>
                                        <td>{{ $parameter->id }}</td>
                                        <td>{{ $parameter->parameter }}</td>
                                        <td>{{ $parameter->description }}</td>
                                        <td>{{ $parameter->value }}</td>
                                        <!-- <td>{{ $parameter->example }}</td> -->

                                        <td>{{ $parameter->created_at->format('d/m/Y H:i') }}</td>
                                        <td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                  <a class="dropdown-item" href="{{ route('parameters.edit', $parameter) }}"><i class='fa fa-1x fa-pencil' ></i><span>{{ __('Edit') }}</span></a>
                                                  <button type="button" class="dropdown-item" data-toggle="modal" data-target="#modal-notification-{{ $parameter->id }}" >
                                                      <i class='fa fa-1x fa-trash' ></i><span >{{ __('Delete') }}</span>
                                                  </button>
                                                </div>
                                            </div>
                                        </td>
                                        @include('layouts.components.modal_delete', ['model' => $parameter, 'title'=> 'Parameter', 'route'=> 'parameters.destroy'])
                                    </tr>
                                    @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer py-4">
                        <nav class="d-flex justify-content-end" aria-label="...">
                            {{ $parameters->links() }}
                        </nav>
                    </div>
                </div>
            </div>
        </div>



        @include('layouts.footers.auth')
    </div>
@endsection
