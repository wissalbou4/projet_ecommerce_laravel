<div class="container-fluid">
    <div class="row flex-nowrap min-vh-100">
        <!-- Panier à gauche -->
        <div class="col-md-5 bg-white border-end shadow-sm rounded-start p-3 overflow-auto">
            <h5 class="mb-3">🛒 Panier</h5>

            @if(count($cart) > 0)
                <div class="table-responsive">
                    <table class="table table-sm table-bordered">
                        <thead class="table-light">
                            <tr>
                                <th>Désignation</th>
                                <th>Qté</th>
                                <th>Prix</th>
                                <th>Sub Total</th>
                                <th>Total</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cart as $item)
                                <tr>
                                    <td>{{ $item['designation'] }}</td>
                                    <td>{{ $item['qty'] }}</td>
                                    <td>{{ number_format($item['prix'], 2) }} €</td>
                                    <td>{{ number_format($item['qty'] * $item['prix'], 2) }} €</td>
                                    <td>{{ number_format($item['qty'] * $item['prix'], 2) }} €</td>
                                    <td>
                                        <button wire:click="removeFromCart({{ $item['id'] }})" class="btn btn-sm btn-danger">
                                            <i class="bi bi-x"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <p class="text-muted">Aucun article ajouté.</p>
            @endif

            <hr>

            <!-- Taxe -->
            <div class="row mb-2">
                <div class="col-4"><label>Taxe (%)</label></div>
                <div class="col-8">
                    <input type="number" wire:model="tax" class="form-control form-control-sm" />
                </div>
            </div>

            <!-- Remise -->
            <div class="row mb-2">
                <div class="col-4"><label>Remise</label></div>
                <div class="col-8">
                    <div class="d-flex align-items-center">
                        <input type="number" wire:model="discount" class="form-control form-control-sm me-2" />
                        <div class="form-check me-2">
                            <input type="radio" id="fixed" wire:model="discountType" value="fixed" class="form-check-input">
                            <label for="fixed" class="form-check-label">Fixe</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" id="percent" wire:model="discountType" value="percent" class="form-check-input">
                            <label for="percent" class="form-check-label">%</label>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Livraison -->
            <div class="row mb-2">
                <div class="col-4"><label>Livraison (€)</label></div>
                <div class="col-8">
                    <input type="number" wire:model="shipping" class="form-control form-control-sm" />
                </div>
            </div>

            <hr>

            <div class="mb-2">
                <p class="mb-1"><strong>Total Qté :</strong> {{ $this->totalQty }}</p>
                <p class="mb-1"><strong>Sous-total :</strong> {{ number_format($this->subTotal, 2) }} €</p>
                <h6><strong>Total :</strong> {{ number_format($this->total, 2) }} €</h6>
            </div>

            <!-- Boutons -->
            <div class="d-flex justify-content-between gap-2 mt-3">
                <button class="btn btn-outline-danger w-50" wire:click="resetCart">Réinitialiser</button>
                <button class="btn btn-success w-50" wire:click="payer">Payer</button>
            </div>
        </div>

        <!-- Articles à droite -->
        <div class="col-md-7 bg-light shadow-sm rounded-end p-3 overflow-auto">
            <!-- Filtres familles -->
            <div class="my-3 d-flex flex-wrap gap-2">
                <button class="btn btn-outline-primary {{ is_null($selectedFamille) ? 'active' : '' }}" wire:click="selectFamille(0)">Tous</button>
                @foreach($familles as $famille)
                    <button class="btn btn-outline-primary {{ $selectedFamille === $famille->id ? 'active' : '' }}"
                        wire:click="selectFamille({{ $famille->id }})">
                        {{ $famille->famille }}
                    </button>
                @endforeach
            </div>

            <!-- Liste des articles -->
            <div class="row">
                @forelse($articles as $article)
                    <div class="col-md-4 mb-4">
                        <div class="card h-100 shadow-sm">
                            <img src="{{ $article->image ? asset('storage/' . $article->image) : asset('no-image.png') }}"
                                 class="card-img-top" alt="image" style="height: 150px; object-fit: contain;">
                            <div class="card-body text-center">
                                <h6 class="card-title">{{ $article->designation }}</h6>
                                <p class="mb-1">{{ $article->codebarre }}</p>
                                <p class="fw-bold">{{ number_format($article->prix_ht, 2) }} €</p>
                                <p class="text-muted">Stock : {{ $article->stock }}</p>
                                <button class="btn btn-sm btn-primary" wire:click="addToCart({{ $article->id }})">
                                    Ajouter
                                </button>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="alert alert-warning text-center">Aucun article trouvé.</div>
                    </div>
                @endforelse
            </div>
        </div>
    </div>

</div>
