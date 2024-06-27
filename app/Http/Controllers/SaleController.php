<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Http\Requests\StoreSaleRequest;
use App\Http\Requests\UpdateSaleRequest;
use App\Services\SaleService;
use Illuminate\Http\Request;
use PDF;

class SaleController extends Controller
{
    public function __construct(protected SaleService $saleService)
    {
        $this->saleService = $saleService;
    }
    
    public function report()
    {
        $report = $this->saleService->generateSalesReport();

        $pdf = PDF::loadView('pages.app.sales.report', compact('report'));

        return $pdf->download('relatorio_vendas.pdf');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $sales = $this->saleService->paginate(10, $request->all());
        $clients = $this->saleService->findAllClients();
        $totalProductsSold = $this->saleService->getTotalProductsSold();
        $totalSalesValue =  $this->saleService->getTotalSalesValue();
        $bestSellingProduct = $this->saleService->getBestSellingProduct();
        $totalProductsRegistered = $this->saleService->getTotalProductsRegistered();
        $totalClients = $this->saleService->getTotalClients();
     
        return view('pages.app.sales.index', compact('sales', 'clients', 'totalProductsSold', 'totalSalesValue', 'bestSellingProduct', 'totalProductsRegistered', 'totalClients'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSaleRequest $request)
    {
        return $this->saleService->store($request->validated());
    }

    /**
     * Display the specified resource.
     */
    public function show(Sale $sale)
    {
        $sale = $this->saleService->find($sale);
        return view('pages.app.sales.show', compact('sale'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sale $sale)
    {
        $sale = $this->saleService->find($sale);
        $stock =  $this->saleService->productStock($sale)[0]['available_quantity'];
        $clients = $this->saleService->findAllClients();

        return view('pages.app.sales.edit', compact('sale', 'clients', 'stock'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSaleRequest $request, Sale $sale)
    {
        return $this->saleService->update($sale->id, $request->validated());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sale $sale)
    {
        return $this->saleService->delete($sale);
    }
}
