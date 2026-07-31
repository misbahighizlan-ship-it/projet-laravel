@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <h2 class="fw-bold">Gestion des Produits</h2>

    <a href="{{ route('products.create') }}" class="btn btn-primary rounded-pill px-4">
        <i class="bi bi-plus-circle"></i>
        Ajouter Produit
    </a>

</div>

<div class="card shadow-sm border-0 rounded-4 mb-4">

    <div class="card-body">

        <form action="{{ route('products.index') }}" method="GET">

            <div class="row g-3">

                <div class="col-md-10">

                    <input
                        type="text"
                        name="search"
                        class="form-control form-control-lg"
                        placeholder="🔍 Rechercher un produit..."
                        value="{{ $search ?? '' }}">

                </div>

                <div class="col-md-2">

                    <button class="btn btn-primary btn-lg w-100">
                        <i class="bi bi-search"></i>
                        Rechercher
                    </button>

                </div>

            </div>

        </form>

    </div>

</div>

<div class="card shadow border-0 rounded-4">

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

                    <td>
                        {{ number_format($product->price,2) }} DH
                    </td>

                    <td>

                        @if($product->quantity <= 5)

                            <span class="badge bg-danger">
                                {{ $product->quantity }}
                            </span>

                        @elseif($product->quantity <= 10)

                            <span class="badge bg-warning text-dark">
                                {{ $product->quantity }}
                            </span>

                        @else

                            <span class="badge bg-success">
                                {{ $product->quantity }}
                            </span>

                        @endif

                    </td>

                    <td>

                        <a href="{{ route('products.edit',$product) }}"
                           class="btn btn-warning btn-sm rounded-circle">

                            <i class="bi bi-pencil-square"></i>

                        </a>

                        <form action="{{ route('products.destroy',$product) }}"
                              method="POST"
                              class="d-inline">

                            @csrf
                            @method('DELETE')

                            <button
                                onclick="return confirm('Voulez-vous vraiment supprimer ce produit ?')"
                                class="btn btn-danger btn-sm rounded-circle">

                                <i class="bi bi-trash"></i>

                            </button>

                        </form>

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="6" class="text-center py-5 text-muted">

                        <i class="bi bi-box-seam fs-1"></i>

                        <br><br>

                        Aucun produit disponible.

                    </td>

                </tr>

            @endforelse

            </tbody>

        </table>

    </div>

</div>
<div class="d-flex justify-content-center mt-4">
    {{ $products->links() }}
</div>
@endsection