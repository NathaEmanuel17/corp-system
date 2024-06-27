<?php

namespace App\Services;

use App\Repositories\ProductPhotoRepository;
use App\Repositories\ProductRepository;
use Illuminate\Support\Facades\Storage;

class ProductService
{
    protected ProductRepository $productRepository;
    protected ProductPhotoRepository $productPhotoRepository;

    public function __construct(ProductRepository $productRepository, ProductPhotoRepository $productPhotoRepository)
    {
       $this->productRepository = $productRepository;
       $this->productPhotoRepository = $productPhotoRepository;
    }

    public function paginate(int $perPage, array $filters = [])
    {
        $filteredFilters = FilterService::filter($filters, []);

        return $this->productRepository->paginate($perPage, $filteredFilters, ['photos', 'saleItems']);
    }

    public function store(array $storeProductRequest)
    {
        $product = $this->productRepository->store([
            'name' => $storeProductRequest['name'],
            'description' => $storeProductRequest['description'],
            'price' => $storeProductRequest['price'],
            'stock' => $storeProductRequest['stock'],
        ]);

        $this->storeProductPhotos($product, $storeProductRequest['photos']);

        return redirect()->route('products.index')
            ->with('message', 'Produto cadastrado com sucesso!')
            ->with('type', 'success');
    }

    public function update(int $id, array $updateProductRequest)
    {
        $product = $this->productRepository->find($id, ['photos']);

        
        $this->productRepository->update($id, [
            'name' => $updateProductRequest['name'],
            'description' => $updateProductRequest['description'],
            'price' => $updateProductRequest['price'],
            'stock' => $updateProductRequest['stock'],
        ]);
        
        if (isset($updateProductRequest['photos'])) {
            $this->deleteProductPhotos($product);
            $this->storeProductPhotos($product, $updateProductRequest['photos']);
        }

        return redirect()->route('products.index')
            ->with('message', 'Produto atualizado com sucesso!')
            ->with('type', 'success');
    }

    public function delete(object $product)
    {
        if ($this->productRepository->hasSaleItems($product->id)) {
            return redirect()->back()
                ->with('message', 'Não é possível excluir o produto pois existem itens de venda associados a ele.')
                ->with('type', 'danger');
        }

        $photos = $this->productRepository->find($product->id, ['photos']);
        $this->deleteProductPhotos($photos);
        
        $this->productRepository->delete($product->id);
        
        return redirect()->route('products.index')
            ->with('message', 'Produto excluído com sucesso!')
            ->with('type', 'success');
    }

    protected function storeProductPhotos($product, $photos)
    {
        $photosData = [];
        foreach ($photos as $photo) {
            $path = $photo->store('products', 'public' );
            $photosData[] = [
                'product_id' => $product->id,
                'photo_path' => $path, 
            ];
        }
        $this->productPhotoRepository->storeMultiple($photosData);
    }

    protected function deleteProductPhotos($product)
    {
        $photos = $product->photos()->get();
    
        $this->productPhotoRepository->deleteByProductId($product->id);
    
        foreach ($photos as $photo) {
            Storage::disk('public')->delete($photo->photo_path);
        }
    }
}
