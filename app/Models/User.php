<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Events\UserCreatedEvent;
use App\Events\UserDeletedEvent;
use App\Events\UserUpdatedEvent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    //Table name
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'role_id',
        'name',
        'lastname',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $dispatchesEvents = [
        'created' => UserCreatedEvent::class,
        'updated' => UserUpdatedEvent::class,
        'deleted' => UserDeletedEvent::class,
    ];

    public function role(): BelongsTo {
        return $this->belongsTo(Role::class);
    }

    // accessor
    public function getFullnameAttribute(): string {
        return $this->name . ' ' . $this->lastname;
    }

    // mutator
    public function setPasswordAttribute($password): void {
        $this->attributes['password'] = Hash::make($password);
    }

    // example google auth
    public function get2FATokenAttribute() {
        decrypt($this->faToken);
    }
    public function set2FATokenAttribute($input) {
        $this->attributes['2f_aToken'] = encrypt($input);
    }
}
