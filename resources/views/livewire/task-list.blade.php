<div class="row justify-content-center my-5">
    <div class="col-md-12">
        <div class="card shadow bg-light">
            <div class="card-body bg-white py-3 border-bottom rounded-top">
                <div class="my-3">

                    <h3 class="h3">
                        Listado de tareas
                    </h3>

                    <div class="text-muted">
                        Usuarios con tareas y logs

                        <button wire:click="crearTarea()" class="btn btn-primary">Crear tarea</button>

                        @if ( $modalTask )
                            @include('livewire.new-task')
                        @endif

                        @if ( $modalLog )
                            @include('livewire.new-log')
                        @endif

                    </div>
                </div>
            </div>
            @if (session()->has('message'))
                <div class="row g-0">
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                </div>
            @endif

            <div class="row g-0">
                <div class="col-md-12 pe-0">
                    <div class="card-body border-right border-bottom p-3 h-100">
                        <div class="d-flex flex-row bd-highlight mb-3">

                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nombre de la tarea</th>
                                    <th scope="col">Usuario asignado</th>
                                    <th scope="col">Creado por</th>
                                    <th scope="col">Fecha límite</th>
                                    <th scope="col">Tarea creada el</th>
                                    <th scope="col"></th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($tasks as $task)

                                    @if ( $task->max_date_execution <= $current_date )
                                        <tr class="item-row{{ $task->id_task }} bg-danger-2">
                                    @else
                                        <tr class="item-row{{ $task->id_task }}">
                                    @endif
                                        <td scope="col">{{ $task->id_task }}</td>
                                        <td scope="col">{{ $task->task_description }}</td>
                                        <td scope="col">{{ $task->name_user }}</td>
                                        <td scope="col">{{ $task->created_name_user }}</td>
                                        <td scope="col">{{ $task->max_date_execution }}</td>
                                        <td scope="col">{{ $task->created_at }}</td>
                                        <td scope="col" class="center">
                                            @if ( Auth::user()->id === $task->assigned_user_id )
                                                <button wire:click="createLog({{ $task->id_task }})" class="btn btn-warning btn-sm">Nuevo Log</button>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>

                            <div class="row center-align">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
