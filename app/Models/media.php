<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class media extends Model
{
    use HasFactory;
    protected $table = 'media';
    protected $primary_key = 'id';

    protected $fillable = [
        'type',
        'name',
        'file_size',
        'thumbnail_name',
        'created_by',
        'updated_by',
    ];
}
