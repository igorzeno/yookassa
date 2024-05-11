<?php

namespace App\Models;

use App\Models\Scopes\DraftScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
