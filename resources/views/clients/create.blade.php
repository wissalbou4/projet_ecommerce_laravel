@extends('lyaouts.app')

@section('content')

    <div class="max-w-xl mx-auto mt-10 bg-white p-6 rounded-2xl shadow-md">
        <h1 class="text-2xl font-bold mb-6 flex items-center">
            <i class="bi bi-person-plus-fill text-blue-600 mr-2"></i> Ajouter un client
        </h1>

        <form action="{{ route('clients.store') }}" method="POST" class="space-y-5">
            @csrf

            <div>
                <label for="nom" class="block text-sm font-medium">Nom</label>
                <input type="text" name="nom" id="nom" class="w-full mt-1 px-4 py-2 border rounded-lg shadow-sm focus:ring focus:ring-blue-200" >
            </div>

            <div>
                <label for="prenom" class="block text-sm font-medium">Prénom</label>
                <input type="text" name="prenom" id="prenom" class="w-full mt-1 px-4 py-2 border rounded-lg shadow-sm focus:ring focus:ring-blue-200">
            </div>

            <div>
                <label for="ville" class="block text-sm font-medium">Ville</label>
                <input type="text" name="ville" id="ville" class="w-full mt-1 px-4 py-2 border rounded-lg shadow-sm focus:ring focus:ring-blue-200">
            </div>

            <div>
                <label for="adresse" class="block text-sm font-medium">Adresse</label>
                <input type="text" name="adresse" id="adresse" class="w-full mt-1 px-4 py-2 border rounded-lg shadow-sm focus:ring focus:ring-blue-200">
            </div>

            <div class="flex justify-between mt-6">
                <a href="{{ route('clients.index') }}" class="inline-flex items-center text-gray-600 hover:text-gray-800">
                    <i class="bi bi-arrow-left mr-2"></i> Retour
                </a>
                <button type="submit" class="inline-flex items-center px-4 py-2 bg-green-600 text-white text-sm font-medium rounded-lg hover:bg-green-700 shadow">
                    <i class="bi bi-check-lg mr-2"></i> Enregistrer
                </button>
            </div>
        </form>
    </div>

@endsection

