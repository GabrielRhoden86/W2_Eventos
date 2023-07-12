@extends('layouts.main')
@section('title', 'Editando:'.$event->title)
@section('content')
    <div id="event-creat-container" class="col-md-6 offset-md-3">
        <form action="/events/update/{{$event->id}}" method="POST" enctype="multipart/form-data" id="form-create-event">
            <h3 class="text-center">Editanto: {{$event->title}}</h3>
            @csrf
            @method('PUT')
            <div class="mb-3 ">
                <label for="image" class="text-muted">Imagem do evento:</label>
                <input type="file" id="image" name="image" class="form-control-file btn-sm btn-primary">
                <img src="/img/events/{{$event->image}}" alt="{{$event->image}}" class="img-preview mt-2 rounded">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="title" name="title" value="{{$event->title}}">
            </div>
            <div class="form-group d-flex">
                <small class="d-flex flex-column justify-content-center p-1">Data:</small>
                    <input type="datetime-local" class="form-control" id="date" name="date" value="{{$event->date}}">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="city" name="city" value="{{$event->city}}">
            </div>
            <div class="form-group">
                <select name="private" id="private" class="form-control">
                    <option value="0">Não</option>
                    <option {{$event->private == 1 ? "select =='select'": "";}} value="1">Sim</option>
                </select>
            </div>
            <div class="form-group">
                <textarea name="description" id="description" class="form-control" value="{{$event->description}}">{{$event->description}}</textarea>
            </div>
            <div class="form-group">
                <label for="title" class="text-muted">Adicione os items da infraestrutura</label>
                <div class="form-group">
                    <input type="checkbox" name="items[]" value="cadeiras"> Cadeira
                </div>
                <div class="form-group">
                    <input type="checkbox" name="items[]" value="palco"> Palco
                </div>
                <div class="form-group">
                    <input type="checkbox" name="items[]" value="cerveja"> Cerveja
                </div>
                <div class="form-group">
                    <input type="checkbox" name="items[]" value="brindes"> Brindes
                </div>
            </div>
            <input type="submit" class="btn btn-primary" value="Editar Evento">
        </form>
    </div>
@endsection
