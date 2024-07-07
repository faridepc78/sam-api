<?php

namespace App\Models;

use App\Scopes\ActiveStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Clerk extends Model
{
    use HasFactory;

    protected $table = 'clerks';
    protected $guarded =
        [
            'id',
            'created_at',
            'updated_at',
        ];
    protected $fillable =
        [
            'space_id',
            'first_name',
            'last_name',
            'code',
            'gender',
            'shift_work',
            'mobile',
            'organizational_unit',
            'monthly_salary',
            'monthly_daily',
            'reward',
            'image_id',
            'address',
            'description',
            'bank_account',
            'bank_sheba',
            'bank_number',
            'bank_name',
            'status',
        ];

    const ACTIVE = 'active';
    const INACTIVE = 'inactive';
    static array $statuses =
        [
            self::ACTIVE,
            self::INACTIVE
        ];

    public function image(): BelongsTo
    {
        return $this->belongsTo(Media::class, 'image_id')->withDefault();
    }

    protected static function booted(): void
    {
        static::addGlobalScope(new ActiveStatus());
    }

}
