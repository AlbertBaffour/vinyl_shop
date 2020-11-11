@extends('layouts.template')

@section('title', 'Itunes')

@section('main')
    <h1>iTunes <small>{{$songs->title." - ".strtoupper($songs->country)}}</small></h1>
    <div class="row align-items-stretch">
        @foreach($songs->results as $song)
        <div class="d-flex col-md-6 col-lg-4 col-xl-3">
            <div class="w-100 card mb-3 shadow">
                <img src="{{$song->artworkUrl100}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{$song->artistName}}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">{{$song->name}}</h6>
                    <hr>
                    <p>
                        <span class="text-muted">Genre</span>: {{$song->genres[0]->name}}<br>
                        <span class="text-muted">Artist URL</span>: <a href="{{$song->artistUrl}}"
                                                                       target="_blank">{{$song->artistName}}</a><br>
                    </p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <p>Last updated: {{ Carbon\Carbon::parse($songs->updated)->toFormattedDateString() }} </p>
@endsection
