<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Builder;

class Category extends Model
{
    /** @use HasFactory<\Database\Factories\CategoryFactory> */
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'description',
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    protected static function booted(): void
    {
        // static::creating(function (Category $category) {
        //     $category->slug = Str::slug($category->name);
        // });

        // static::updating(function (Category $category) {
        //     $category->slug = Str::slug($category->name);
        // });
    }

    public function scopeSearch(Builder $query, ?string $search): Builder
    {
        return $query->when(
            $search,
            fn (Builder $query) =>
                $query->where('name', 'like', "%{$search}%")
        );
    }

    public function scopeLatestFirst(Builder $query): Builder
    {
        return $query->latest();
    }
}
