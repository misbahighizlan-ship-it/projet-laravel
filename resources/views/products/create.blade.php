@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>
        <h2 class="fw-bold">Ajouter un Produit</h2>
        <p class="text-muted mb-0">Ajoutez un nouveau produit à votre stock.</p>
    </div>

    <a href="{{ route('products.index') }}" class="btn btn-outline-secondary">
        <i class="bi bi-arrow-left"></i> Retour
    </a>

</div>

<div class="card shadow border-0 rounded-4">

    <div class="card-body p-4">

        <form action="{{ route('products.store') }}" method="POST">

            @csrf

            <div class="mb-3">
                <label class="form-label fw-semibold">Nom</label>
                <input
                    type="text"
                    name="name"
                    class="form-control"
                    placeholder="Nom du produit"
                    required>
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Description</label>

                <textarea
                    name="description"
                    class="form-control"
                    rows="4"
                    placeholder="Description..."
                    required></textarea>
            </div>

            <div class="row">

                <div class="col-md-6">

                    <div class="mb-3">

                        <label class="form-label fw-semibold">Prix (DH)</label>

                        <input
                            type="number"
                            step="0.01"
                            name="price"
                            class="form-control"
                            placeholder="0.00"
                            required>

                    </div>

                </div>

                <div class="col-md-6">

                    <div class="mb-3">

                        <label class="form-label fw-semibold">Quantité</label>

                        <input
                            type="number"
                            name="quantity"
                            class="form-control"
                            placeholder="0"
                            required>

                    </div>

                </div>

            </div>

            <div class="d-flex gap-2">

                <button class="btn btn-primary">
                    <i class="bi bi-check-circle"></i>
                    Enregistrer
                </button>

                <a href="{{ route('products.index') }}" class="btn btn-light border">
                    Annuler
                </a>

            </div>

        </form>

    </div>

</div>

@endsection