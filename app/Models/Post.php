<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Support\Facades\DB;

class Post extends Model
{
    use HasFactory, Sluggable;
    protected $guarded = ['id'];

    public function genre()
    {
        return $this->belongsToMany(Genre::class, 'post_genres');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function views()
    {
        return $this->hasOne(PostView::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'post_id');
    }

    public function scopeFilter($query, array $filters)
    {

        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where(function ($query) use ($search) {
                $query->where('title', 'like', '%' . $search . '%')
                    ->orWhere('sinopsis', 'like', '%' . $search . '%');
            });
        });

        $query->when($filters['category'] ?? false, function ($query, $category) {
            return $query->whereHas('category', function ($query) use ($category) {
                $query->where('name', $category);
            });
        });

        $query->when(
            $filters['genre'] ?? false,
            fn ($query, $genre) =>
            $query->whereHas(
                'genre',
                fn ($query) =>
                $query->where('name', 'like', '%' . $genre . '%')
            )
        );
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
