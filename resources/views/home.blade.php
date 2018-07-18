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
                @if (Route::has('login'))
                @auth
                    <li class="dropdown">
                        <a class="dropdown-toggle" id="dropdownMenuButton" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu  dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <a class="dropdown-item" href="/profile">
                                Profile
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @else
                <li class="navbar-login-btn">
                    <img class="profile-img" src="https://image.ibb.co/kw9Sby/person_flat.png"/>
                    <a href="{{ url('loginpage')}}">Log In</a>
                </li>
                @endauth
                @endif
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
    <div class="col-10 main-section">
        <div class="top-section">
            <h5 class="page-title">Browse Available Books</h5>
            <div class="top-buttons-section">
                <a href="#" class="btn top-button-item top-btn-activated">All Books</a>
                <a href="#" class="btn top-button-item">Most Recent</a>
                <a href="#" class="btn top-button-item">Most Popular</a>
                <div class="search-section">
                        <input class="form-control search-input" type="search" placeholder="Enter Keywords">
                </div>
            </div>
        </div>
        <div class="main-content">
            @foreach ($books as $book)
            <div class="col-2 book-item">
                <img class="img-fluid book-img" src="{{$book->image}}"/>
                <div class="book-info">
                    <span class="book-name">{{$book->name}}</span></br>
                    <span class="book-author">by {{$book->author}}</span></br>
                    <span class="book-isbn">isbn: {{$book->isbn}}</span>
                </div>
            </div>
            @endforeach
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


