@extends('layouts.app')
@section('title', 'Listagem de inscrições');

@section('content')
<section class="container-active table-responsive">
    {!! session()->get('success') !!}
    <table class="table table-hover">
        <thead>
            <tr>
                {{-- <th scope="col">id inscricão</th> --}}
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
                <th scope="row"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($inscricoes as $inscricao)
            <tr>
                <td>{{ $inscricao->nome_completo }}</td>
                <td>{{ $inscricao->genero }}</td>
                <td>@foreach ($inscricao->user->role as $item){{ $item->name }}</br>@endforeach</td>
                <td>@if(isset($inscricao->tipo_pagamento->name)){{ $inscricao->tipo_pagamento->name  }}@endif</td>
                <td>{{ $inscricao->user->email }}</td>
                <td>{{ $inscricao->cpf }}</td>
                <td>{{ $inscricao->rg }}</td>
                <td>@foreach (json_decode($inscricao->reason->condicao) as $item){{$item}}</br>@endforeach</td>
                <td>{{ $inscricao->adress->cidade }}</td>
                <td>{{ $inscricao->adress->estado }}</td>
                <td>
                    <form method="GET" action="{{route('baixar_dados', $inscricao->user->id)}}"><button type="submit" class="btn btn-info btn-md"><i class="fa-solid fa-download"></i> Download Arquivos</button></form>
                    </td>
                <td><div class="btn-group">
                    <form method="POST" action="{{route('deferir_cadastro', $inscricao->user->id)}}"> @method('PATCH')  @csrf<button type="submit" class="btn btn-success btn-md"><i class="fa-solid fa-check"></i> Deferir</button></form>
                    <form method="POST" action="{{route('indeferir_cadastro', $inscricao->user->id)}}">@method('DELETE') @csrf<button type="submit" class="btn btn-danger btn-md"><i class="fa-solid fa-trash"></i> Indeferir</button></form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</section>
@endsection