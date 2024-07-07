<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Cost extends Model
{
    use HasFactory;
    protected $table = 'costs';

    protected $guarded =
        [
            'id',
            'created_at',
            'updated_at',
        ];
    protected $fillable =
        [
            'clerk_id',
            'title',
            'counter',
            'price',
            'description',
            'expiration_date',
        ];
    public function clerk(): BelongsTo
    {
        return $this->belongsTo(Clerk::class, 'clerk_id')->withDefault();
    }
}
