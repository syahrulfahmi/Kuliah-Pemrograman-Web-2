<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $table = 'survey';
    protected $fillable = ['nama', 'jenis_kelamin', 'umur','makanan', 'rating'];
}
