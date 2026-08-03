<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Manager</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:'Poppins',sans-serif;
        }

        body{
            background:#f1f5f9;
        }

        .sidebar{
            width:260px;
            height:100vh;
            position:fixed;
            left:0;
            top:0;
            background:linear-gradient(180deg,#0f172a,#1e293b);
            color:white;
            padding:25px;
        }

        .sidebar h3{
            margin-bottom:40px;
            font-weight:700;
        }

        .sidebar a{
            display:flex;
            align-items:center;
            gap:12px;
            color:#cbd5e1;
            text-decoration:none;
            padding:14px 18px;
            border-radius:12px;
            margin-bottom:10px;
            transition:.3s;
        }

        .sidebar a:hover{
            background:#2563eb;
            color:white;
            transform:translateX(5px);
        }

        .content{
            margin-left:260px;
            padding:35px;
        }

        .topbar{
            background:#fff;
            padding:18px 25px;
            border-radius:15px;
            display:flex;
            justify-content:space-between;
            align-items:center;
            box-shadow:0 10px 30px rgba(0,0,0,.08);
            margin-bottom:25px;
        }

        .card{
            border:none;
            border-radius:20px;
            box-shadow:0 15px 35px rgba(0,0,0,.08);
        }

        .btn{
            border-radius:12px;
        }

        .table{
            margin:0;
        }

        .mobile-toggle {
            display: none;
            background: none;
            border: none;
            font-size: 1.5rem;
            cursor: pointer;
        }

        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
                z-index: 1050;
            }
            .sidebar.show {
                transform: translateX(0);
            }
            .content {
                margin-left: 0;
                padding: 15px;
            }
            .mobile-toggle {
                display: block;
            }
            .sidebar-overlay {
                display: none;
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(0,0,0,0.5);
                z-index: 1040;
            }
            .sidebar-overlay.show {
                display: block;
            }
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

<div class="sidebar-overlay" id="sidebarOverlay"></div>

<div class="content">

    <div class="topbar">

        <div class="d-flex align-items-center gap-3">
            <button class="mobile-toggle" id="mobileToggle">
                <i class="bi bi-list"></i>
            </button>
            <h2 class="fw-bold mb-0 fs-4">
                Admin Dashboard
            </h2>
        </div>

        <div class="d-flex align-items-center gap-3">

            <span class="text-secondary">
                👋 Bonjour Admin
            </span>

            
            <button class="btn btn-outline-danger btn-sm" disabled>
                Logout
            </button>

        </div>

    </div>

    @yield('content')

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const toggleBtn = document.getElementById('mobileToggle');
        const sidebar = document.querySelector('.sidebar');
        const overlay = document.getElementById('sidebarOverlay');

        toggleBtn.addEventListener('click', function () {
            sidebar.classList.toggle('show');
            overlay.classList.toggle('show');
        });

        overlay.addEventListener('click', function () {
            sidebar.classList.remove('show');
            overlay.classList.remove('show');
        });
    });
</script>

@if(session('success'))
<script>
Swal.fire({
    icon: 'success',
    title: 'Succès',
    text: '{{ session("success") }}',
    timer: 2000,
    showConfirmButton: false
});
</script>
@endif

</body>
</html>