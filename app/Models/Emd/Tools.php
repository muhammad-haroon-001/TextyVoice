<?php

namespace App\Models\Emd;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tools extends Model
{
  use HasFactory;
  use SoftDeletes;

  protected $casts = [
    'content_keys' => 'array',
  ];



  protected $fillable = [
    'tool_name',
    'tool_slug',
    'meta_title',
    'meta_description',
    'language',
    'is_home',
    'parent_id',
    'content_keys'
  ];

     // This defines the parent relationship
     public function parent()
     {
         return $this->belongsTo(Tools::class, 'parent_id');
     }

     // This defines the children relationship (if needed)
     public function children(): HasMany
     {
         return $this->hasMany(self::class, 'parent_id');
     }
}
