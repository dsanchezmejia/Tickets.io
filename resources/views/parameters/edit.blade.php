@extends('layouts.app', ['title' => __('Parameter Management')])

@section('content')
    @include('parameters.partials.header', ['title' => __('Edit Parameter')])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Parameter Management') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('parameters.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('parameters.update', $parameter) }}" autocomplete="off">
                            @csrf
                            @method('put')

                            <h6 class="heading-small text-muted mb-4">{{ __('Parameter information') }}</h6>
                            <div class="pl-lg-4">
                                <!-- Example
                                <div class="form-group{{ $errors->has('**field**') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-**field**">{{ __('**Field**') }}</label>
                                    <input type="text" name="**field**" id="input-**field**" class="form-control form-control-alternative{{ $errors->has('**field**') ? ' is-invalid' : '' }}" placeholder="{{ __('**Field**') }}" value="{{ old('**field**', $parameter->**field**) }}" required autofocus>

                                    @if ($errors->has('**field**'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('**field**') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                -->



                                <div class="text-center">
                                  <button type="submit" class="btn btn-icon btn-3 btn-success mt-4">
                                    <span class='btn-inner--icon'><i class='fa fa-save'></i></span>
                                    <span class='btn-inner--text'>{{ __('Save') }} </span>
                                  </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection
