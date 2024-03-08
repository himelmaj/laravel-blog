<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Filament\Models\Contracts\FilamentUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Filament\Panel;

class User extends Authenticatable implements FilamentUser
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;


    const ROLE_USER = 'user';
    const ROLE_EDITOR = 'editor';
    const ROLE_ADMIN = 'admin';

    const DEFAULT_ROLE = self::ROLE_USER;

    const ROLES = [
        self::ROLE_USER => 'User',
        self::ROLE_EDITOR => 'Editor',
        self::ROLE_ADMIN => 'Admin',
    ];

    public function canAccessPanel(Panel $panel): bool
    {
        return  $this->isAdmin() || $this->isEditor();
    }

    public function isAdmin (): bool
    {
        return $this->role === self::ROLE_ADMIN;
    }

    public function isEditor (): bool
    {
        return $this->role === self::ROLE_EDITOR;
    }




    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'username',
        'role',
        'password',
        'provider',
        'provider_id',
        'provider_token',
        'provider_avatar',
        'github',
        'linkedin',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

}
