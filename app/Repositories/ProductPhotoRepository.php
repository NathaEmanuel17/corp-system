<?php

namespace App\Repositories;

use App\Models\ProductPhoto;
use Illuminate\Support\Facades\DB;

class ProductPhotoRepository extends BaseRepository
{
    protected ProductPhoto $model;

    public function __construct(ProductPhoto $productPhoto)
    {
        parent::__construct($productPhoto);
        $this->model = $productPhoto;
    }

    /**
     * Delete all product photos by product ID.
     *
     * @param int $productId
     * @return void
     */
    public function deleteByProductId(int $productId)
    {
        $this->model->where('product_id', $productId)->delete();
    }

    /**
     * Store multiple product photos.
     *
     * @param array $photos
     * @return void
     * @throws \Exception
     */
    public function storeMultiple(array $photos)
    {
        DB::beginTransaction();

        try {
            foreach ($photos as $photo) {
                $this->model->create($photo);
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw new \Exception("Erro ao salvar fotos do produto: " . $e->getMessage());
        }
    }
}
