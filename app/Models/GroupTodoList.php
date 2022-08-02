<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupTodoList extends Model
{
    use HasFactory;
    protected $fillable = [
        'groupname',
        'completed'
    ];

    public function todos()
    {
        return $this->hasMany(TodoList::class);

    }
}
