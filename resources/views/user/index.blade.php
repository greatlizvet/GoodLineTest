@extends('layouts.content')

@section('body')

<p>Имя пользователя: </p>
<p>{{ $user->name }}</p>
<p>Email: </p>
<p>{{ $user->email }}</p>
<p>Пользовательские пасты:</p>
<ul>
    @foreach($allUserPastas as $aup)
        <li><a href="/{{ $aup->hash }}">{{ $aup->name }}</a></li>
    @endforeach
</ul>

{{ $allUserPastas->links() }}

@endsection