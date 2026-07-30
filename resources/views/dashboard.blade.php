<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            background:#f4f6f9;
        }

        .card-dashboard{
            border:none;
            border-radius:15px;
            box-shadow:0 10px 25px rgba(0,0,0,.08);
            transition:.3s;
        }

        .card-dashboard:hover{
            transform:translateY(-5px);
        }

        .title{
            font-weight:bold;
        }
    </style>

</head>
<body>

<div class="container mt-5">

    <h1 class="mb-4 fw-bold">
        Dashboard Admin
    </h1>

    <div class="row">

        <div class="col-md-4">

            <div class="card card-dashboard">

                <div class="card-body">

                    <h5 class="card-title">
                        Nombre de Produits
                    </h5>

                    <h1 class="display-4 text-primary">
                        {{ $totalProducts }}
                    </h1>

                </div>

            </div>

        </div>

        <div class="col-md-8">

            <div class="card card-dashboard">

                <div class="card-body">

                    <h4 class="title">
                        Gestion des Produits
                    </h4>

                    <p class="text-muted">
                        Bienvenue dans votre tableau de bord administrateur.
                    </p>

                    <a href="{{ route('products.index') }}"
                       class="btn btn-primary">

                        Gérer les Produits

                    </a>

                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>