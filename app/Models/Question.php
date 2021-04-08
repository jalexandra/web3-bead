<?php

namespace App\Models;

use App\Traits\ApiResource;
use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Question extends Model
{
    use HasFactory, UUID, ApiResource;

    protected $fillable = [
        'title',
        'description'
    ];

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

    public function scoredBy(): BelongsToMany
    {
        return $this->belongsToMany(User::class)->withPivot('positive')->as('score');
    }

    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
