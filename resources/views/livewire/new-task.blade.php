<div wire:ignore.self class="my-3">
    <form>
        <h5>Crear nueva tarea</h5>
        <div class="form-group">
            <div class="row">
                <div class="col-3">
                    <label for="task_description">Asignar a usuario</label>
                    <select class="form-select" wire:model="assigned_user_id" name="assigned_user_id" id="assigned_user_id" class="custom-select">
                        <option value ="" selected>Seleccione:</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}"> {{ $user->name }}</option>
                        @endforeach
                    </select>

                </div>
                <div class="col-3">
                    <label for="task_description">Nombre de la tarea</label>
                    <input type="text" class="form-control" id="task_description" placeholder="Nombre de la tarea" wire:model="task_description">
                    @error('task_description') <span class="text-danger error">{{ $message }}</span>@enderror
                </div>
                <div class="col-3">
                    <label for="max_date_execution">Fecha de máxima de ejecución</label>
                    <input type="date" class="form-control" id="max_date_execution" wire:model="max_date_execution" placeholder="">
                    @error('max_date_execution') <span class="text-danger error">{{ $message }}</span>@enderror
                </div>
            </div>
        </div>

        <input type="hidden" wire:model="created_user_id" value="{{ $this->current_user_id }}">
    </form>

    <div class="my-3">
        <button type="button" wire:click.prevent="cerrarTaskModal()" class="btn btn-secondary close-btn">Cerrar</button>
        <button type="button" wire:click.prevent="guardarTarea()" class="btn btn-primary close-modal">Crear</button>
    </div>
</div>
