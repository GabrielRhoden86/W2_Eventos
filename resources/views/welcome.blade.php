  @extends('layouts.main')
  @section('title', 'W2 Eventos')
  @section('content')

        <section id="search-container" class="col-md-12">
          <h3>Busque um Evento</h3>
          <form action="">
              <input type="text" name="search" id="search"class="form-control" placeholder="Procurar...">
          </form>
        </section>
        <main id="events-container" class="col-md-12">
              <h2>Proximos Eventos</h2>
              <p>Veja os eventos para os proximos dia</p>
            <div id="cards-container" class="row d-flex d-flex justify-content-start">
              @foreach ($events as $event)
                <div class="card col-md-2">
                  <img src="/img/events/{{$event->image}}" alt="{{ $event->title }}">
                  <div class="card-body">
                      <p class="card-date">10/09/2020</p>
                      <h5 class="card-title">{{ $event->title }}</h5>
                      <p class="card-paticipants">X Participantes</p>
                      <a href="/events/{{$event->id}}" class="btn btn-primary">Saber Mais</a>
                  </div>
               </div>
              @endforeach
            </div>
        </main>
  @endsection

