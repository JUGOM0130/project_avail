<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $table = 'tasks';

    //ホワイトリストの設定
    protected $fillable = ["contact_id", "title", "detail"]; //保存したいカラム名

}
