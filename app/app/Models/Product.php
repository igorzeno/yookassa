<?php

namespace App\Models;

use App\Models\Scopes\DraftScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Support\Facades\Request;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [];

    protected $casts = [
        'draft' => 'boolean',
        'price' => 'float',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected static function boot(): void
    {
        parent::boot();
        static::addGlobalScope(new DraftScope());
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    public function carts()
    {
        return $this->belongsToMany(Cart::class);
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }

    public function discount()
    {
        return $this->belongsTo(Discount::class);
    }

    protected function scopeSearchCategoryTags($query, $request)
    {
        return $query->when($request->input('category'),
                fn($query) => $query->where('category_id', $request->input('category'))
            )
            ->when($request->input('tags'),
                fn($query) => $query->whereHas('tags',
                    fn($query) => $query->whereIn('tag_id', $request->input('tags'))
                )
            );
    }

}
