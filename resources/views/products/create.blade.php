<!DOCTYPE html>
<html>
<head>
    <title>Ajouter Produit</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <h2>Ajouter un produit</h2>

    <form action="{{ route('products.store') }}" method="POST">

        @csrf

        <div class="mb-3">
            <label>Nom</label>
            <input
                type="text"
                name="name"
                class="form-control"
                required>
        </div>

        <div class="mb-3">
            <label>Description</label>

            <textarea
                name="description"
                class="form-control"
                required></textarea>
        </div>

        <div class="mb-3">
            <label>Prix</label>

            <input
                type="number"
                step="0.01"
                name="price"
                class="form-control"
                required>
        </div>

        <div class="mb-3">
            <label>Quantité</label>

            <input
                type="number"
                name="quantity"
                class="form-control"
                required>
        </div>

        <button class="btn btn-success">
            Enregistrer
        </button>

        <a href="{{ route('products.index') }}" class="btn btn-secondary">
            Retour
        </a>

    </form>

</div>

</body>
</html>