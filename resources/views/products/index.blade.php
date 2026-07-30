@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <h2 class="fw-bold">Gestion des Produits</h2>

    <a href="{{ route('products.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-circle"></i> Ajouter Produit
    </a>

</div>

<div class="card">

    <div class="card-body">

        <table class="table table-hover align-middle">

            <thead class="table-dark">

            <tr>

                <th>ID</th>
                <th>Nom</th>
                <th>Description</th>
                <th>Prix</th>
                <th>Quantité</th>
                <th width="180">Actions</th>

            </tr>

            </thead>

            <tbody>

            @forelse($products as $product)

                <tr>

                    <td>{{ $product->id }}</td>

                    <td>
                        <strong>{{ $product->name }}</strong>
                    </td>

                    <td>{{ $product->description }}</td>

                    <td>{{ $product->price }} DH</td>

                    <td>

                        <span class="badge bg-success">
                            {{ $product->quantity }}
                        </span>

                    </td>

                    <td>

                        <a href="{{ route('products.edit',$product) }}"
                           class="btn btn-warning btn-sm">

                            <i class="bi bi-pencil-square"></i>

                        </a>

                        <form action="{{ route('products.destroy',$product) }}"
                              method="POST"
                              class="d-inline">

                            @csrf
                            @method('DELETE')

                            <button
                                onclick="return confirm('Supprimer ce produit ?')"
                                class="btn btn-danger btn-sm">

                                <i class="bi bi-trash"></i>

                            </button>

                        </form>

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="6" class="text-center py-5">

                        Aucun produit disponible.

                    </td>

                </tr>

            @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection