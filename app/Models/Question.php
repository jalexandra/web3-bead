<?php

namespace App\Models;

use App\Traits\ApiResource;
use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory, UUID, ApiResource;

    protected $fillable = [
        'title',
        'description'
    ];
}
