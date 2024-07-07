<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Space extends Model
{
    use HasFactory;

    protected $table = 'spaces';
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
            'unit',
            'standard_capacity',
            'extra_capacity',
            'prices',
            'responsible_id',
            'address',
            'description',
        ];

    protected $casts =
        [
            'prices' => 'array',
        ];

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function responsible(): BelongsTo
    {
        return $this->belongsTo(User::class, 'responsible_id');
    }
}
