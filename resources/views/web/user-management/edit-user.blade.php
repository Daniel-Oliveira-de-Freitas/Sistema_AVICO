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
                    <label for="active">Status</label>
                    <input class="form-check-input @error('active') is-invalid @enderror" type="checkbox" name="active"
                        value="{{ $user->active }}" id="active" maxlength="255" @checked($user->active)>

                    @if ($user->active)
                        <label class="form-check-label">Ativado</label>
                    @else
                        <label class="form-check-label">Desativado</label>
                    @endif
                    <x-error-message errorName="active" />
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
                    {{-- <select class="form-select form-select-lg mb-3" name="funcao[]" id="funcao" multiple>
                        @foreach (\App\Enums\Authority::cases() as $authority)
                            <option value="{{ $authority }}"
                                @foreach ($user->roles as $role){{ $role->name == $authority->value ? 'selected' : '' }} @endforeach>
                                {{ $authority->name }}</option>
                        @endforeach
                    </select> --}}
                    <x-error-message errorName="funcao" />
                </div>
            </div>
            <div class="d-flex justify-content-between mt-2">
                <button type="submit" class="btn btn-info rounded">Voltar
                </button>
                <button type="submit" class="btn btn-success rounded">Salvar
                </button>
            </div>
        </form>
    </section>
@endsection
