@extends('layouts.content')

@section('body')

<h1>Сервис по добавлению своих паст</h1>

<a href="{{ route('create') }}" class="btn btn-dark">Добавить новую</a>

<form action="/index" method="GET">
    <div class="form-group">
        <label for="search">Поиск по имени или содержанию</label>
        <input type="text" name="search" id="search" placeholder="Поиск" class="form-control col-8">
    </div>
    <button type="submit" class="btn btn-dark">
        Поиск
    </button>
</form>

@if(session('status'))
    <div class="alert alert-success col-8">
        <p>Добавление успешно произведено!</p>
        Ссылка: {{ session('status') }}
    </div>
@endif

@includeWhen(!empty($items), 'pasta.searching', ['items' => $items])

@endsection