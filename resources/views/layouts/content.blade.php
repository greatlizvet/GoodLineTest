@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-3">
        <h3>Последние добавленные пасты:</h3>
        <ul>
            @foreach($pastas as $pasta)
                <li><a href="/{{ $pasta->hash }}">{{ $pasta->name }}</a></li>
            @endforeach
        </ul>
        @auth
            <h3>Последние ваши пасты:</h3>
            <ul>
                @foreach($userPastas as $up)
                    <li><a href="/{{ $up->hash }}">{{ $up->name }}</a></li>
                @endforeach
            </ul>
        @endauth
    </div>
    <div class="col-9">
        @yield('body')
    </div>
</div>

@endsection