<div wire:ignore.self class="my-3">
    <form>
        <h5>Crear nuevo log</h5>
        <div class="form-group">
            <div class="row">
                <div class="col-6">
                    <label for="description_log">Contenido del log</label>
                    <textarea class="form-control" id="description_log" placeholder="" wire:model="description_log"></textarea>
                    @error('description_log') <span class="text-danger error">{{ $message }}</span>@enderror
                </div>
            </div>
        </div>

        <input type="hidden" wire:model="task_id" value="{{ $this->task_id }}">
    </form>

    <div class="my-3">
        <button type="button" wire:click.prevent="cerrarLogModal()" class="btn btn-secondary close-btn">Cerrar</button>
        <button type="button" wire:click.prevent="guardarLog()" class="btn btn-primary close-modal">Crear</button>
    </div>
</div>
