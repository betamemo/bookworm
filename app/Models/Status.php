<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;

    // Model relationships
    public function books()
    {
        return $this->belongsTo(Book::class, 'book_id');
    }
}
