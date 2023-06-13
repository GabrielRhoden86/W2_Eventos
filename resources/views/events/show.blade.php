@extends('layouts.main')
@section('title', $event->title)
@section('content')

<div class="col-md-10 offset-md-1">
 <div class="row">
  <div class="col-md-6" id="image-container">
    <img src="/img/events/{{$event->image}}" alt="{{$event->title}}" class="img-flui w-75 pt-3">
  </div>
  <div class="info-container col-md-6">
    <h1>{{$event->title}}</h1>
    <p class="event-city"><ion-icon name="location-outline"></ion-icon>{{$event->city}}</p>
    <p class=""><ion-icon name="calendar"></ion-icon>{{$event->date}}</p>
    <p class="event-participants"><ion-icon name="people-outline"></ion-icon>200 Participantes</p>
    <p class="event-owner"><ion-icon name="star-outline"></ion-icon>Dono do Evento</p>
    <a href="" class="btn btn-primary" id="event-primary">Confirmar Presença</a>
    <h4 class="mt-3">Evento conta com:</h4>
    <ul id="items">
        @foreach ($event->items as $item)
        <li><ion-icon name="play-outline"></ion-icon><span>{{$item}}</span></li>
        @endforeach
    </ul>
  </div>
      <div class="col-md-12" id="description-container">
        <h3>Sobre o Evento</h3>
        <p class="event-description">{{$event->description}}</p>
      </div>
 </div>
</div>

@endsection
