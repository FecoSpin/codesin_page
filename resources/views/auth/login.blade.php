<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{config('app.name')}} | Sign in</title>
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('favicon-16x16.png')}}">
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,400i,600,700,800,900" rel="stylesheet">
    <link href="dashboard/css/themes/lite-purple.min.css" rel="stylesheet">
</head>
<div class="auth-layout-wrap bg-gray">
    <div class="auth-content">
        <div class="card o-hidden">
            <div class="row">
                <div class="col-md-12">
                    <div class="p-4">
                        <div class="auth-logo text-center mb-4"><img src="dashboard/images/logo/logo.png" alt=""></div>
                        <h1 class="mb-3 text-center  text-18">Ingresar</h1>
                        <form method="POST" action="{{ route('login') }}" >
                            @csrf
                            <div class="form-group" {{ $errors->has('email' ? 'has-error' : '') }}>
                                <label for="email" class="{{ $errors->has('email') ? 'has-error' :'' }}">Email</label>
                                <input class="form-control form-control" id="email" name="email" type="email" value="{{ old('email') }}" required autofocus>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    
                                @endif
                            </div>
                            <div class="form-group" {{ $errors->has('password' ? 'has-error' : '') }}>
                                <label for="password" class="{{ $errors->has('password' ? 'has-error' : '') }}">Contraseña</label>
                                <input class="form-control form-control" id="password" name="password" type="password">
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    
                                @endif
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <label class="checkbox checkbox-primary">
                                        <input type="checkbox" name="remenber" {{ old('remenber') ? 'checked' : '' }}><span>Remember me</span><span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block mt-2">Ingresar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
  .help-block strong, .has-error {  color: red !important;}
  .bg-gray { background: #f4f4f4}
</style>
