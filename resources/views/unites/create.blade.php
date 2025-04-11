@extends('lyaouts.app') 
@section('content')

    <div class="max-w-xl mx-auto p-6">
        <h1 class="text-3xl font-bold text-blue-600 mb-6">Ajouter une Unité</h1>

        <!-- Formulaire de création -->
        <form action="{{ route('unites.store') }}" method="POST" class="bg-white shadow-md rounded-2xl p-6">
            @csrf

            <!-- Champ Unité -->
            <div class="mb-4">
                <label for="unite" class="block text-lg font-semibold text-gray-700">Nom de l’unité</label>
                <input type="text" name="unite" id="unite" class="w-full mt-2 p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Ex: kg, pièce, litre..." required>
            </div>

            <!-- Bouton -->
            <div class="mt-6">
                <button type="submit" class="w-full py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                    <i class="bi bi-check-circle mr-2"></i> Enregistrer
                </button>
            </div>
        </form>
    </div>

@endsection

