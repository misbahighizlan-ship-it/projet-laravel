<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Dashboard
    public function dashboard()
    {
        $totalProducts = Product::count();

        return view('dashboard', compact('totalProducts'));
    }

    // Afficher tous les produits
    public function index()
    {
        $products = Product::all();

        return view('products.index', compact('products'));
    }

    // Formulaire d'ajout
    public function create()
    {
        return view('products.create');
    }

    // Enregistrer un produit
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
        ]);

        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'quantity' => $request->quantity,
        ]);

        return redirect()->route('products.index')
            ->with('success', 'Produit ajouté avec succès.');
    }

    // Formulaire de modification
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    // Modifier un produit
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
        ]);

        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'quantity' => $request->quantity,
        ]);

        return redirect()->route('products.index')
            ->with('success', 'Produit modifié avec succès.');
    }

    // Supprimer un produit
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')
            ->with('success', 'Produit supprimé avec succès.');
    }
}