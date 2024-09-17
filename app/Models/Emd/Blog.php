<?php

namespace App\Models\Emd;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Blog extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'title',
        'slug',
        'meta_title',
        'meta_description',
        'language',
        'parent_id',
        'image_id',
        'description',
        'status'
    ];

    public function parent(): BelongsTo
    {
        return $this->belongsTo(Blog::class, 'parent_id');
    }

    public function children(): HasMany
    {
        return $this->hasMany(self::class, 'parent_id');
    }

    public function media()
    {
        return $this->belongsTo(Media::class, 'image_id');
    }
}
