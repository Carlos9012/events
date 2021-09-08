@extends('layout.main')

@section('title', 'Dashboard')

@section('content') 

    <div class="col-md-10 offset-md-1 dashboard-title-container">
        <h1>meus eventos</h1>
    </div>
    <div class="col-md-10 offset-md-1 dashboard-events-container">
        @if(count($events) > 0)
        @else
            <p>vc ainda não tem eventos, <a href="/create">criar evento</a></p>
        @endif
    </div>

@endsection