<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'title_ar',
        'title_en',
        'slug',
        'content_ar',
        'content_en',
        'image',
        'is_published',
    ];

    // Helper to get translated title
    public function getTitleAttribute()
    {
        if (app()->getLocale() == 'en' && !empty($this->title_en)) {
            return $this->title_en;
        }
        return $this->title_ar;
    }

    // Helper to get translated content
    public function getContentAttribute()
    {
        if (app()->getLocale() == 'en' && !empty($this->content_en)) {
            return $this->content_en;
        }
        return $this->content_ar;
    }
}
