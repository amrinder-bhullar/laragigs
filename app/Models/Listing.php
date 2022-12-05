<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'company', 'location', 'website', 'email', 'tags', 'description', 'logo', 'user_id', 'remote'];

    public function scopeFilter($query, array $filters)
    {
        if ($filters['tag'] ?? false) {
            $query->where('tags', 'like', '%' . request('tag') . '%');
        }
        if ($filters['search'] ?? false) {
            // dd(request('search'));
            $query->where('title', 'like', '%' . request('search') . '%')
                ->orWhere('description', 'like', '%' . request('search') . '%')
                ->orWhere('tags', 'like', '%' . request('search') . '%');
        }

        if ($filters['remote'] ?? false) {

            switch (request('remote')) {
                case 'true':
                    $query->where('remote', 1)->orWhere('location', 'like', '%' . 'remote' . '%');
                    break;

                default:
                    $query->where('remote', 0);
                    break;
            }
        }
    }

    //Relationship to User

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // a listing has many bookmarks

    public function bookmarks()
    {
        return $this->hasMany(Bookmark::class);
    }

    public function applications()
    {
        return $this->hasMany(Application::class);
    }
}
