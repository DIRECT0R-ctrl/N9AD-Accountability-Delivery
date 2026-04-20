<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Task;

class Proof extends Model
{
    protected $fillable = [

        'task_id',
        'proof_file',
        'comment'
    ];

    public function  task()
    {
        return $this->belongsTo(Task::class);
    }

}
