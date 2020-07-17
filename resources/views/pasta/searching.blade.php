<ul>
    @foreach($items as $item)
        <li><a href="/{{ $item->hash }}">{{ $item->name }}</a></li>
    @endforeach
</ul>