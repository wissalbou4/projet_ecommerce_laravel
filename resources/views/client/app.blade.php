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
    <div class="row">
        {{-- Sidebar: Panier --}}
        <div class="col-md-3 border-end bg-light">
            <menu>  <div class="d-flex align-items-center gap-3">
                    <button class="btn btn-outline-primary rounded-pill"><i class="bi bi-person-circle"></i> Kim Do Won</button>
                    <button class="btn btn-outline-primary rounded-pill"><i class="bi bi-house-door"></i> warehouse</button>
                </div></menu>
            <div class="p-3">
                <div class="d-flex justify-content-between">
                    <span><strong>Article</strong></span>
                    <span><strong>Quantité</strong></span>
                    <span><strong>Prix</strong></span>
                    <span><strong>Sub total</strong></span>
                    <span><strong>Action</strong></span>
                </div>
                

                <div class="mt-4">
                    <div class="mb-2">
                        <label>Tax</label>
                        <input type="number" class="form-control" placeholder="%" />
                    </div>

                    <div class="mb-2">
                        <label>Discount</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="discountType" value="fixed" checked>
                            <label class="form-check-label">Fixed</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="discountType" value="percent">
                            <label class="form-check-label">Percentage</label>
                        </div>
                        <input type="number" class="form-control mt-2" placeholder="$" />
                    </div>

                    <div class="mb-2">
                        <label>Shipping</label>
                        <input type="number" class="form-control" placeholder="$" />
                    </div>

                    <div class="mt-3">
                        <p>Total QTY: <strong>0</strong></p>
                        <p>Sub Total: <strong>$0.00</strong></p>
                        <h5>Total: <strong>$0.00</strong></h5>
                    </div>

                    <div class="d-flex justify-content-between">
                        <button class="btn btn-danger w-50 me-2">Reset</button>
                        <button class="btn btn-success w-50">Pay Now</button>
                    </div>
                </div>
            </div>
        </div>

        {{-- Content principale --}}
        <div class="col-md-9">
            {{-- Top Bar --}}
            <div class="d-flex align-items-center justify-content-between p-3 border-bottom">
              

                <input type="text" class="form-control w-50 mx-3" placeholder="Scan/Search Article by Code Name" />

                <div class="d-flex align-items-center gap-2">
                    <button class="btn btn-outline-secondary"><i class="bi bi-grid"></i></button>
                    <button class="btn btn-outline-secondary position-relative">
                        <i class="bi bi-bag"></i>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">0</span>
                    </button>
                    <button class="btn btn-outline-secondary"><i class="bi bi-fullscreen"></i></button>
                    <button class="btn btn-outline-secondary"><i class="bi bi-sliders"></i></button>
                </div>
            </div>
            {{-- Filtres --}}
            <div class="p-3">
                    <div class="mb-2 d-flex flex-wrap gap-2">
                        <button class="btn btn-outline-primary" wire:click="selectFamille(null)">All</button>
                        @foreach($familles as $famille)
                            <button class="btn btn-outline-secondary"
                                    wire:click="selectFamille({{ $famille->id }})">
                                {{ $famille->libelle }}
                            </button>
                        @endforeach
                    </div>
                </div>
                <div class="mb-2 d-flex flex-wrap gap-2">
                    <button class="btn btn-primary">All Brands</button>
                    <button class="btn btn-outline-secondary">Colorss</button>
                    <button class="btn btn-outline-secondary">Lion Test</button>
                    <button class="btn btn-outline-secondary">Laptop</button>
                    <button class="btn btn-outline-secondary">A & S Company</button>
                    <button class="btn btn-outline-secondary">HP</button>
                    <button class="btn btn-outline-secondary">trest11qa</button>
                </div>
            </div>

            <!-- {{-- Produits --}}
            @php 
                $articles = \App\Models\Article::all();
            @endphp
            <div class="row p-3">
                @foreach ($articles as $article)
                    <div class="col-md-2 mb-3">
                        <div class="card h-100 text-center p-2 position-relative">
                            <div class="badge-price">${{ number_format($article->price, 2) }}</div>
                            <div class="badge-stock">{{ $article->stock }} {{ $article->unit }}</div>
                            <img src="{{ $article->image_url ?? asset('no-image.png') }}" class="img-fluid" alt="Article">
                            <div class="card-body p-1">
                                <h6 class="mb-0">{{ $article->name }}</h6>
                                <small>{{ $article->code }}</small>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div> -->
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@livewireScripts
</body>
</html>