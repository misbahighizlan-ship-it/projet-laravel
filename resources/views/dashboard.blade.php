@extends('layouts.app')

@section('content')

<div class="row g-4">

    <div class="col-md-3">
        <div class="card shadow border-0 rounded-4 text-center p-4">
            <h6>Total Produits</h6>
            <h2 class="text-primary">{{ $totalProducts }}</h2>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card shadow border-0 rounded-4 text-center p-4">
            <h6>Stock Total</h6>
            <h2 class="text-success">{{ $totalStock }}</h2>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card shadow border-0 rounded-4 text-center p-4">
            <h6>Valeur Stock</h6>
            <h2 class="text-warning">
                {{ number_format($totalValue, 2) }} DH
            </h2>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card shadow border-0 rounded-4 text-center p-4">
            <h6>Stock Faible</h6>
            <h2 class="text-danger">{{ $lowStock }}</h2>
        </div>
    </div>

</div>

<div class="mt-4">

    <div class="card shadow border-0 rounded-4">

        <div class="card-body">

            <h3>Bienvenue 👋</h3>

            <p class="text-muted">
                Gérez vos produits facilement avec votre Dashboard Laravel.
            </p>

            <a href="{{ route('products.index') }}" class="btn btn-primary">
                Gérer les Produits
            </a>

        </div>

    </div>

</div>

@endsection