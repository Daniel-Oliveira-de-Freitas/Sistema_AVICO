<?php

namespace App\Models;

use App\Enums\StatusType;
use App\Mail\WelcomeEmail;
use App\Notifications\RejectedUserRegisterNotification;
use App\Notifications\ResetPasswordNotification;
use App\Notifications\WelcomeUserNotification;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasPermissions;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, HasPermissions;

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'email',
        'password',
        'status',
        'active'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'status',
        'active'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'status' => StatusType::class,
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the user associated with the User
     *
     * @return HasOne
     */
    public function person(): HasOne
    {
        return $this->hasOne(Person::class, 'user_id');
    }

    /**
     * Get all of the comments for the User
     *
     * @return HasMany
     */
    public function notices(): HasMany
    {
        return $this->hasMany(Notice::class, 'user_id');
    }


    /**
     * The roles that belong to the User
     *
     * @return BelongsToMany
     */
    public function role(): BelongsToMany
    {
        return $this->belongsToMany(Role::class, 'model_has_roles', 'model_id', 'role_id');
    }

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token): void
    {
        $this->notify(new ResetPasswordNotification($token));
    }

    /**
     * Send the welcome email notification.
     *n
     * @return void
     */
    public function sendWelcomeNotification(): void
    {
        $this->notify(new WelcomeUserNotification());
    }

    /**
     * Send the welcome email notification.
     *n
     * @return void
     */
    public function sendRejectedUserRegisterNotification($reason): void
    {
        $this->notify(new RejectedUserRegisterNotification($reason));
    }

    /**
     * Interact with the user's password
     */
    protected function password(): Attribute
    {
        return Attribute::make(
            set: fn (string $value) => Hash::make($value)
        );
    }
}
