<?php

namespace App\Services;

use App\Repositories\SaleItemRepository;
use App\Repositories\SaleRepository;
use Illuminate\Support\Facades\DB;

class SaleService
{
    protected SaleRepository $saleRepository;
    protected SaleItemRepository $saleItemRepository;

    public function __construct(SaleRepository $saleRepository, SaleItemRepository $saleItemRepository, ProductService $productService, ClientService $clientService)
    {
        $this->productService = $productService;
        $this->clientService = $clientService;
        $this->saleRepository = $saleRepository;
        $this->saleItemRepository = $saleItemRepository;
    }

    public function paginate(int $perPage, array $filters = [])
    {
        $filteredFilters = FilterService::filter($filters, [
            'client' => 'client_id'
        ]);

        return $this->saleRepository->paginate($perPage, $filteredFilters, ['client', 'items.product']);
    }

    public function find(object $sale)
    {
        return $this->saleRepository->find($sale->id, ['client', 'items.product.photos']);
    }

    public function paginateProducts(int $perPage, array $filters = [])
    {
        $filteredFilters = FilterService::filter($filters, []);

        return $this->productService->paginate($perPage, $filteredFilters, ['photos']);
    }

    public function findAllClients()
    {
        return $this->clientService->all();
    }

    public function store(array $storeSaleRequest)
    {
        DB::beginTransaction();

        try {
            $sale = $this->saleRepository->store([
                'client_id' => $storeSaleRequest['client_id'],
                'total_amount' => $storeSaleRequest['total_amount'],
            ]);

            $this->saleItemRepository->store([
                'sale_id' => $sale->id,
                'product_id' => $storeSaleRequest['product_id'],
                'quantity' => $storeSaleRequest['quantity'],
                'price' => $storeSaleRequest['price'],
            ]);

            DB::commit();

            return redirect()->route('purchase.index')
                ->with('message', 'Compra realizada com sucesso!')
                ->with('type', 'success');
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function update(int $id, array $updateSaleRequest)
    {
        DB::beginTransaction();

        try {
            $this->saleRepository->update($id, [
                'client_id' => $updateSaleRequest['client_id'],
                'total_amount' => $updateSaleRequest['total_amount'],
            ]);

            $saleItem = $this->saleItemRepository->findBy('sale_id',  $id);

            $this->saleItemRepository->update($saleItem->id, [
                'quantity' => $updateSaleRequest['quantity'],
            ]);


            DB::commit();

            return redirect()->back()
                ->with('message', 'Venda atualizada com sucesso!')
                ->with('type', 'success');
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function delete(object $sale)
    {
        DB::beginTransaction();
        try {
            $this->saleRepository->delete($sale->id);

            DB::commit();

            return redirect()->route('sales.index')
                ->with('message', 'Venda excluída com sucesso!')
                ->with('type', 'success');
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function productStock(object $sale)
    {
        return $this->saleRepository->calculateAvailableStock($sale);
    }

    public function getTotalProductsSold()
    {
        return $this->saleRepository->getTotalProductsSold();
    }

    public function getTotalSalesValue()
    {
        return $this->saleRepository->getTotalSalesValue();
    }

    public function getBestSellingProduct()
    {
        return $this->saleRepository->getBestSellingProduct();
    }

    public function getTotalProductsRegistered()
    {
        return $this->saleRepository->getTotalProductsRegistered();
    }

    public function getTotalClients()
    {
        return $this->clientService->getTotalClients();
    }

    public function generateSalesReport(array $filters = [])
    {
        

        $sales = $this->saleRepository->getAllSalesWithItems();

        $reportData = [
            'total_sales' => count($sales),
            'total_amount' => $sales->sum('total_amount'),
            'sales_details' => []
        ];

        // Detalhes de cada venda
        foreach ($sales as $sale) {
            $saleDetails = [
                'sale_id' => $sale->id,
                'client_name' => $sale->client->name,
                'total_amount' => $sale->total_amount,
                'items' => []
            ];

            // Detalhes de cada item vendido na venda
            foreach ($sale->items as $item) {
                $itemDetails = [
                    'product_name' => $item->product->name,
                    'quantity' => $item->quantity,
                    'price' => $item->price,
                    'total_price' => $item->quantity * $item->price
                ];

                $saleDetails['items'][] = $itemDetails;
            }

            $reportData['sales_details'][] = $saleDetails;
        }

        return $reportData;
    }
}
