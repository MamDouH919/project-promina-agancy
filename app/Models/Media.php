<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Media extends Model
{
    protected $fillable = [
        'album_id',
        'photo_name',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'album_id');
    }
}
