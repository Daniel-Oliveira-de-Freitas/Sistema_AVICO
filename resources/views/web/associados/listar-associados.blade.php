@extends('layouts.app')
@section('title', 'Listagem de inscrições')

@section('content')
    <section class="container-fluid table-responsive">
        <div class="container">
            @include('messages.messages')
        </div>
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="row">Nome</th>
                <th scope="row">Genêro</th>
                <th scope="row">Tipo associação</th>
                <th scope="row">Pagamento</th>
                <th scope="row">Email</th>
                <th scope="row">CPF</th>
                <th scope="row">RG</th>
                <th scope="row">Condição</th>
                <th scope="row">Cidade</th>
                <th scope="row">Estado</th>
                <th scope="row">Arquivos comprobatórios</th>
                <th scope="row">Ações</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($inscricoes as $inscricao)
                <tr>
                    <td>{{ $inscricao->person->nome_completo }}</td>
                    <td>{{ $inscricao->person->genero }}</td>
                    <td>@foreach ($inscricao->role as $item){{ $item->name }}</br>@endforeach</td>
                    <td>{{ $inscricao->person->tipo_pagamento?->name  }}</td>
                    <td>{{ $inscricao->email }}</td>
                    <td>{{ $inscricao->person->cpf }}</td>
                    <td>{{ $inscricao->person->rg }}</td>
                    <td>@foreach (json_decode($inscricao->person->reason->condicao) as $item){{$item}}</br>@endforeach</td>
                    <td>{{ $inscricao->person->adress->cidade }}</td>
                    <td>{{ $inscricao->person->adress->estado }}</td>
                    <td>
                        <form method="GET" action="{{ route('baixar_dados', $inscricao->id) }}">
                            <button type="submit" class="btn btn-info btn-md"><i class="fa-solid fa-download"></i>
                                Download Arquivos
                            </button>
                        </form>
                    </td>
                    <td>
                        <div class="btn-group" role="group" aria-label="ações">
                            <button type="button" role="button" href="#" data-toggle="modal"
                                    data-target="#ModalVisualizar{{ $inscricao->id }}" class="btn btn-info btn-sm"><i
                                    class="fa-solid fa-eye"></i> Visualizar
                            </button>
                            <button type="button" role="button" href="#" data-toggle="modal"
                                    data-target="#ModalAprovar{{ $inscricao->id }}" class="btn btn-success btn-sm"><i
                                    class="fa-solid fa-check"></i> Deferir
                            </button>
                            <button type="button" role="button" href="#" data-toggle="modal"
                                    data-target="#ModalReprovar{{ $inscricao->id }}" class="btn btn-danger btn-sm"><i
                                    class="fa-solid fa-xmark"></i> Indeferir
                            </button>
                        </div>
                    </td>
                </tr>
                @include('web.associados.modals.view')
                @include('web.associados.modals.deferir')
                @include('web.associados.modals.indeferir')
            @endforeach
            </tbody>
        </table>
        <div class="container">
            {{ $inscricoes->links('pagination::bootstrap-5') }}
        </div>
    </section>
@endsection
