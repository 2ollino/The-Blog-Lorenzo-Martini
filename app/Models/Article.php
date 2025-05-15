<?php

namespace App\Models;

use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Article extends Model
{
    use HasFactory, Searchable;

    protected $fillable = ['title', 'subtitle', 'image', 'category_id', 'user_id', 'body' , 'is_accepted'];

    public function toSearchableArray()
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'subtitle' => $this->subtitle,
            'body' => $this->body,
            'category' => $this->category->name
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
