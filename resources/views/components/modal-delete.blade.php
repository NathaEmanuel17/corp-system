<!-- components/modal-delete.blade.php -->
@props(['id', 'action', 'status'])

<div class="modal fade modal-{{ $status ? 'success' : 'danger' }} text-start" id="danger" tabindex="-1" aria-labelledby="myModalLabel120" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel120">{{ $status ? 'Ativar' : 'Desativar' }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ $action }}" method="POST">
                @csrf
                @method('DELETE')
                <input type="hidden" name="id" value="{{ $id }}">
                <div class="modal-body">
                    @if ($status)
                        Tem certeza de que deseja ativar este item?
                    @else
                        Tem certeza de que deseja excluir este item?
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn {{ $status ? 'btn-success' : 'btn-danger' }}" data-bs-dismiss="modal">
                        Sim, quero {{ $status ? 'ativar' : 'excluir' }}.
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
