<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Album extends Model 
{

    protected $fillable = [
        'user_id',
        'album_name',
        'slug',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function media(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }
}
