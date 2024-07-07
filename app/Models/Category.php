<?php

namespace App\Models;

use App\Scopes\ActiveStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';
    protected $guarded =
        [
            'id',
            'created_at',
            'updated_at',
        ];
    protected $fillable =
        [
            'title',
            'description',
            'status',
        ];
    const ACTIVE = 'active';
    const INACTIVE = 'inactive';
    static array $statuses =
        [
            self::ACTIVE,
            self::INACTIVE
        ];
    protected static function booted(): void
    {
        static::addGlobalScope(new ActiveStatus());
    }


}
