<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'posts';

    protected $fillable = [
        'user_id',
        'category_id',
        'title',
        'slug',
        'content',
    ];

    protected $hidden = [
        /*'user_id',
        'category_id',*/
    ];

    protected $casts = [
        /*'email_verified_at' => 'datetime',*/
    ];

    protected $appends = [
        'user-and-category',
    ];

    public function getUserAndCategoryAttribute() {
        return $this->user_id . ' - ' . $this->category_id;
        //return $this->attributes['user_and_category'] = $this->user_id . ' - ' . $this->category_id;
    }
    

    public function category(): BelongsTo {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function author(): BelongsTo {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
