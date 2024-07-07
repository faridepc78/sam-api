<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Salary extends Model
{
    use HasFactory;


    protected $table = 'salaries';
    protected $guarded =
        [
            'id',
            'created_at',
            'updated_at',
        ];
    protected $fillable =
        [
            'clerk_id',
            'monthly_salary',
            'monthly_daily',
            'sms',
        ];

    const ACTIVE = 'active';
    const INACTIVE = 'inactive';
    static array $sms =
        [
            self::ACTIVE,
            self::INACTIVE
        ];
    public function clerk(): BelongsTo
    {
        return $this->belongsTo(Clerk::class, 'clerk_id');
    }

}
