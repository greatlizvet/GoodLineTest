@extends('layouts.content')

@section('body')

<h1>Паста: {{ $pasta->name }}</h1>
<p>Дата создания: {{ $pasta->create_date }}</p>
<p>Статус: {{ $pasta->private }}</p>
<p>{{ $pasta->body }}</p>
@if(Auth::user()->id === $pasta->user_id && !$pasta->private)
    <a class="btn btn-dark" href="/update/{{ $pasta->id }}">Сделать приватной</a>
@endif

@endsection

