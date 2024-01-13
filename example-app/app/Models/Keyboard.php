<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keyboard extends Model
{
    use HasFactory;
    protected $fillable = ['title','user_id','description', 'price', 'switches', 'details', 'image'];
    public function scopeFilter($query, array $filters)
    {
        if($filters['search'] ?? false){
            $query->where('title', 'like', '%' . request('search') . '%')
            ->orWhere('description', 'like', '%' . request('search') . '%');
        }
    }

    //Relationship To User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
