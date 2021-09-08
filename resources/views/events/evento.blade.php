@extends('layout.main')

@section('title', 'evento')

@section('content')
    <h1>evento</h1>

    @foreach($events as $event)
        <p>{{$event->title}} -- {{$event->description}}</p>
    @endforeach
@endsection