<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $casts = [
        'published_at' => 'datetime',
    ];


    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function scopePublished($query)
    {
        $query->where('published_at', '<=', Carbon::now());
    }
    public function scopeFeatured($query)
    {
        $query->where('featured', true);
    }
    public function getReadingTime()
    {
        $wordCount = str_word_count(strip_tags($this->body));
        $readingTime = round($wordCount / 250);

        return ($readingTime == 0) ? 1 : $readingTime;
    }

    public function getExcerptAttribute()
    {
        return substr($this->body, 0, 150);
    }

}
