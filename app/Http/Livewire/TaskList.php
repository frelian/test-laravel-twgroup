<?php

namespace App\Http\Livewire;

use App\Models\Log;
use App\Models\Task;
use App\Models\User;
use DateTime;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class TaskList extends Component
{
    public $tasks, $task_description, $max_date_execution, $created, $users, $assigned_user_id, $current_user_id;
    public $task_id, $description_log, $current_date;
    public $modalTask = false;
    public $modalLog  = false;

    public function render() {

        // Fecha actual
        $this->current_date = new DateTime();
        $this->current_date = $this->current_date->format('Y-m-d');

        // Obtenido el id del usuario logueado
        $this->current_user_id = Auth::id();

        $this->tasks = Task::select(
            'tasks.id as id_task', 'tasks.task_description', 'tasks.max_date_execution', 'tasks.created_at',
            'users.id as assigned_user_id', 'users.name as name_user',
            'user_created.id as created_user_id', 'user_created.name as created_name_user',
        )
            ->join('users', 'tasks.assigned_user_id', '=', 'users.id')
            ->join('users as user_created', 'tasks.created_user_id', '=', 'user_created.id')
            ->get();

        return view('livewire.task-list');
    }


    public function crearTarea() {

        // Cierro form log
        $this->cerrarLogModal();

        $this->users = User::all()->except(Auth::id());

        $this->limpiarCampos();
        $this->abrirModal();
    }

    public function cerrarTaskModal() {
        $this->modalTask = false;
    }

    public function cerrarLogModal() {
        $this->modalLog = false;
    }

    public function abrirModal() {
        $this->modalTask = true;
    }

    public function abrirLogModal() {
        $this->modalLog = true;
    }

    public function limpiarCampos() {
        $this->tasks = '';
        $this->task_description = '';
        $this->max_date_execution = '';

        $this->description_log = '';
        $this->assigned_user_id = '';

    }

    public function createLog($id_task) {

        // Cierro form task
        $this->cerrarTaskModal();

        $this->task_id = $id_task;

        $this->limpiarCampos();
        $this->abrirLogModal();
    }

    public function guardarTarea() {

        $validatedDate = $this->validate([
            'task_description' => 'required',
            'max_date_execution' => 'required',
        ]);

        $validatedDate['created_user_id'] = $this->current_user_id;
        $validatedDate['assigned_user_id'] = $this->assigned_user_id;

        Task::create($validatedDate);

        session()->flash('message', 'Tarea creada correctamente.');

        $this->limpiarCampos();
        $this->cerrarModal();
    }

    public function guardarLog() {

        $validatedDate = $this->validate([
            'description_log' => 'required',
        ]);

        $validatedDate['task_id'] = $this->task_id;

        Log::create($validatedDate);

        // Envio email de notificacion
        // 1. Busco la tarea
        $task = Task::find($this->task_id);

        // 2. Busco el email del usuario que creo la tarea
        $creator_user_email = User::find($task->created_user_id)->email;

        $details = [
            'user' => Auth::user()->name,
            'task' => $task->task_description,
            'log' => $this->description_log
        ];

        // Envio el mensaje
        Mail::to($creator_user_email)->send(new \App\Mail\NewMail($details));

        session()->flash('message', 'Nuevo log registrado correctamente.');

        $this->limpiarCampos();
        $this->cerrarModal();
    }
}
