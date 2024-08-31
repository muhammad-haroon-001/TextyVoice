<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CustomPage extends Model
{
  use HasFactory;
  use SoftDeletes;

  protected $fillable = [
    'name',
    'blade_view',
    'slug',
    'page_key',
    'meta_title',
    'meta_description',
    'sitemap',
    'content_keys'
  ];
}
