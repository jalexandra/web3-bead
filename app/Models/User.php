<?php /** @noinspection PhpMissingFieldTypeInspection */

namespace App\Models;

use App\Traits\ApiResource;
use App\Traits\UUID;
use Carbon\Traits\Date;
use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * User model
 * @package App\Models
 * @property string id
 * @property string username
 * @property string email
 * @property string password
 * @property string remember_token
 * @property DateTime email_verified_at
 * @property DateTime created_at
 * @property DateTime updated_at
 */
class User extends Authenticatable
{
    use HasFactory, Notifiable, UUID, ApiResource;

    protected $fillable = [
        'username', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function answers(): HasMany
    {
        return $this->hasMany(Answer::class, 'owner_id');
    }

    public function questions(): HasMany
    {
        return $this->hasMany(Question::class, 'owner_id');
    }
}
