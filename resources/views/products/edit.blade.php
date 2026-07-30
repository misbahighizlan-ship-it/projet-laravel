<!DOCTYPE html>
<html>
<head>
    <title>Modifier Produit</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <h2>Modifier un produit</h2>

    <form action="{{ route('products.update', $product->id) }}" method="POST">

        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nom</label>
            <input
                type="text"
                name="name"
                class="form-control"
                value="{{ $product->name }}"
                required>
        </div>

        <div class="mb-3">
            <label>Description</label>

            <textarea
                name="description"
                class="form-control"
                required>{{ $product->description }}</textarea>
        </div>

        <div class="mb-3">
            <label>Prix</label>

            <input
                type="number"
                step="0.01"
                name="price"
                class="form-control"
                value="{{ $product->price }}"
                required>
        </div>

        <div class="mb-3">
            <label>Quantité</label>

            <input
                type="number"
                name="quantity"
                class="form-control"
                value="{{ $product->quantity }}"
                required>
        </div>

        <button class="btn btn-primary">
            Modifier
        </button>

        <a href="{{ route('products.index') }}" class="btn btn-secondary">
            Retour
        </a>

    </form>

</div>

</body>
</html>