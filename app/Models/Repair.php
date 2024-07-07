<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Repair extends Model
{
    use HasFactory;
    protected $table = 'repairs';

    protected $guarded =
        [
            'id',
            'created_at',
            'updated_at',
        ];
    protected $fillable =
        [
            'clerk_id',
            'space_id',
            'title',
            'code',
            'price',
            'description',
            'expiration_date',
            'status',
        ];


    const MISSING = 'missing';
    const FAILURE = 'failure';
    const OUT = 'out';
    const OTHER = 'other';
    static array $statuses =
        [
            self::MISSING,
            self::FAILURE,
            self::OUT,
            self::OTHER,
        ];

    public function space(): BelongsTo
    {
        return $this->belongsTo(Space::class, 'space_id')->withDefault();
    }
    public function clerk(): BelongsTo
    {
        return $this->belongsTo(Clerk::class, 'clerk_id')->withDefault();
    }
}
