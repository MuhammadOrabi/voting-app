@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-8 p-5">
            <div class="card">
                <div class="card-block">
                    <h4 class="card-title text-center">Login</h4><hr>
                    @if ($errors->has('msg'))
                        <div class="alert alert-danger" role="alert">
                            {{ $errors->first('msg') }}
                        </div>
                    @endif
                    <form class="form-group" role="form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group row {{ $errors->has('email') ? ' has-danger' : '' }}">
                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input id="email" type="email" class="form-control form-control-danger"
                                    name="email" value="{{ old('email') }}" required autofocus>
                                @if ($errors->has('email'))
                                    <div class="form-control-feedback">{{ $errors->first('email') }}</div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row {{ $errors->has('password') ? ' has-danger' : '' }}">
                            <label for="password" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                                <input id="password" type="password" class="form-control form-control-danger"
                                    name="password" value="{{ old('password') }}" required>
                                @if ($errors->has('password'))
                                    <div class="form-control-feedback">{{ $errors->first('password') }}</div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 push-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 push-3">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
