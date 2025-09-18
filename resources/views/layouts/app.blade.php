<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arsip Surat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            display: flex;
            height: 100vh;
        }
        .sidebar {
            width: 220px;
            background: #f8f9fa;
            border-right: 1px solid #ccc;
            padding: 20px;
        }
        .sidebar h3 {
            margin-bottom: 15px;
        }
        .sidebar ul {
            list-style: none;
            padding: 0;
        }
        .sidebar ul li {
            margin: 12px 0;
        }
        .sidebar ul li a {
            text-decoration: none;
            font-weight: bold;
            color: #000;
        }
        .sidebar ul li a:hover {
            color: #0d6efd;
        }
        .content {
            flex: 1;
            padding: 20px;
            overflow-y: auto;
            position: relative;
            z-index: 2; /* supaya tombol bisa diklik */
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <h3>📂 Menu</h3>
        <hr>
        <ul>
            <li><a href="{{ route('archives.index') }}">⭐ Arsip</a></li>
            <li><a href="{{ route('categories.index') }}">⚙️ Kategori Surat</a></li>
            <li><a href="{{ url('about') }}">ℹ️ About</a></li>
        </ul>
    </div>

    <!-- Content -->
    <div class="content">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
