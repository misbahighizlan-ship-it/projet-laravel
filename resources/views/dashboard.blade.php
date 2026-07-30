@extends('layouts.app')

@section('content')

<div class="row">

    <div class="col-md-4">

        <div class="card">

            <div class="card-body text-center">

                <h5>Total Products</h5>

                <h1 class="display-4 text-primary">
                    {{ $totalProducts }}
                </h1>

            </div>

        </div>

    </div>

    <div class="col-md-8">

        <div class="card">

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

</div>

@endsection