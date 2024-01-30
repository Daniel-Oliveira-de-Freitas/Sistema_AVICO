@extends('layouts.app')

@section('title', 'Fake News Detection - List')
@section('content')
    <section class="page-section" action="{{ route('fake-news-detection.list') }}">
        <div class="col-md-8 col-md-offset-2 container">
            <div class="d-flex align-items-center justify-content-between">
                <h2>Lista de Pesquisas</h2>
                <a href="{{ route('fake-news-detection') }}" class="btn btn-primary">Criar nova pesquisa</a>
            </div>
            @if(count($jobFakeNewsDetection) > 0)
                <table class="table mt-3">
                    <thead>
                        <tr>
                            <th>Link</th>
                            <th>Frequência</th>
                            <th>Emails</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($jobFakeNewsDetection as $entry)
                            <tr>
                                <td>{{ $entry->links }}</td>
                                <td>{{ $entry->cron }}</td>
                                <td>{{ $entry->emails }}</td>
                                <td>
                                    <a href="{{ route('fake-news-detection.edit', $entry->id) }}" class="btn btn-success me-2">Editar</a>
                                    <form action="{{ route('fake-news-detection.destroy', $entry->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Você deseja deletar essa fake news detection?')">Deletar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p>Nenhum cadastro encontrado.</p>
            @endif
        </div>
    </section>
@endsection