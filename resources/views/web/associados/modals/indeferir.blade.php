<form action="{{ route('indeferir_cadastro', $inscricao->id) }}" method="post" enctype="multipart/form-data">
    @method('PATCH')
    @csrf
    <div class="modal fade" id="ModalReprovar{{ $inscricao->id }}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Indeferir Cadastro</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"></span>
                    </button>
                </div>
                <div class="modal-body">
                    <label class="mb-2">
                        Você deseja indeferir o cadastro de <b>{{ $inscricao->person->nome_completo }}</b>?
                    </label>
                    <label for="motivo">Motivo:</label>
                    <textarea class="form-control" id="motivo" name="motivo"></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn gray btn-outline-secondary"
                            data-dismiss="modal">{{ __('Cancel') }}</button>
                    <button type="submit" class="btn btn-outline-danger">Indeferir</button>
                </div>
            </div>
        </div>
    </div>
</form>
