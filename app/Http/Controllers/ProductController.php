<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Afficher tous les produits exist ......
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    // Afficher le formulaire d'ajout
    public function create()
    {
        return view('products.create');
    }

    // Enregistrer un nouveau produit
    public function store(Request $request)
    {
        Product::create($request->all());

        return redirect()->route('products.index')
            ->with('success', 'Produit ajouté avec succès.');
    }

    // Afficher le formulaire de modification
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    // Mettre à jour un produit
    public function update(Request $request, Product $product)
    {
        $product->update($request->all());

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