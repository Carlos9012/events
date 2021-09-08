@extends('layout.main')

@section('title', 'Criar evento')

@section('content')
    <div id="event-create-container" class="col-md-6 offset-md-3">
        <h1>crie seu evevnto</h1>
        <form action="/events" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="title">imagem do evento</label>
                <input type="file" id="image" name="image" class="from-control-file">
            </div>
            <div class="form-group">
                @csrf
                <label for="title">evento:</label>
                <input type="text" name="title" id="title" class="form-control" placeholder="nome">
            </div>
            <div class="form-group">
                <label for="date">data do evento:</label>
                <input type="date" name="date" id="date" class="form-control">
            </div>
            <div class="form-group">
                <label for="title">cidade:</label>
                <input type="text" name="city" id="city" class="form-control" placeholder="nome da cdade" >
            </div>
            <div class="form-group">
                <label for="title">o evento é privado:</label>
                <select name="private" id="private" class="form-control">
                    <option value="0">não</option>
                    <option value="1">sim</option>
                </select>
                </div>
            <div class="form-group">
                <label for="title">descrição:</label>
                <textarea name="description" id="description" class="form-control" placeholder="descrição"></textarea>
            </div>
            <div class="form-group">
                <label for="title">adicione intes de infra estrutura:</label>
                <div class="form-group">
                    <input type="checkbox" name="items[]" value="cadeiras">cadeiras
                </div>
                <div class="form-group">
                    <input type="checkbox" name="items[]" value="palco">palco
                </div>
                <div class="form-group">
                    <input type="checkbox" name="items[]" value="cervaja grátis">cervaja grátis
                </div>
                <div class="form-group">
                    <input type="checkbox" name="items[]" value="open food">open food
                </div>
                <div class="form-group">
                    <input type="checkbox" name="items[]" value="brindes">brindes
                </div>
            </div>
            <input type="submit" class="btn btn-primary" value="criar">
        </form>
    </div>
@endsection