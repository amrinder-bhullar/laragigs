<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model
{
    use HasFactory;

    protected $fillable = ['listing_id', 'user_id'];

    public function listing()
    {
        return $this->belongsToMany(Listing::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
