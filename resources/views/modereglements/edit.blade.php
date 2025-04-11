@extends('lyaouts.app') 
@section('content')

    <div class="max-w-xl mx-auto p-6">
        <h1 class="text-3xl font-bold text-blue-600 mb-6">Modifier le Mode de Règlement</h1>

        <!-- Formulaire de modification -->
        <form action="{{ route('modereglements.update', $modeReglement->id) }}" method="POST" class="bg-white shadow-md rounded-2xl p-6">
            @csrf
            @method('PUT')

            <!-- Champ Mode -->
            <div class="mb-4">
                <label for="mode_reglement" class="block text-lg font-semibold text-gray-700">Mode de règlement</label>
                <input type="text" name="mode_reglement" id="mode_reglement" value="{{ old('mode_reglement', $modeReglement->mode_reglement) }}" class="w-full mt-2 p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" >
            </div>

            <!-- Bouton -->
            <div class="mt-6">
                <button type="submit" class="w-full py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                    <i class="bi bi-save2 mr-2"></i> Mettre à jour
                </button>
            </div>
        </form>
    </div>

@endsection

