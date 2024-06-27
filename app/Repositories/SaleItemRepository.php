<?php

namespace App\Repositories;

use App\Models\SaleItem;

class SaleItemRepository extends BaseRepository
{
    public function __construct(protected SaleItem $saleItem)
    {
        parent::__construct($saleItem);
    }    
     /**
     * Find a sale item by a specific attribute.
     *
     * @param string $attribute
     * @param mixed $value
     * @return SaleItem|null
     */
    public function findBy(string $attribute, $value): ?SaleItem
    {
        try {
            return $this->obj->where($attribute, $value)->firstOrFail();
        } catch (ModelNotFoundException $e) {
            return null;
        }
    }
}
