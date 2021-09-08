@extends('layout.main')

@section('title', 'HDC Events')

@section('content')
    @if($id != null)
        <p>exibindo produto id: {{ $id }}</p>
    @endif
@endsection