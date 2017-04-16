@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-8 p-5">
            <div class="card">
                <div class="card-block">
                    <h4 class="card-title text-center">Register</h4><hr>
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}
                        <div class="form-group row {{ $errors->has('name') ? ' has-danger' : '' }}">
                            <label for="name" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input id="name" type="text" class="form-control form-control-danger"
                                    name="name" value="{{ old('name') }}" required autofocus>
                                @if ($errors->has('name'))
                                    <div class="form-control-feedback">{{ $errors->first('name') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row {{ $errors->has('email') ? ' has-danger' : '' }}">
                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input id="email" type="email" class="form-control form-control-danger"
                                    name="email" value="{{ old('email') }}" required>
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
                        <div class="form-group row">
                            <label for="password-confirm" class="col-sm-2 col-form-label">Confirm Password</label>

                            <div class="col-md-10">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 push-5">
                                <button type="submit" class="btn btn-primary">
                                    Register
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
