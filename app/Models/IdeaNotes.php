<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IdeaNotes extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'title',
        'body'
    ];
}
