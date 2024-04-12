<div class="modal fade" id="showTypeModal{{ $type->id }}" tabindex="-1"
    role="dialog" aria-labelledby="showTypeModalLabel{{ $type->id }}"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="showTypeModalLabel{{ $type->id }}">
                    Mostrar Tipo</h5>
                <button type="button" class="close" data-dismiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @include('types.show')
            </div>
        </div>
    </div>
</div>