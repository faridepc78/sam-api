<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Sanctum\NewAccessToken;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    protected $table = 'users';
    protected $guarded =
        [
            'id',
            'created_at',
            'updated_at',
        ];
    protected $fillable =
        [
            'author_id',
            'name',
            'mobile',
            'province',
            'city',
            'address',
            'description',
            'password',
        ];
    protected $hidden =
        [
            'password',
        ];
    protected $casts =
        [
            'password' => 'hashed',
        ];

    public function createToken(string            $name,
                                array             $abilities = ['*'],
                                DateTimeInterface $expiresAt = null,
                                string            $plainTextToken = null):
    NewAccessToken
    {
        $plainTextToken = $plainTextToken ?? Str::random(500);

        $token = $this->tokens()->create([
            'name' => $name,
            'abilities' => $abilities,
            'token' => $custom_token ?? hash('SHA256', $plainTextToken),
            'expires_at' => $expiresAt
        ]);

        return new NewAccessToken($token, $token->getKey()
            . '|' . $plainTextToken);
    }

    public static array $admin =
        [
            'name' => 'farid shishebori',
            'mobile' => '+989162154221',
            'province' => 'yazd',
            'city' => 'yazd',
            'address' => 'yazd',
            'description' => 'I am backend developer(faridepc78)',
            'password' => '12345678',
        ];

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }
}
