<?php

namespace App\Models\Emd;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tools extends Model
{
    use HasFactory;

    protected $table = 'emd_tools';
    protected $fillable = ['tool_name', 'tool_slug', 'meta_title', 'meta_description', 'language_id', 'is_home', 'parent', 'content_keys'];
}
