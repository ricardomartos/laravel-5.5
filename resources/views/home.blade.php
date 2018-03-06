@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard @lang('messages.title')</div>
                
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                    <div class="row">
                        <div class="panel-body small">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    {{ Config::get('languages')[App::getLocale()] }}
                                </a>
                                <ul class="dropdown-menu">
                                    @foreach (Config::get('languages') as $lang => $language)
                                        @if ($lang != App::getLocale())
                                            <li>
                                                <a href="{{ route('lang.switch', $lang) }}">{{$language}}</a>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </li>
                            {{--  {!! Form::open(['method' => 'POST', 'route' => 'route.language', 'class' => 'form-inline navbar-select']) !!}

                            <div class="form-group @if($errors->first('locale')) has-error @endif">
                                <span aria-hidden="true"><i class="fa fa-flag"></i></span>
                                {!! Form::select(
                                    'locale',
                                    ['en' => 'EN', 'es' => 'ES'],
                                    \App::getLocale(),
                                    [
                                        'id'       => 'locale',
                                        'class'    => 'form-control',
                                        'required' => 'required',
                                        'onchange' => 'this.form.submit()',
                                    ]
                                ) !!}
                                <small class="text-danger">{{ $errors->first('locale') }}</small>
                            </div>
                        
                            <div class="btn-group pull-right sr-only">
                                {!! Form::submit("Change", ['class' => 'btn btn-success']) !!}
                            </div>
                        
                            {!! Form::close() !!}  --}}

                        {{--  {!! Form::open(['route' => 'route.language']) !!}
                        {!! Form::select('language', array('es' => 'Español', 'en' => 'Ingles')) !!}
                        {!! Form::submit('Enviar') !!}
                        {!! Form::close() !!}  --}}
                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
