<?php

namespace App\Models;

use App\Traits\ApiResource;
use App\Traits\UUID;
use DateTime;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
* Question Model
* @package App\Models
* @property string id
* @property string title
* @property string description
* @property User owner
* @property int score
* @property Collection scoredBy
* @property Collection answers
* @property Answer correct
* @property string answer_id
* @property DateTime created_at
* @property DateTime updated_at
*/
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

    public function correct(): HasOne
    {
        return $this->hasOne(Answer::class, 'id', 'answer_id');
    }

    public function answers(): HasMany
    {
        return $this->hasMany(Answer::class);
    }
}
