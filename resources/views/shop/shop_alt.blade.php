@extends('layouts.template')
@section('title', 'Shop')

@section('main')
    <h1>Shop -alternative listing</h1>
    <hr>
    <div>
        @foreach($genres as $genre)
            <h2 class="d-block">
                    {{ $genre->name }}
            </h2>
            <ul>
            @foreach($records as $record)
                @if($genre->id==$record->genre_id)
                    <li><a href="shop/{{ $record->id }}">{{ $record->artist." - ".$record->title }}</a> | Price: € {{ number_format($record->price,2)." | Stock: ".$record->stock }}</li>
                    @endif
            @endforeach
            </ul>
        @endforeach
    </div>
@endsection
