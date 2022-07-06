@extends('layouts.app')
@section('title', 'Listagem de inscrições');

@section('content')
    <table class="table align-middle table-bordered">
        <thead class="table-dark">
            <tr>
                {{-- <th scope="col">id inscricão</th> --}}
                <th scope="col">Nome</th>
                <th scope="col">Genêro</th>
                <th scope="col">Tipo associação</th>
                <th scope="col">Pagamento</th>
                <th scope="col">Email</th>
                <th scope="col">CPF</th>
                <th scope="col">RG</th>
                <th scope="col">Condição</th>
                <th scope="col">Cidade</th>
                <th scope="col">Arquivos comprobatórios</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($inscricoes as $inscricao)
            <tr>
                    {{-- <th scope="row">{{ $inscricao->id }}</th> --}}
                    <td>{{ $inscricao->nome }}</td>
                    <td>{{ $inscricao->genero }}</td>
                    <td>{{ $inscricao->tipo }}</td>
                    <td>{{ $inscricao->pagamento }}</td>
                    <td>{{ $inscricao->email }}</td>
                    <td>{{ $inscricao->cpf }}</td>
                    <td>{{ $inscricao->rg }}</td>
                    <td>{{ $inscricao->condicao }}</td>
                    <td>{{ $inscricao->cidade_uf }}</td>
                    <td><a href=""><button>Download Arquivos</button></a></td>
                    <td><button>Deferir</button> <button>Indeferir</button></td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection