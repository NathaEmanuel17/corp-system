<?php

namespace App\Repositories;

use App\Models\Product;
use App\Models\SaleItem;

class ProductRepository extends BaseRepository
{
    public function __construct(protected Product $product)
    {
        parent::__construct($product);
    }

    public function paginate(int $perPage, array $filters = [], array $withRelations = [], bool $withTrashed = false): \Illuminate\Pagination\LengthAwarePaginator
    {
        $query = $this->obj->newQuery();

        if (!empty($withRelations)) {
            $query = $query->with($withRelations);
        }

        foreach ($filters as $field => $value) {
            $query->where($field, 'LIKE', "%$value%");
        }

        $paginator = $query->paginate($perPage);

        $paginator->getCollection()->transform(function ($product) {
            $availableQuantity = $this->calculateAvailableQuantity($product);
            $product->setAttribute('available_quantity', $availableQuantity);
            return $product;
        });

        return $paginator;
    }

    public function hasSaleItems(int $productId): bool
    {
        return SaleItem::whereHas('sale', function ($query) use ($productId) {
            $query->where('product_id', $productId);
        })->exists();
    }

    protected function calculateAvailableQuantity(Product $product): int
    {
        $soldQuantity = SaleItem::where('product_id', $product->id)->sum('quantity');
        $availableQuantity = $product->stock - $soldQuantity;

        return max($availableQuantity, 0);
    }
}
