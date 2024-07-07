<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WarehouseEntrance extends Model
{
    use HasFactory;

    protected $table = 'warehouse_entrances';
    protected $guarded =
        [
            'id',
            'created_at',
            'updated_at',
        ];
    protected $fillable =
        [
            'category_id',
            'clerk_id',
            'space_id',
            'title',
            'code',
            'counter',
            'price',
            'description',
            'expiration_date',
            'image_id',
        ];

    public function image(): BelongsTo
    {
        return $this->belongsTo(Media::class, 'image_id')->withDefault();
    }
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id')->withDefault();
    }

    public function space(): BelongsTo
    {
        return $this->belongsTo(Space::class, 'space_id')->withDefault();
    }
    public function clerk(): BelongsTo
    {
        return $this->belongsTo(Clerk::class, 'clerk_id')->withDefault();
    }

}
