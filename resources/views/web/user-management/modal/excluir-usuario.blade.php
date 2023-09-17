<form action="{{ route('gerenciamento-usuarios.destroy', $user) }}" method="POST" enctype="multipart/form-data">
    @method('DELETE')
    @csrf
    <div class="modal fade" id="ModalReprovar{{ $user->id }}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Excluir Usuário</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"></span>
                    </button>
                </div>
                <div class="modal-body">
                    <label class="mb-2">
                        Você deseja excluir o usuário com identificador <b>{{ $user->id }}</b>?
                    </label>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn gray btn-outline-secondary"
                            data-dismiss="modal">{{ __('Cancel') }}</button>
                    <button type="submit" class="btn btn-outline-danger">Excluir</button>
                </div>
            </div>
        </div>
    </div>
</form>
