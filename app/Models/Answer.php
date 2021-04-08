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

/**
 * Answer Model
 * @package App\Models
 * @property string id
 * @property string description
 * @property User owner
 * @property int score
 * @property Collection scoredBy
 * @property Question question
 * @property string question_id
 * @property DateTime created_at
 * @property DateTime updated_at
 */
class Answer extends Model
{
    use HasFactory, UUID, ApiResource;

    protected $fillable = ['description'];
    protected $appends = ['isCorrect'];

    public function scoredBy(): BelongsToMany{
        return $this->belongsToMany(User::class)->withPivot('positive')->as('score');
    }

    public function owner(): BelongsTo{
        return $this->belongsTo(User::class);
    }

    public function question(): BelongsTo
    {
        return $this->belongsTo(Question::class);
    }

    /**
     * @noinspection UnknownInspectionInspection
     * @noinspection PhpUnused
     */
    public function getIsCorrectAttribute(): bool
    {
        return $this->question->answer_id === $this->id;
    }
}
