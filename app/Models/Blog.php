<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Blog extends Model
{
    protected $fillable = ['title', 'user_id', 'favourite', 'text','image'];

    public function post(): HasOne
    {
        return $this->HasOne(User::class,'id','user_id');
    }
    use HasFactory;
}
