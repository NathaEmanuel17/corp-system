<?php

namespace App\Repositories;

use App\Models\Sale;
use App\Models\SaleItem;
use App\Models\Product;

class SaleRepository extends BaseRepository
{
    public function __construct(protected Sale $sale)
    {
        parent::__construct($sale);
    }    

    public function calculateAvailableStock(Sale $sale): array
    {
        $stockInfo = [];

        foreach ($sale->items as $item) {
            $productId = $item->product->id;
            $soldQuantity = SaleItem::where('product_id', $productId)->sum('quantity');
            $availableQuantity = $item->product->stock - $soldQuantity;

            $stockInfo[] = [
                'product_id' => $productId,
                'available_quantity' => max($availableQuantity, 0),
            ];
        }

        return $stockInfo;
    }

    public function getAllSalesWithItems()
    {
        return $this->sale->with('items')->get();
    }
    
    public function getTotalProductsSold(): int
    {
        return SaleItem::sum('quantity');
    }

    public function getTotalSalesValue(): float
    {
        return Sale::sum('total_amount');
    }

    public function getBestSellingProduct(): array
    {
        $bestSellingProduct = SaleItem::select('product_id', \DB::raw('SUM(quantity) as total_sold'))
            ->groupBy('product_id')
            ->orderBy('total_sold', 'desc')
            ->first();

        if ($bestSellingProduct) {
            $product = Product::find($bestSellingProduct->product_id);
            return [
                'product_name' => $product->name,
                'product_id' => $product->id,
                'total_sold' => $bestSellingProduct->total_sold,
            ];
        }

        return [];
    }
    public function getTotalProductsRegistered(): int
    {
        return Product::count();
    }
}
