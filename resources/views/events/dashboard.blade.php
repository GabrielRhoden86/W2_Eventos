{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-welcome />
            </div>
        </div>
    </div>
</x-app-layout> --}}
@extends('layouts.main')
@section('title', 'Dashboard')
@section('content')

<div class="col-md-10 offset-md-1 dashboard-title-container">
 <h2>Meus Eventos</h2>
</div>
<div class="col-md-10 offset-md-1 dashboard-events-container bg-white">
    @if (count($events) > 0)

    <table class="table ">
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
            <td><a href="#">Editar</a><a  class="ml-2" href="#">Deletar</a></td>
         </tr>
        @endforeach
        </tbody>
    </table>

    @else
        <p>Você ainda não tem eventos <a href="/events/create">Criar Evento</a></p>
    @endif
</div>

@endsection
