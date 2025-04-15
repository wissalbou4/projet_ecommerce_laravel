<?php

namespace App\Livewire;

use App\Models\Commande;
use App\Models\DetaileBl;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use App\Models\Article;
use App\Models\Famille;
use App\Models\Client;

class Pos extends Component
{
    public $articles = [];
    public $familles = [];
    public $selectedFamille = null;
    public $client_id = null;
    public $clients;
    public $cart = [];
    public $tax = 0;
    public $discount = 0;
    public $discountType = 'fixed'; // ou 'percent'
    public $shipping = 0;

    public $totalQty = 0;
    public $subTotal = 0;
    public $total = 0;

    public function mount()
    {
        $this->familles = Famille::all();
        $this->cart = session()->get('cart', []);
        $this->loadArticles();
        $this->calculateTotals();
        $this->client_id = null;
        $this->clients = Client::all();
     
    }

    public function render()
{
    return view('livewire.pos');
}

    public function selectFamille($familleId)
    {
        $this->selectedFamille = $familleId == 0 ? null : $familleId;
        $this->loadArticles();
    }

    public function loadArticles()
    {
        $this->articles = is_null($this->selectedFamille)
            ? Article::all()
            : Article::where('famille_id', $this->selectedFamille)->get();
    }

    public function addToCart($articleId)
    {
        $article = Article::findOrFail($articleId);

        if (isset($this->cart[$articleId])) {
            $this->cart[$articleId]['qty'] += 1;
        } else {
            $this->cart[$articleId] = [
                'id' => $article->id,
                'designation' => $article->designation,
                'prix' => $article->prix_ht,
                'qty' => 1,
            ];
        }

        $this->saveCart();
    }

    public function removeFromCart($articleId)
    {
        unset($this->cart[$articleId]);
        $this->saveCart();
    }

    public function resetCart()
    {
        $this->cart = [];
        session()->forget('cart');
        $this->calculateTotals();
    }

    public function saveCart()
    {
        session()->put('cart', $this->cart);
        $this->calculateTotals();
    }

    public function updatedTax()
    {
        $this->calculateTotals();
    }

    public function updatedDiscount()
    {
        $this->calculateTotals();
    }

    public function updatedDiscountType()
    {
        $this->calculateTotals();
    }

    public function updatedShipping()
    {
        $this->calculateTotals();
    }

    public function calculateTotals()
    {
        $this->totalQty = 0;
        $this->subTotal = 0;

        foreach ($this->cart as $item) {
            $this->totalQty += $item['qty'];
            $this->subTotal += $item['prix'] * $item['qty'];
        }

        $discountAmount = $this->discountType === 'percent'
            ? ($this->discount / 100) * $this->subTotal
            : $this->discount;

        $taxAmount = ($this->tax / 100) * $this->subTotal;

        $this->total = $this->subTotal + $taxAmount + $this->shipping - $discountAmount;
    }

    public function payer()
    {
        if (!$this->client_id) {
            session()->flash('error', 'Veuillez sélectionner un client.');
            return;
        }

        if (empty($this->cart)) {
            session()->flash('error', 'Le panier est vide.');
            return;
        }

        DB::beginTransaction();

        try {
            // Créer la commande
            $commande = Commande::create([
                'date' => now(),
                'remise' => $this->discount,
                'shipping' => $this->shipping,
                'client_id' => $this->client_id,
            ]);

            // Ajouter les articles dans la table `detaile_bls`
            foreach ($this->cart as $item) {
                $remiseArticle = $this->discountType === 'percent'
                    ? ($this->discount / 100) * ($item['prix'] * $item['qty'])
                    : $this->discount;

                $tvaArticle = ($this->tax / 100) * ($item['prix'] * $item['qty']);

                DetaileBl::create([
                    'commande_id' => $commande->id,
                    'article_id' => $item['id'],
                    'quantite' => $item['qty'],
                    'prix_vente_ht' => $item['prix'],
                    'tva' => $tvaArticle,
                    'remise' => $remiseArticle,
                ]);
            }

            DB::commit();

            $this->resetCart();
            session()->flash('success', 'Commande enregistrée avec succès.');

        } catch (\Exception $e) {
            DB::rollback();
            session()->flash('error', 'Erreur lors de l\'enregistrement : ' . $e->getMessage());
        }
    }
    public function restaurerCommande($commandeId)
{
    $commande = Commande::findOrFail($commandeId);

    $details = DetaileBl::where('commande_id', $commandeId)->get();

    $cart = [];

    foreach ($details as $detail) {
        $cart[$detail->article_id] = [
            'id' => $detail->article_id,
            'designation' => $detail->article->designation,
            'prix' => $detail->prix_vente_ht,
            'qty' => $detail->quantite,
        ];
    }

    $this->cart = $cart;
    $this->client_id = $commande->client_id;
    $this->discount = $commande->remise;
    $this->shipping = $commande->shipping;

    session()->put('cart', $this->cart);
    $this->calculateTotals();

    session()->flash('success', 'Commande restaurée avec succès.');
}

}
