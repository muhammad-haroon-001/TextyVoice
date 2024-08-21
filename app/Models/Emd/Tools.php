<?php

namespace App\Models\Emd;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tools extends Model
{
  use HasFactory;

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

  public function parent()
  {
    return $this->belongsTo(Tools::class, 'parent_id');
  }
}
