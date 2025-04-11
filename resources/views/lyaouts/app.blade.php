<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommerce</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }
        
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        
        header {
            background-color: #2c3e50;
            color: white;
            padding: 1rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .logo {
            font-size: 1.5rem;
            font-weight: bold;
        }
        
        nav ul {
            display: flex;
            list-style: none;
        }
        
        nav ul li {
            margin-left: 1rem;
        }
        
        nav ul li a {
            color: white;
            text-decoration: none;
        }
        
        .contact-btn {
            background-color: #e74c3c;
            color: white;
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        
        .main-container {
            display: flex;
            flex: 1;
        }
        
        .sidebar {
            width: 250px;
            background-color: #34495e;
            color: white;
            padding: 1rem;
        }
        
        .sidebar h2 {
            margin-bottom: 1rem;
            font-size: 1.2rem;
        }
        
        .sidebar ul {
            list-style: none;
        }
        
        .sidebar ul li {
            margin-bottom: 0.8rem;
        }
        
        .sidebar ul li a {
            color: white;
            text-decoration: none;
            display: block;
            padding: 0.5rem;
            border-radius: 4px;
            transition: background-color 0.3s;
        }
        
        .sidebar ul li a:hover {
            background-color: #2c3e50;
        }
        
        main {
            flex: 1;
            padding: 2rem;
            background-color: #f5f5f5;
        }
        
        footer {
            background-color: #2c3e50;
            color: white;
            text-align: center;
            padding: 1rem;
        }
    </style>
</head>
<body>
   @include('lyaouts.header')
    
    <div class="main-container">
        @include('lyaouts.asiedbare')
        
        <main>
            @yield('content')
        </main>
    </div>
    
    @include('lyaouts.footer')
</body>
</html>