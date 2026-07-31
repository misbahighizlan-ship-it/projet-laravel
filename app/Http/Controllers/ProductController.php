<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        ->paginate(5); // a la place de get on fait la paginate pour tirer tous les product existe

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

        $imageName = time().'.'.$request->image->extension();

        $request->image->move(public_path('images'), $imageName);

    }

    Product::create([

        'name' => $request->name,
        'description' => $request->description,
        'price' => $request->price,
        'quantity' => $request->quantity,
        'image' => $imageName,

    ]);

    return redirect()->route('products.index')
        ->with('success','Produit ajouté avec succès.');

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