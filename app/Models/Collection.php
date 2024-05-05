<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    use HasFactory;

    // Model relationships
    public function books()
    {
        return $this->belongsTo(Book::class, 'book_id');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function statuses()
    {
        return $this->belongsTo(Status::class, 'status_id');
    }
}
