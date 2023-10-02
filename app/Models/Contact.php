<?php

namespace App\Models;

use App\Models\Exchange;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $table = 'contacts';

    protected $fillable = ['project_name', 'priority', 'detail', 'start', 'end'];

    public function exchanges()
    {
        return $this->hasMany(Exchange::class, 'parent_id');
    }
}