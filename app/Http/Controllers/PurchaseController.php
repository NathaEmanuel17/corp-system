<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Services\SaleService;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    public function __construct(protected SaleService $saleService)
    {
        $this->saleService = $saleService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $products = $this->saleService->paginateProducts(10, $request->all());
        
        return view('pages.app.purchase.index', compact('products'));
    }

    public function show(Product $product)
    {
        $clients = $this->saleService->findAllClients();

        $product->availableQuantity = $product->available_quantity;
        return view('pages.app.purchase.create', compact('product', 'clients'));
    }
}
