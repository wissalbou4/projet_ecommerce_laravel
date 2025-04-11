@extends('lyaouts.app') 
@section('content')
    @php
    $clients = App\Models\Client::all();
    $modeReglement= App\Models\ModeReglement::all();
    @endphp

    <div class="max-w-4xl mx-auto p-6">
        <h1 class="text-3xl font-bold text-blue-600 mb-6">Modifier un Règlement</h1>

        <form action="{{ route('reglements.update', $reglement->id) }}" method="POST" class="bg-white shadow-md rounded-2xl p-6">
            @csrf
            @method('PUT')

            <!-- Date -->
            <div class="mb-4">
                <label for="date" class="block text-lg font-semibold text-gray-700">Date du règlement</label>
                <input type="date" name="date" id="date" value="{{ $reglement->date }}" class="w-full mt-2 p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>

            <!-- Montant -->
            <div class="mb-4">
                <label for="montant" class="block text-lg font-semibold text-gray-700">Montant</label>
                <input type="number" name="montant" id="montant" step="0.01" value="{{ $reglement->montant }}" class="w-full mt-2 p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>

            <!-- Client -->
            <div class="mb-4">
                <label for="client_id" class="block text-lg font-semibold text-gray-700">Client</label>
                <select name="client_id" id="client_id" class="w-full mt-2 p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @foreach ($clients as $client)
                        <option value="{{ $client->id }}" {{ $client->id == $reglement->client_id ? 'selected' : '' }}>{{ $client->nom }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Mode de Règlement -->
            <div class="mb-4">
                <label for="mode_reglement_id" class="block text-lg font-semibold text-gray-700">Mode de Règlement</label>
                <select name="mode_reglement_id" id="mode_reglement_id" class="w-full mt-2 p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @foreach ($modeReglement as $mode)
                        <option value="{{ $mode->id }}" {{ $mode->id == $reglement->mode_reglement_id ? 'selected' : '' }}>{{ $mode->mode_reglement }}</option>
                    @endforeach
                </select>
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

