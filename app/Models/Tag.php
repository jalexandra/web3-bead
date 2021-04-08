<?php

namespace App\Models;

use App\Traits\ApiResource;
use DateTime;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Tag model
 * @package App\Models
 * @property int id
 * @property string name
 * @property Collection questions
 * @property DateTime created_at
 * @property DateTime updated_at
 */
class Tag extends Model
{
    use HasFactory, ApiResource;

    protected $fillable = ['name'];

    public function questions(): BelongsToMany
    {
        return $this->belongsToMany(Question::class);
    }
}
