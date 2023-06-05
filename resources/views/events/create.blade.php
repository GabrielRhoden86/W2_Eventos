@extends('layouts.main')
@section('title', 'Crie Um Evento')
@section('content')


    <div id="event-creat-container" class="col-md-6 offset-md-3">
        <h3>Crie seu evento</h3>
        <form action="/events" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="image">Imagem do evento:</label>
                <input type="file" id="image" name="image" class="form-control-file">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="title" name="title" placeholder="Nome do Evento">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="city" name="city" placeholder="Nome do Cidade">
            </div>
            <div class="form-group">
                <select name="private" id="private" class="form-control">
                    <option value="0">Não</option>
                    <option value="1">Sim</option>
                </select>
            </div>
            <div class="form-group">
                <textarea name="description" id="description" class="form-control" placeholder="O que vai acontecer no Evento?"></textarea>
            </div>
            <input type="submit" class="btn btn-primary" value="Criar Evento">
        </form>
    </div>

@endsection
