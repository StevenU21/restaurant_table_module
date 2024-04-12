<div class="modal fade" id="editTypeModal{{ $type->id }}" tabindex="-1"
    role="dialog" aria-labelledby="editTypeModalLabel{{ $type->id }}"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"
                    id="editTypeModalLabel{{ $type->id }}">Editar Tipo</h5>
                <button type="button" class="close" data-dismiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editForm{{ $type->id }}" method="POST">
                    @csrf
                    @method('PUT')
                    @include('types.form')
                </form>
            </div>
        </div>
    </div>
</div>