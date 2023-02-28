<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Listing extends Model
{
    use HasFactory;

    // protected $fillable = ['title', 'description', 'company', 'email', 'tags', 'location', 'website'];

    public function scopeFilter($query, array $filters) {
        if($filters['tag'] ?? false) {
            $query->where('tags', 'like', '%' . request('tag') . '%');
        }

        if($filters['search'] ?? false) {
            $query->where('title', 'like', '%' . request('search') . '%')
                  ->orWhere('company', 'like', '%' . request('search') . '%')
                  ->orWhere('location', 'like', '%' . request('search') . '%');
        }
    }

    // Relationship to User
    public function user() {
        return $this->BelongsTo(User::class, 'user_id');
    }
}
