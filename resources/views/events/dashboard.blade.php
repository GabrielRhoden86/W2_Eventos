@extends('layouts.main')
@section('title', 'Dashboard')
@section('content')
    <div class="col-md-10 offset-md-1 dashboard-title-container">
        <h2 class="text-center mb-0 font-weight-bold">Meus Eventos</h2>
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
                    @foreach ($events as $event)
                        <tr>
                            <td scropt="row">{{ $loop->index + 1 }}</td>
                            <td><a href="/events/{{ $event->id }}">{{ $event->title }}</a></td>
                            <td>0</td>
                            <td class="d-flex justify-content-center">
                                @if (session('msgDestroy'))
                                    <script>
                                        Swal.fire({
                                            title: "Evento excluido com sucesso!",
                                            text: "",
                                            icon: 'warning',
                                            confirmButtonText: 'Ok'
                                        });
                                    </script>
                                    {{ session('msgDestroy') == false }}
                                @endif
                                @if (session('msgEdit'))
                                    <script>
                                        Swal.fire({
                                            title: "Evento editado com sucesso!",
                                            text: "",
                                            icon: 'info',
                                            confirmButtonText: 'Ok'
                                        });
                                    </script>
                                    {{ session('msgEdit') == false }}
                                @endif
                                  @if (session('msgJoin'))
                                    <script>
                                        Swal.fire({
                                            title: "Sua presença esta confirmada no evento",
                                            text: "",
                                            icon: 'success',
                                            confirmButtonText:'Ok'
                                        });
                                    </script>
                                    {{ session('msgJoin') == false }}
                                @endif
                                <a class="btn-sm btn-primary edit-btn" href="/events/edit/{{ $event->id }}">
                                    <ion-icon class="mr-1 mt-1" name="create-outline">
                                    </ion-icon>Editar
                                </a>
                                <form action="/events/{{ $event->id }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="ml-2 btn-sm btn-danger delete-btn" href="#">
                                        <ion-icon class="mr-1"name="trash-outline"></ion-icon>Deletar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p class="pt-3 rounded">Você ainda não tem eventos<a class="ml-2" href="/events/create">Criar Evento</a></p>
        @endif
    </div>
@endsection
