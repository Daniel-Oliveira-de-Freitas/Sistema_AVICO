@extends('layouts.app')
@section('title', 'Editar usuário')

@section('content')
    <section class="page-section">
        <h1 class="text-center">
            Editar Usuário
        </h1>
        <div class="container">
            @include('messages.messages')
        </div>
        <form class="container shadow-lg p-3 mb-5 bg-light rounded" method="POST"
            action="{{ route('gerenciamento-usuarios.update', $user->id) }}">
            @csrf
            @method('PATCH')
            <div class="row">
                <div class="mb-3 form-group col-6">
                    <label for="nome">Nome</label>
                    <input class="form-control text-break @error('nome') is-invalid @enderror" name="nome"
                        value="{{ $user->person?->nome_completo }}" id="nome" maxlength="255">
                    <x-error-message errorName="nome" />
                </div>
                <div class="mb-3 form-group col-6">
                    <label for="email">Email</label>
                    <input class="form-control text-break @error('email') is-invalid @enderror" name="email"
                        value="{{ $user->email }}" id="email" maxlength="255">
                    <x-error-message errorName="email" />
                </div>

                <div class="mb-3 form-check col-6">
                    <label for="active">Status do usuário:</label>
                    <input class="form-check-input" type="checkbox" name="active" id="active" value="true"
                        @checked($user->active) onchange="updateStatusLabel()">
                    <label for="active" id="status-label"></label>
                </div>
                <div class="mb-3 form-group col-6">
                    <label for="funcao">Função</label>
                    <select class="form-select form-select-lg mb-3" name="funcao[]" id="funcao" multiple>
                        @foreach (\App\Enums\Authority::cases() as $authority)
                            @php
                                $isSelected = $user->roles->contains('name', $authority->value);
                            @endphp
                            <option value="{{ $authority }}" {{ $isSelected ? 'selected' : '' }}>
                                {{ $authority->name }}
                            </option>
                        @endforeach
                    </select>
                    <x-error-message errorName="funcao" />
                </div>
            </div>
            <div class="d-flex justify-content-between mt-2">
                <a type="button" class="btn btn-info rounded" href="{{ url()->previous() }}">Voltar</a>
                <button type="submit" class="btn btn-success rounded">Salvar
                </button>
            </div>
        </form>
    </section>
@endsection

<script>
    window.onload = function() {
        updateStatusLabel()
    }

    function updateStatusLabel() {
        var checkbox = document.getElementById('active').checked;
        var statusLabel = document.getElementById('status-label');
        if (checkbox) {
            statusLabel.innerHTML = 'Ativo no sistema';
        } else {
            statusLabel.innerHTML = 'Inativo no sistema';
        }
    }
</script>
