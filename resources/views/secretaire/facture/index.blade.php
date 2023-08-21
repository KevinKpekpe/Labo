@extends('admin.base')
@section('content')
    <section class="content patients">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Liste des Factures Enregistrer </h2>
                <small class="text-muted">Bienvenue sur notre application</small>
            </div>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="row clearfix">
                <a href="{{ route('admin.factures.create') }}" class="btn btn-success mb-2">Enregistrer une facture</a>
                <table class="table  table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>Nom du Patient</th>
                            <th>Numero de la facture</th>
                            <th>Montant</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($factures as $key => $facture)
                            @php
                                $key += 1;
                            @endphp
                            <tr>
                                <td scope="row">{{ $key}}</td>
                                <td scope="row">{{ $facture->patient->nom }}</td>
                                <td scope="row">{{ $facture->numero_facture}}</td>
                                <td scope="row">{{ $facture->montant}}</td>
                                <td>
                                    <a href="{{ route('admin.factures.edit', ['facture' => $facture->id]) }}"
                                        class="btn btn-warning">Edit</a>
                                    <form action="{{ route('admin.factures.destroy', ['facture' => $facture->id]) }}"
                                        style="display: inline" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger">Delete</button>
                                    </form>
                                </td>

                            </tr>
                        @empty
                            <tr class="alert alert-danger">
                                Aucune Facture enregistrée
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            {{-- {{$factures->links()}} --}}
        </div>
        <div>

        </div>
    </section>
@endsection
