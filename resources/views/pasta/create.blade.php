@extends('layouts.content')

@section('body')

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="/store" method="POST">
    @csrf
    <input type="hidden" name="user_id", id="user_id" value="{{ Auth::user()->id }}">
    <div class="form-group">
        <label for="name">Название пасты</label>
        <input type="text" name="name" id="name" class="form-control col-6">
    </div>
    <div class="form-group">
        <label for="syntax">Язык</label>
        <select name="syntax" id="syntax" class="form-control col-6">
            @foreach($syntax as $key => $syn)
                <option value="{{ $key }}">{{ $syn }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="body">Содержание пасты</label>
        <textarea class="form-control col-6" name="body" id="body" rows="5"></textarea>
    </div>
    <div class="form-group">
        <label for="time">Срок жизни пасты</label>
        <select name="time" id="time" class="form-control col-6">
            @foreach($intervals as $interval)
                <option value="{{ $interval['value'] }}">{{ $interval['text'] }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="status">Доступность пасты</label>
        <select name="status" id="status" class="form-control col-6">
            @foreach($statuses as $status)
                <option value="{{ $status['value'] }}">{{ $status['text'] }}</option>
            @endforeach
        </select>
    </div>
    
    <button type="submit" class="btn btn-dark">Добавить</button>
</form>

@endsection