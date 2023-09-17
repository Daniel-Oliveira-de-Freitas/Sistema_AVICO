@extends('layouts.app')
@section('title', 'Gerenciamento de usuários')

@section('content')
    <section class="container-fluid table-responsive">
        <div class="container">
            @include('messages.messages')
        </div>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="row">Id</th>
                    <th scope="row">Nome</th>
                    <th scope="row">Email</th>
                    <th scope="row">Ativo/Inativo</th>
                    <th scope="row">Função</th>
                    <th scope="row">Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $user)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $user->person?->nome_completo }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->active }}</td>
                        @foreach ($user->roles as $role)
                            <td>{{ $role->name }}</td>
                        @endforeach
                        <td>
                            <div class="btn-group" role="group" aria-label="ações">
                                <a type="button" class="btn btn-info btn-sm"
                                    href="{{ route('gerenciamento-usuarios.edit', $user) }}"><i
                                        class="fa-solid fa-pencil"></i> Editar
                                </a>
                                <button type="button" role="button" href="#" data-toggle="modal"
                                    data-target="#ModalReprovar{{ $user->id }}" class="btn btn-danger btn-sm"><i
                                        class="fa-solid fa-xmark"></i> Excluir
                                </button>
                            </div>
                        </td>
                    </tr>
                    @include('web.user-management.modal.excluir-usuario')
                @empty
                    <h2 class="text-center">Nenhum usuário de cadastro encontrado</h2>
                @endforelse
            </tbody>
        </table>
        <div class="container">
            {{ $users->links('pagination::bootstrap-5') }}
        </div>
    </section>
@endsection
