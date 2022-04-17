<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
* Модель данных страницы
*/
class Page extends Model
{
    use HasFactory;

    protected $fillable = [
        'data_pages',
        'pages_uid',
    ];
}
