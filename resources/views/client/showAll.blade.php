<div class="container mt-5">
    <h1>Liste des Articles</h1>

    <!-- Champ de recherche pour filtrer les articles -->
    <input type="text" wire:model="search" class="form-control mb-4" placeholder="Rechercher par désignation">

    <div class="row">
        <!-- Boucle pour afficher les articles -->
        @foreach(articles asarticle)
            <div class="col-md-4 mb-3">
                <div class="card border-light">
                    <!-- Affichage de l'image de l'article -->
                    <img src="{{ asset('storage/' . article->image) " class="card-img-top" alt="article->designation }}">

                    <div class="card-body">
                        <!-- Affichage des informations -->
                        <h5 class="card-title">{{ article->designation }}</h5>
                        <p class="card-text"><strong>Prix :</strong>{{ number_format(article->prix_ht, 2) </p>
                        <p class="card-text"><strong>Code-barres :</strong>article->code_barre }}</p></div><p class="card-text"><strong>Quantité :</strong> {{ number_format(article->quantite)  pièces</p>
                    </div>

                    <div class="card-footer text-muted text-center">
                        <!– Affichage du bouton d'ajout ou autres actions –>
                        <button class="btn btn-success">Ajouter au panier</button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>



