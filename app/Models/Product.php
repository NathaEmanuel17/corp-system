<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'price', 'stock'];

    public function photos()
    {
        return $this->hasMany(ProductPhoto::class);
    }

    public function saleItems()
    {
        return $this->hasMany(SaleItem::class);
    }
    
    public function getAvailableQuantityAttribute()
    {
        $soldQuantity = SaleItem::where('product_id', $this->id)->sum('quantity');
        $availableQuantity = $this->stock - $soldQuantity;
        return max($availableQuantity, 0);
    }
}
