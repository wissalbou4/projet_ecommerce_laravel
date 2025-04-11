@extends('lyaouts.app') 
@section('content')
    <div class="max-w-xl mx-auto mt-10 bg-white p-6 rounded-2xl shadow-md">
        <h1 class="text-2xl font-bold mb-6 flex items-center">
            <i class="bi bi-pencil-square text-yellow-600 mr-2"></i> Modifier le client
        </h1>

        <form action="{{ route('clients.update', $client) }}" method="POST" class="space-y-5">
            @csrf
            @method('PUT')

            <div>
                <label for="nom" class="block text-sm font-medium">Nom</label>
                <input type="text" name="nom" id="nom" value="{{ $client->nom }}" class="w-full mt-1 px-4 py-2 border rounded-lg shadow-sm focus:ring focus:ring-yellow-200" required>
            </div>

            <div>
                <label for="prenom" class="block text-sm font-medium">Prénom</label>
                <input type="text" name="prenom" id="prenom" value="{{ $client->prenom }}" class="w-full mt-1 px-4 py-2 border rounded-lg shadow-sm focus:ring focus:ring-yellow-200" required>
            </div>

            <div>
                <label for="ville" class="block text-sm font-medium">Ville</label>
                <input type="text" name="ville" id="ville" value="{{ $client->ville }}" class="w-full mt-1 px-4 py-2 border rounded-lg shadow-sm focus:ring focus:ring-yellow-200" required>
            </div>

            <div>
                <label for="adresse" class="block text-sm font-medium">Adresse</label>
                <input type="text" name="adresse" id="adresse" value="{{ $client->adresse }}" class="w-full mt-1 px-4 py-2 border rounded-lg shadow-sm focus:ring focus:ring-yellow-200" required>
            </div>

            <div class="flex justify-between mt-6">
                <a href="{{ route('clients.index') }}" class="inline-flex items-center text-gray-600 hover:text-gray-800">
                    <i class="bi bi-arrow-left mr-2"></i> Retour
                </a>
                <button type="submit" class="inline-flex items-center px-4 py-2 bg-yellow-500 text-white text-sm font-medium rounded-lg hover:bg-yellow-600 shadow">
                    <i class="bi bi-check-lg mr-2"></i> Enregistrer
                </button>
            </div>
        </form>
    </div>

@endsection

