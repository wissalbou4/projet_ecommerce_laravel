@extends('lyaouts.app') 
@section('content')

    <div class="max-w-7xl mx-auto p-6">
        <h1 class="text-3xl font-bold text-center text-blue-600 mb-8">Ajouter une Nouvelle Marque</h1>

        <!-- Marque Creation Form -->
        <form action="{{ route('marques.store') }}" method="POST" enctype="multipart/form-data" class="bg-white shadow-xl rounded-2xl p-8 max-w-lg mx-auto">
            @csrf

            <!-- Marque -->
            <div class="mb-6">
                <label for="marque" class="block text-lg font-semibold text-gray-700 mb-2">Nom de la Marque</label>
                <input type="text" name="marque" id="marque" class="w-full p-3 border-2 border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Entrez le nom de la marque" required>
            </div>

            <!-- Image -->
            <div class="mb-6">
                <label for="image" class="block text-lg font-semibold text-gray-700 mb-2">Image de la Marque</label>
                <input type="file" name="image" id="image" class="w-full p-3 border-2 border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Submit Button -->
            <div>
                <button type="submit" class="w-full py-3 bg-blue-600 text-white text-lg rounded-lg hover:bg-blue-700 transition-all duration-300 transform hover:scale-105 focus:outline-none">
                    <i class="bi bi-check-circle mr-2"></i> Ajouter la Marque
                </button>
            </div>
        </form>
    </div>

@end
