@extends('layouts.master')

@section('title', 'Bookworm')

@section('navbar')
<div class="col-12 navbar-wrapper">
    <div class="navbar-links">
    </div>
    <div class="navbar-logo">
        <i class="fas fa-book"></i>
        <a class="navbar-title" href="/">Bookworm</a>
    </div>
    <div class="navbar-links">
        <ul>
            <li class="navbar-login-btn">
                <img class="profile-img" src="https://image.ibb.co/kw9Sby/person_flat.png"/>
                <a href="{{ url('loginpage')}}">Log In</a>
            </li>
            <li><a href="#">Our support</a></li>
            <li><a href="#home">Help Center</a></li>
        </ul>
    </div>
</div>

@endsection

@section('sidebar')
<div class="col-2 left-sidebar">
    <div class="sidebar-add-book">
        <a href="#" class="btn btn-add-book"><span class="fa fa-plus"></span>&ensp;ADD A BOOK</a>
    </div>
    <hr class="sidebar-divider"/>
    <div class="sidebar-main-nav">
        <ul>
            <li class="my-nav-item">
                <span class="fas fa-globe-asia"/>&ensp;
                <a href="#" class="{{ url()->current()==url('/')?'active':''}}">Browse</a>
            </li>
            <li class="my-nav-item">
                <span class="fa fa-book "/>&ensp;
                <a href="/aa" class="{{ url()->current()==url('#')?'active':''}}">Waiting</a>
            </li>
            <li class="my-nav-item">
                <span class="fas fa-star"/>&ensp;
                <a href="#" class="{{ url()->current()==url('/#')?'active':''}}">Favourite Books</a>
            </li>
            <li class="my-nav-item">
                <span class="fas fa-list-ul"/>&ensp;
                <a href="#" class="{{ url()->current()==url('/aa')?'active':''}}">Wishlist</a>
            </li>
            <li class="my-nav-item">
                <span class="fas fa-history"/>&ensp;
                <a href="#" class="{{ url()->current()==url('/#')?'active':''}}">History</a>
            </li>
        </ul>
    </div>
    <hr class="sidebar-divider"/>
    <div class="sidebar-categories">
        <ul>
            <li class="my-nav-item red-bullet-color">
                <a href="#">Must Read Titles</a>
            </li>
            <li class="my-nav-item orange-bullet-color">
                <a href="#">Best of List</a>
            </li>
            <li class="my-nav-item blue-bullet-color">
                <a href="#">Classic Novels</a>
            </li>
            <li class="my-nav-item purple-bullet-color">
                <a href="#">Non Fiction</a>
            </li>
        </ul>
    </div>
    <hr class="sidebar-divider"/>
    <div class="sidebar-history-list">
        <ul>
            <li class="my-history-item">
                <div class="fas fa-history history-list-icon"></div>&ensp;
                <div class="history-list-content">
                    You added Fight Club by Chuck Palahniuk to your Must Read Titles
                </div>
            </li>
            <li class="my-history-item">
                <div class="fas fa-history history-list-icon"></div>&ensp;
                <div class="history-list-content">
                    You added Fight Club by Chuck Palahniuk to your Must Read Titles
                </div>
            </li>
        </ul>
    </div>
</div>
@endsection

@section('content')
    <div class="col-10 login-page">
        <div class="row">
            <div class="col-6 login-section">
                <h4 class="login-title">Login In</h4>
                <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                    @csrf
                    <div class="loginImgContainer">
                        <img src="https://image.ibb.co/kw9Sby/person_flat.png" alt="Avatar" class="avatar">
                    </div>

                    <label for="email"><b>{{ __('E-Mail Address') }}:</b></label>


                    <input id="email" type="email" class="form-control {{$errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Enter Email" required autofocus>

                    @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif

                    <label for="password"><b>{{ __('Password') }}:</b></label>
                    <input id="password" type="password" class="form-control {{$errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Enter Password" required>

                    @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                    @endif

                    <button type="submit" class="login-btn">
                        {{ __('Login') }}
                    </button>
                    <label>
                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}
                    </label>

                    <span class="psw">Forgot<a class="psw" href="{{ route('password.request') }}">
                        Password ?
                    </a></span>
                </form>
            </div>
            <div class="col-6 signup-section">
                <h4 class="signup-title">Sign Up</h4>
                <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                    @csrf
                    <div class="loginImgContainer">
                        <img src="https://image.ibb.co/kw9Sby/person_flat.png" alt="Avatar" class="avatar">
                    </div>

                    <label for="name">{{ __('Name') }}</label>
                    <input id="name" type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                    @if ($errors->has('name'))
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif

                    <label for="email">{{ __('E-Mail Address') }}</label>
                    <input id="emailSignup" type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                    @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif

                    <label for=>{{ __('Password') }}</label>
                    <input id="passwordSignup" type="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                    @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif

                    <label for="password-confirm">{{ __('Confirm Password') }}</label>
                    <input id="password-confirm" type="password" name="password_confirmation" required>

                    <button type="submit" class="signup-btn">
                        {{ __('Register') }}
                    </button>
                </form>
            </div>
        </div>
    </div>

@endsection

@section('footer')
<div class="col-12 footer-section">
    <div class="footer-item footer-settings">
        <i class="fas fa-cog"></i>
    </div>
    <div class="footer-item footer-help">
        <i class="fas fa-question-circle"></i>
    </div>
</div>
@endsection


