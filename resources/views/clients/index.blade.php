@extends('lyaouts.app')

@section('content')

    <div class="max-w-7xl mx-auto p-6">
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-3xl font-bold">Liste des Clients</h1>
            <a href="{{ route('clients.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-lg hover:bg-blue-700 shadow">
                <i class="bi bi-plus-lg mr-2"></i> Ajouter un client
            </a>
        </div>

        <div class="bg-white shadow-md rounded-2xl overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Nom</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Prénom</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Ville</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Adresse</th>
                        <th class="px-6 py-3 text-right text-xs font-semibold text-gray-600 uppercase">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-100">
                    @foreach ($clients as $client)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 text-sm">{{ $client->nom }}</td>
                            <td class="px-6 py-4 text-sm">{{ $client->prenom }}</td>
                            <td class="px-6 py-4 text-sm">{{ $client->ville }}</td>
                            <td class="px-6 py-4 text-sm">{{ $client->adresse }}</td>
                            <td class="px-6 py-4 text-sm text-right space-x-2">
                                <a href="{{ route('clients.edit', $client) }}" class="inline-flex items-center text-blue-600 hover:text-blue-800">
                                    <i class="bi bi-pencil-square mr-1"></i> 
                                </a>
                                <form action="{{ route('clients.destroy', $client) }}" method="POST" class="inline-block" onsubmit="return confirm('Supprimer ce client ?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="inline-flex items-center text-red-600 hover:text-red-800">
                                        <i class="bi bi-trash mr-1"></i> 
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection

