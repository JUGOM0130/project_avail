<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exchange extends Model
{
    use HasFactory;

    protected $table = 'exchanges';
    //ホワイトリストの設定
    protected $fillable = ["parent_id", "row_no", "exchange"]; //保存したいカラム名
}