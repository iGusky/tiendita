<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;
use Inertia\ResponseFactory;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        $products = Product::all();
        return Inertia::render('Inventory/Index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return Inertia::render('Inventory/AddProduct');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'code' => 'required|string|max:20',
            'description' => 'required|string|max:255',
            'price' => 'required|numeric|min:1',
            'stock' => 'required|numeric|min:1',
        ]);

        Product::create($request->all());
        return redirect()
            ->route('productos.index')
            ->with('message', 'Producto agregado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($code)
    {

        $product = Product::find($code);
        return inertia(
            'Inventory/AddProduct',
            [
                'product' => $product,
                'isUpdating' => true
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $code)
    {
        $validated = $request->validate([
            'code' => 'required|string|max:20',
            'description' => 'required|string|max:255',
            'price' => 'required|numeric|min:1',
            'stock' => 'required|numeric|min:1',
        ]);

        $product = Product::find($code);
        $product->update($validated);
        $product->save();

        return redirect()
            ->route('productos.index')
            ->with('message', 'Producto actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($code): Response
    {
        $product = Product::find($code);
        $result = $product->delete();
        return Inertia::render('Inventory/Index', [
            "message" => "Producto eliminado correctamente",
            "done" => true
        ]);
    }

    public function toggle($code)
    {
        $product = Product::find($code);
        if ($product->deleted_at == null) $product->delete();
        else $product->restore();
        return redirect()
            ->route('productos.index')
            ->with('message', 'Operación realizada correctamente');
    }
}
