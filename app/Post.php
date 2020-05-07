<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    use Sluggable;
    public $table = 'posts';

    public $fillable = [
        'title_uz', 'short_uz', 'content_uz',
        'title_ru', 'short_ru', 'content_ru',
        'title_en', 'short_en', 'content_en',
        'slug_uz', 'slug_ru', 'slug_en',
        'img', 'thumb', 'views', 'id_cat'
    ];

    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'id_cat');
    }
    public function sluggable()
    {
        return [
            'slug_uz' => [
                'source' => 'title_uz'
            ],
            'slug_ru' => [
                'source' => 'title_ru'
            ],
            'slug_en' => [
                'source' => 'title_en'
            ]
        ];
    }

    public function translate($attribute)
    {
        $lang = app()->getLocale();

        return $this->getAttribute($attribute.'_'.$lang);
    }

    public function scopeSlug($query, $param)
    {
        $lang = app()->getLocale();
        $slug = 'slug_'.$lang;
        return $query->where($slug, $param);
    }

}
