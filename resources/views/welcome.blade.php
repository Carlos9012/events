@extends('layout.main')

@section('title', 'HDC Events')

@section('content')        

 <div id="search-container" class="col-md-12">
    <h1>busque um evento</h1>
     <form action="/" method="GET">
         <input type="text" name="search" id="search" class="form-control" placecholder="procurar...">
    </form>
</div>
<div id="events-container" class="col-md-12">
    @if($search)
    <h2>buscando por: {{$search}}</h2>
    @else
    <h2>proximos eventos</h2>
    @endif
    <p>veja os evento dos proximos dias</p>
    <div id="cards-container" class="row">
        @foreach($events as $event)
            <div class="card col-md-3">
                <img src="/img/events/{{$event->image}}" alt="{{$event->title}}">
                <div class="card-body">
                    <p class="card-date">{{date('d/m/y', strtotime($event->date))}}</p>
                    <h5 class="card-title">{{$event->title}}</h5>
                    <p class="card-participants">{{count($event->users)}}</p>
                    <a href="/events/{{$event->id}}" class="btn btn-primary">click</a>
                </div>
            </div>
        @endforeach
        @if(count($events) == 0 && $search)
            <p>não foi possível encontrar nenhum evento com {{$search}}! <a href="/">ver todos!</a></p>
        @elseif(count($events) == 0)
            <p>não há eventos disponíveis</p>
        @endif
    </div>
</div>
</div>
@endsection