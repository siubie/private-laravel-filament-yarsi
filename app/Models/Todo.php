<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    /** @use HasFactory<\Database\Factories\TodoFactory> */
    use HasFactory;

    //add fillable property
    protected $fillable = [
        'title',
        'description',
        'category',
        'status',
        'due_date',
    ];
}
