@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-8 p-5">
            <div class="card">

                <div class="card-block">
                    <h4 class="card-title text-center">Reset Password</h4>
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="form-horizontal" role="form" method="POST" action="{{ route('password.request') }}">
                        {{ csrf_field() }}

                        <input type="hidden" name="token" value="{{ $token }}">

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

                        <div class="form-group row {{ $errors->has('password_confirmation') ? ' has-danger' : '' }}">
                            <label for="password-confirm" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                                <input id="password-confirm" type="password" class="form-control form-control-danger" name="password_confirmation"  required>
                                @if ($errors->has('password_confirmation'))
                                    <div class="form-control-feedback">{{ $errors->first('password_confirmation') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 push-4">
                                <button type="submit" class="btn btn-primary">
                                    Reset Password
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
