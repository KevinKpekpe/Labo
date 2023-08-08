@extends('admin.base')
@section('content')
    <section class="content patients">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Bon du Laboratoire</h2>
                <small class="text-muted">Bienvenue sur notre application</small>
            </div>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="row clearfix">
                <a href="{{ route('admin.bonlabos.create') }}" class="btn btn-success mb-2">Crée un Bon</a>
                <table class="table  table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>Patient</th>
                            <th>Médecin</th>
                            <th>Date de prescription</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($bonlabos as $key => $bonlabo)
                            @php
                                $key += 1;
                            @endphp
                            <tr>
                                <td scope="row">{{ $key }}</td>
                                <td>{{ $bonlabo->patient->nom }} {{ $bonlabo->patient->prenom }}</td>
                                <td>{{ $bonlabo->docteur->user->name ?? 'Ambulantoire'}}</td>
                                <td>{{ $bonlabo->date_prescription }}</td>
                                <td>
                                    <a href="{{ route('admin.bonlabos.show', $bonlabo->id) }}"
                                        class="btn btn-primary">Voir</a>
                                    <a href="{{ route('admin.bonlabos.edit', $bonlabo->id) }}"
                                        class="btn btn-secondary">Modifier</a>
                                    <form action="{{ route('admin.bonlabos.destroy', ['bonlabo' => $bonlabo->id]) }}"
                                        method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Supprimer</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            Empty
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
