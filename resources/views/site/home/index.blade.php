@extends('site.layouts.master')

@section('content')

<div class="flex-center position-ref full-height">
            
    @if (Route::has('login'))

        <div class="top-right links">

            @auth
                <a href="{{ url('/admin') }}">Home</a>
            @else

                <a href="{{ route('login') }}">Login</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
                @endif

            @endauth

        </div>

    @endif

    <div class="content">

        <div class="title m-b-md">
            Laravel Repositories
        </div>

        <div class="links">
            <a href="https://github.com/ezequieldhonatan/laravel-repositories">GitHub</a>
            <a href="https://www.linkedin.com/in/ezequieldhonatan/">LinkedIn</a>
        </div>

    </div> <!-- container -->

</div> <!-- flex-center position-ref full-height -->

@endsection