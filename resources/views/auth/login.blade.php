@extends('layouts.main')

@section('contenido')
    <section id="form"><!--form-->
        <div class="container">
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    @if (count($errors)>0)
                        <ul>
                        @foreach ($errors->all() as $error)
                            <li><span class="help-block">
                                    <strong>{{$error}}</strong>
                                </span>
                            </li>
                        @endforeach
                        </ul>
                    @endif
                </div>
            </div>
            
            <div class="row">
                <div class="col-sm-4 col-sm-offset-1">
                    <div class="login-form"><!--login form-->
                        <h2>Login to your account</h2>
                        <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <input id="email" type="email" name="email" placeholder="E-Mail Address" required autofocus>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <input id="password" type="password" name="password" placeholder="Password" required>
                        </div>
                            <span>
                                <input type="checkbox" class="checkbox"> 
                                Keep me signed in
                            </span>
                            <button type="submit" class="btn btn-default">Login</button>
                        </form>
                    </div><!--/login form-->
                </div>
                <div class="col-sm-1">
                    <h2 class="or">OR</h2>
                </div>
                <div class="col-sm-4">
                    <div class="signup-form"><!--sign up form-->
                        <h2>New User Signup!</h2>
                        <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <input id="name" type="text" name="name" placeholder="Name" value="{{ old('name') }}" required autofocus>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <input id="email" type="email" name="email" placeholder="E-Mail Address" value="{{ old('email') }}" required>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

                                <input id="password" type="password" name="password" placeholder="Password" required>
                        </div>

                        <div class="form-group">
                                <input id="password-confirm" type="password" placeholder="Confirm Password" name="password_confirmation" required>
                        </div>

                            <button type="submit" class="btn btn-default">Signup</button>
                        </form>
                    </div><!--/sign up f>
orm-->
        </div>
    </section><!--/form-->
@endsection
