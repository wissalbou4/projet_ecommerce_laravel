<div class="container-fluid">
    <div class="row min-vh-100">
   <div class="mb-3">
    <menu>
        <div class="d-flex flex-wrap gap-2">
            <button wire:click="$set('client_id', null)"
                    class="btn btn-outline-secondary rounded-pill {{ is_null($client_id) ? 'active' : '' }}">
                Aucun client
            </button>
            @foreach($clients as $client)
                <button wire:click="$set('client_id', {{ $client->id }})"
                        class="btn btn-outline-primary rounded-pill {{ $client_id === $client->id ? 'active' : '' }}">
                    <i class="bi bi-person-circle"></i> {{ $client->nom }}
                </button>
            @endforeach
        </div>
    </menu>
</div>

        <!-- Panier à gauche -->
        <div class="col-md-4 col-lg-3 bg-light border-end">
            <div class="p-3 h-100 overflow-auto">
                <h5 class="mb-3">🛒 Panier</h5>

                @if(count($cart) > 0)
                    <div class="table-responsive">
                        <table class="table table-sm table-bordered">
                            <thead class="table-light">
                                <tr>
                                    <th>Désignation</th>
                                    <th>Qté</th>
                                    <th>Prix</th>
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

                <!-- Formulaire de calcul -->
                <div class="mb-2">
                    <label>Taxe (%)</label>
                    <input type="number" wire:model="tax" class="form-control" />
                </div>
                <div class="mb-2">
                    <label>Remise</label>
                    <div class="d-flex align-items-center">
                        <input type="number" wire:model="discount" class="form-control me-2" />
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

                <div class="mb-2">
                    <label>Livraison (€)</label>
                    <input type="number" wire:model="shipping" class="form-control" />
                </div>

                <hr>
                <div>
                    <p>Total Qté : <strong>{{ $this->totalQty }}</strong></p>
                    <p>Sous-total : <strong>{{ number_format($this->subTotal, 2) }} €</strong></p>
                    <h5>Total : <strong>{{ number_format($this->total, 2) }} €</strong></h5>
                </div>

                <div class="d-grid gap-2 mt-3">
                    <button class="btn btn-outline-danger" wire:click="$set('cart', [])">Réinitialiser</button>
                    <button class="btn btn-success" wire:click="payer">Payer</button>

                </div>
            </div>
        </div>

        <!-- Articles à droite -->
        <div class="col-md-8 col-lg-9">
            <div class="p-3 h-100 overflow-auto">
                <!-- Filtres -->
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
                        <div class="col-md-3 mb-4">
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
</div>
