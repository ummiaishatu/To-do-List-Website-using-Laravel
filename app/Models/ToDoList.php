<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ToDoList extends Model
{
    use HasFactory;
    protected $fillable = [
        'todoname',
        'group_id',
        'completed'
    ];

    public function GroupTodoList()
    {
        return $this->belongsTo(GroupTodoList::class, 'group_id');

    }

    
}
