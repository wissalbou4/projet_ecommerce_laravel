@extends('lyaouts.app') 
@section('content')

    <div class="max-w-6xl mx-auto p-6">
        <!-- Header -->
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-3xl font-bold text-blue-600">Reglements</h1>
            <a href="{{ route('reglements.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 transition">
                <i class="bi bi-plus-lg mr-2"></i> Ajouter un règlement
            </a>
        </div>

        <!-- Table -->
        <div class="bg-white rounded-2xl shadow-md overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase">ID</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Date</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Montant</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Client</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Mode de règlement</th>
                        <th class="px-6 py-3 text-right text-xs font-semibold text-gray-600 uppercase">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-100">
                    @foreach ($reglements as $reglement)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 text-sm">{{ $reglement->id }}</td>
                            <td class="px-6 py-4 text-sm">{{ $reglement->date }}</td>
                            <td class="px-6 py-4 text-sm">{{ number_format($reglement->montant, 2, ',', ' ') }} €</td>
                            <td class="px-6 py-4 text-sm">{{ $reglement->client->nom }}</td>
                            <td class="px-6 py-4 text-sm">{{ $reglement->modeReglement->mode_reglement }}</td>
                            <td class="px-6 py-4 text-sm text-right space-x-2">
                                <a href="{{ route('reglements.edit', $reglement->id) }}" class="text-blue-600 hover:text-blue-800 inline-flex items-center">
                                    <i class="bi bi-pencil-square mr-1"></i>
                                </a>
                                <form action="{{ route('reglements.destroy', $reglement->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Supprimer ce règlement ?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-800 inline-flex items-center">
                                        <i class="bi bi-trash mr-1"></i> 
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    @if ($reglements->isEmpty())
                        <tr>
                            <td colspan="6" class="px-6 py-4 text-center text-sm text-gray-500">Aucun règlement trouvé.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>

@endsection

