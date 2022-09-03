@extends('layouts.app')
@section('title', 'Listagem de inscrições');

@section('content')
<section class="table-responsive">
    <table class="table table-striped table-bordered">
        <thead class="table-dark">
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
                <th scope="row">Arquivos comprobatórios</th>
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
                <td><button type="button" class="btn btn-info">Download Arquivos</button></td>
                <td><div class="btn-group"> 
                    <button type="button" class="btn btn-primary">Deferir</button> 
                    <button type="button" class="btn btn-primary">Indeferir</button></div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</section>
@endsection