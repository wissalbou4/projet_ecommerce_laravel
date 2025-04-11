@extends('lyaouts.app') 
@section('content')

    <div class="max-w-xl mx-auto p-6">
        <h1 class="text-3xl font-bold text-blue-600 mb-6">Ajouter un Mode de Règlement</h1>

        <!-- Formulaire -->
        <form action="{{ route('modereglements.store') }}" method="POST" class="bg-white shadow-md rounded-2xl p-6">
            @csrf

            <!-- Champ Mode -->
            <div class="mb-4">
                <label for="mode_reglement" class="block text-lg font-semibold text-gray-700">Mode de règlement</label>
                <input type="text" name="mode_reglement" id="mode_reglement" class="w-full mt-2 p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
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

