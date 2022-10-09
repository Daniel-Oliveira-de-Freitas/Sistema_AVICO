<form action="{{ route('deferir_cadastro', $inscricao->id) }}" method="post" enctype="multipart/form-data">
    @method('PATCH')
    @csrf
    <div class="modal fade" id="ModalAprovar{{ $inscricao->id }}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Deferir Cadastro</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"></span>
                    </button>
                </div>
                <div class="modal-body">Você deseja aprovar o cadastro de <b>{{ $inscricao->person->nome_completo }}</b>?</div>
                <div class="modal-footer">
                    <button type="button" class="btn gray btn-outline-secondary"
                        data-dismiss="modal">{{ __('Cancel') }}</button>
                    <button type="submit" class="btn btn-outline-success">Aprovar</button>
                </div>
            </div>
        </div>
    </div>
</form>
