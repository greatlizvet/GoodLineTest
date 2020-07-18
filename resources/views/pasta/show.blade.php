@extends('layouts.content')

@section('body')

<h1>Паста: {{ $pasta->name }}</h1>
<p>Дата создания: {{ $pasta->create_date }}</p>
<div id="editor" data-syntax="{{ $pasta->syntax }}"></div>
<p style="display: none;" id="pasta-body">{{ $pasta->body }}</p>
@if(Auth::user()->id === $pasta->user_id && !$pasta->private)
    <a class="btn btn-dark" href="/update/{{ $pasta->id }}" style="margin-top: 10px;">Сделать приватной</a>
@endif

@endsection

