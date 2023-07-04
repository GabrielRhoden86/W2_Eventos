@extends('layouts.main')
@section('title', 'Dashboard')
@section('content')

<div class="col-md-10 offset-md-1 dashboard-title-container">
 <h2>Meus Eventos</h2>
</div>
<div class="col-md-10 offset-md-1 dashboard-events-container bg-white">
    @if (count($events) > 0)

    <table class="table text-center">
        <thead>
            <th scope="col"></th>
            <th scope="col">Nome</th>
            <th scope="col">Parcipantes</th>
            <th scope="col">Ações</th>
        </thead>
        <tbody>
        @foreach ($events as $event )
         <tr>
            <td scropt="row">{{$loop->index +1}}</td>
            <td><a href="/events/{{$event->id}}">{{$event->title}}</a></td>
            <td>0</td>
            <td class="d-flex justify-content-center">
                @if(session('msg'))
                    <script>
                        Swal.fire({
                            title: "Evento excluido com sucesso!",
                            text: "",
                            icon: 'warning',
                            confirmButtonText: 'Ok'
                        });
                    </script>
                     {{session('msg') == false}}
                @endif
                <button class="btn-sm btn-primary edit-btn" href="#"><ion-icon class="mr-1" name="create-outline"></ion-icon>Editar</button>
                <form action="/events/{{$event->id}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="ml-2 btn-sm btn-danger delete-btn" href="#"><ion-icon class="mr-1"name="trash-outline"></ion-icon>Deletar</button>
                </form>
            </td>
         </tr>
        @endforeach
        </tbody>
    </table>
    @else
      <p>Você ainda não tem eventos<a href="/events/create">Criar Evento</a></p>
    @endif
</div>
@endsection
