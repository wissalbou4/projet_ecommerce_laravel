
@extends('lyaouts.app') 
@section('content')
    @php
    $familles = App\Models\Famille::all();
    $marques=App\Models\Marque::all();
    $unites=App\Models\Unite::all();
    @endphp

    <div class="max-w-7xl mx-auto p-6">
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-3xl font-bold">Ajouter un Article</h1>
            <a href="{{ route('articles.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-600 text-white text-sm font-medium rounded-lg hover:bg-gray-700 shadow">
                <i class="bi bi-arrow-left mr-2"></i> Retour à la liste
            </a>
        </div>

        <div class="bg-white shadow-md rounded-2xl overflow-hidden p-6">
            <form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Code-barres -->
                    <div>
                        <label for="codebarre" class="block text-sm font-medium text-gray-700">Code-barres</label>
                        <input type="text" name="codebarre" id="codebarre" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                    </div>

                    <!-- Désignation -->
                    <div>
                        <label for="designation" class="block text-sm font-medium text-gray-700">Désignation</label>
                        <input type="text" name="designation" id="designation" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                    <!-- Prix HT -->
                    <div>
                        <label for="prix_ht" class="block text-sm font-medium text-gray-700">Prix HT (€)</label>
                        <input type="number" step="0.01" name="prix_ht" id="prix_ht" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                    </div>

                    <!-- TVA -->
                    <div>
                        <label for="tva" class="block text-sm font-medium text-gray-700">TVA (%)</label>
                        <input type="number" step="0.01" name="tva" id="tva" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                    <!-- Stock -->
                    <div>
                        <label for="stock" class="block text-sm font-medium text-gray-700">Stock</label>
                        <input type="number" name="stock" id="stock" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                    </div>

                    <!-- Famille -->
                    <div>
                        <label for="famille_id" class="block text-sm font-medium text-gray-700">Famille</label>
                        <select name="famille_id" id="famille_id" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                            <option value="">Choisir une famille</option>
                            @foreach ($familles as $famille)
                                <option value="{{ $famille->id }}">{{ $famille->famille }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                    <!-- Marque -->
                    <div>
                        <label for="marque_id" class="block text-sm font-medium text-gray-700">Marque</label>
                        <select name="marque_id" id="marque_id" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                            <option value="">Choisir une marque</option>
                            @foreach ($marques as $marque)
                                <option value="{{ $marque->id }}">{{ $marque->marque }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Unité -->
                    <div>
                        <label for="unite_id" class="block text-sm font-medium text-gray-700">Unité</label>
                        <select name="unite_id" id="unite_id" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                            <option value="">Choisir une unité</option>
                            @foreach ($unites as $unite)
                                <option value="{{ $unite->id }}">{{ $unite->unite }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="mt-6">
                    <label for="image" class="block text-sm font-medium text-gray-700">Image</label>
                    <input type="file" name="image" id="image" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div class="mt-6 flex justify-end">
                    <button type="submit" class="px-6 py-3 bg-blue-600 text-white text-sm font-medium rounded-lg hover:bg-blue-700 shadow">
                        Enregistrer l'article
                    </button>
                </div>
            </form>
        </div>
    </div>

@endsection

