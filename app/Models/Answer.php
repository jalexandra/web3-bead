<?php

namespace App\Models;

use App\Traits\ApiResource;
use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Answer extends Model
{
    use HasFactory, UUID, ApiResource;

    protected $fillable = ['description'];

    public function scoredBy(): BelongsToMany{
        return $this->belongsToMany(User::class)->withPivot('positive')->as('score');
    }
}