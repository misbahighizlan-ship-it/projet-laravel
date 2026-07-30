<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Manager Dashboard</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
        }

        body{
            background:#f4f7fe;
            font-family:Arial, Helvetica, sans-serif;
        }

        .sidebar{
            width:250px;
            height:100vh;
            position:fixed;
            left:0;
            top:0;
            background:#212529;
            padding-top:20px;
        }

        .sidebar h3{
            color:white;
            text-align:center;
            margin-bottom:40px;
            font-weight:bold;
        }

        .sidebar a{
            display:block;
            color:white;
            text-decoration:none;
            padding:15px 25px;
            transition:.3s;
        }

        .sidebar a:hover{
            background:#0d6efd;
            padding-left:35px;
        }

        .content{
            margin-left:250px;
            padding:30px;
        }

        .topbar{
            background:white;
            border-radius:15px;
            padding:20px;
            box-shadow:0 5px 20px rgba(0,0,0,.08);
            margin-bottom:25px;
        }

        .card{
            border:none;
            border-radius:18px;
            box-shadow:0 10px 25px rgba(0,0,0,.08);
        }

        .table{
            background:white;
        }

        .btn{
            border-radius:10px;
        }
    </style>

</head>

<body>

<div class="sidebar">

    <h3>Task Manager</h3>

    <a href="{{ route('dashboard') }}">
        <i class="bi bi-speedometer2"></i>
        Dashboard
    </a>

    <a href="{{ route('products.index') }}">
        <i class="bi bi-box"></i>
        Produits
    </a>

</div>

<div class="content">

    <div class="topbar d-flex justify-content-between align-items-center">

        <h2>Admin Dashboard</h2>

        <span class="text-secondary">
            Laravel 13
        </span>

    </div>

    @if(session('success'))

        <div class="alert alert-success">

            {{ session('success') }}

        </div>

    @endif

    @yield('content')

</div>

</body>
</html>