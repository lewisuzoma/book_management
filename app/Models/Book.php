<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $table = 'books';

    protected $primaryKey = 'id';

    protected $timestamp = true;

    protected $fillable = ['image_path', 'title', 'isbn', 'description', 'revision_number', 'published_date', 'publisher', 'author'];

    protected $hidden = ['updated_at'];
}
