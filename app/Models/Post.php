<?php

namespace App\Models;

use App\Models\Tag;
use App\Models\Category;
use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Filterable;

    protected $table = 'posts';
    protected $guarded = false;

    public function category() {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function tags() {
        return $this->belongsToMany(Tag::class, 'post_tag', 'post_id', 'tag_id');
    }
}
