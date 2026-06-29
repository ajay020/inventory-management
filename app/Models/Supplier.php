<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;

class Supplier extends Model
{
    /** @use HasFactory<\Database\Factories\SupplierFactory> */
    use HasFactory, SoftDeletes;


    protected $fillable = [
        'name',
        'contact_person',
        'email', 
        'phone',
        'address',
        'is_active'
    ];


    public function scopeSearch(
        Builder $query,
        ?string $search
    ): Builder {
        return $query->when(
            $search,
            fn (Builder $query) =>
                $query->where('name', 'like', "%{$search}%")
                    ->orWhere('contact_person', 'like', "%{$search}%")
        );
    }
}
