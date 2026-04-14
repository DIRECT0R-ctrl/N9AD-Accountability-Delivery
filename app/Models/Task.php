<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Proof;

class Task extends Model
{

    protected $fillable = [
        'title',
        'description',
        'status',
        'priority',
        'deadline',
        'creator_id',
        'assignee_id',
    ];
    public function creator()
    {
        return $this->belongsTo(User::class, 'creator_id');
    }

    public function assignee()
    {
        return $this->belongsTo(User::class, 'assignee_id');
    }

    public function proof()
    {
        return $this->hasOne(Proof::class);
    }
}
