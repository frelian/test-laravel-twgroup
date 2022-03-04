<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;

    protected $fillable = [
        'task_id',
        'description_log',
    ];

    public function tasks()
    {
        return $this->belongsTo(Task::class);
    }
}
