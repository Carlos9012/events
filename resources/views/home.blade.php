@extends('layout.main')

@section('title', 'HDC Events')

@section('content')
        <img src="/img/1.png" alt="banner">
        @if(5 < 10)
            <h1>true</h1>
         @endif

         <p>{{$nome}}</p>

         @if($nome == "cadu")
            <h1>nome é igual cadu</h1>
            @endif

        <p>{{$idade}}</p>
        <p>{{$profissao}}</p>

        @for($i = 0; $i < count($arr); $i++)
            <p>{{ $arr[$i] }} - {{$i}}</p>
            @if($i == 2)
                <p>i = 20</p>
            @endif
        @endfor

        @php
            echo "olá";
        @endphp

        @foreach($grupo as $grupos)
            <p>{{ $loop->index }}</p>
            <p>{{ $grupos }}</p>
        @endforeach

        {{-- oi --}}
@endsection