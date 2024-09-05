<?php

namespace App\Models\Emd;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Emd\Blog;

class Media extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'path',
        'dimensions', // Fixed typo here as well
    ];

    public function blog()
    {
        return $this->hasMany(Blog::class, 'image_id');
    }
}
