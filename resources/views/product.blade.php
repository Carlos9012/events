@extends('layout.main')

@section('title', 'HDC Events')

@section('content')
    <h1>product</h1>
    @if($busca != '')
        <p>o usuario esá buscando por: {{$busca}}</p>
    @endif
@endsection