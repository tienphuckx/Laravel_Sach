<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    use HasFactory;

    protected $fillable = [
        'chapter_book_id',
        'chapter_desc',
        'chapter_title',
        'chapter_content',
        'chapter_status',
        'chapter_slug',
    ];

    protected $table = 'chapters';

    public function book()
    {
        return $this->belongsTo('App\Models\Book','chapter_book_id','id');
    }
}
