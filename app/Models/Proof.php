<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Task;

class Proof extends Model
{
    protected $fillable = [

        'task_id',
        'file_path',
        'comment'
    ];

    public function  task()
    {
        return $this->belongsTo(Task::class);
    }

}
