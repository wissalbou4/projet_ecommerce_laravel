<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POS System</title>

    {{-- Bootstrap CSS (v5.3.0) --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Bootstrap Icons --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    @livewireStyles
    <style>
        body {
            background-color: #f8f9fa;
        }
        .card img {
            height: 100px;
            object-fit: contain;
        }
        .btn {
            border-radius: 10px;
        }
        .badge-price {
            position: absolute;
            top: 5px;
            left: 5px;
            background-color: #007bff;
            color: white;
            font-size: 0.75rem;
            padding: 2px 6px;
            border-radius: 5px;
        }
        .badge-stock {
            position: absolute;
            top: 5px;
            right: 5px;
            background-color: #17a2b8;
            color: white;
            font-size: 0.75rem;
            padding: 2px 6px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
  
<div class="container-fluid">
            <div class="p-3">
                    {{-- Produits dynamiques via Livewire --}}
                        @livewire('pos')
            </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@livewireScripts
</body>
</html>
