<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    // Dashboard
    public function dashboard()
    {
        $totalProducts = Product::count();

        $totalStock = Product::sum('quantity');

        $totalValue = Product::sum(DB::raw('price * quantity'));

        $lowStock = Product::where('quantity', '<=', 5)->count();

        return view('dashboard', compact(
            'totalProducts',
            'totalStock',
            'totalValue',
            'lowStock'
        ));
    }

    // Afficher tous les produits
    public function index(Request $request)
    {
        $search = $request->search;

        $products = Product::where('name', 'like', '%' . $search . '%')
            ->orWhere('description', 'like', '%' . $search . '%')
            ->paginate(5);

        return view('products.index', compact('products', 'search'));
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
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $imageName = null;

        if ($request->hasFile('image')) {

            // Enregistrer l'image dans storage/app/public/products
            $imageName = $request->file('image')->store('products', 'public');

        }

        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'image' => $imageName,
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
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('image')) {

            // Supprimer l'ancienne image
            if ($product->image && Storage::disk('public')->exists($product->image)) {
                Storage::disk('public')->delete($product->image);
            }

            $imageName = $request->file('image')->store('products', 'public');

        } else {

            $imageName = $product->image;

        }

        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'image' => $imageName,
        ]);

        return redirect()->route('products.index')
            ->with('success', 'Produit modifié avec succès.');
    }

    // Supprimer un produit
    public function destroy(Product $product)
    {
        if ($product->image && Storage::disk('public')->exists($product->image)) {
            Storage::disk('public')->delete($product->image);
        }

        $product->delete();

        return redirect()->route('products.index')
            ->with('success', 'Produit supprimé avec succès.');
    }
}