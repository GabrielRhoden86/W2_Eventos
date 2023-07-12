  @extends('layouts.main')
  @section('title', 'W2 Eventos')
  @section('content')

      <section id="search-container" class="col-md-12">
          <form action="/" method="GET">
            <label for="search"><h2 >Busque um Evento</h2></label>
              <input type="text" name="search" id="search"class="form-control" placeholder="Procurar...">
          </form>
      </section>
      <div id="events-container" class="col-md-12">
        @if($search)
        <h3>Buscando por: {{$search}}</h2>
        @else
        <h3 class="font-weight-bold text-center">Proximos Eventos</h3>
        @endif
          <p class="text-center">{{ count($events) > 0 ? 'Veja os eventos para os proximos dias:' : 'Não há eventos disponíveis  ' }}</p>
          <div id="cards-container" class="row">
              @foreach ($events as $event)
                  <div class="card col">
                      <img src="/img/events/{{ $event->image }}" alt="{{ $event->title }}">
                      <div class="card-body">
                          <p class="card-date">{{ date('d/m/Y H:i', strtotime($event->date)) }}</p>
                          <h5 class="card-title">{{ $event->title }}</h5>
                          <p class="card-paticipants">X Participantes</p>
                          <a href="/events/{{ $event->id }}" class="btn btn-primary">Saber Mais</a>
                      </div>
                  </div>
              @endforeach
          </div>
      </div>
  @endsection
