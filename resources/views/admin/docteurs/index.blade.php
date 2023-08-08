@extends('admin.base')
@section('content')
    <section class="content patients">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Les docteurs</h2>
                <small class="text-muted">Bienvenue sur notre application</small>
            </div>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="row clearfix">
                <a href="{{ route('admin.docteurs.create') }}" class="btn btn-success mb-2">Ajouter un docteur</a>
                <table class="table  table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>Nom</th>
                            <th>Postnom</th>
                            <th>Prenom</th>
                            <th>Sexe</th>
                            <th>Date</th>
                            <th>telephone</th>
                            <th>Email</th>
                            <th>Specialite</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($docteurs as $key => $docteur)
                            @php
                                $key += 1;
                            @endphp
                            <tr>
                                <td scope="row">{{ $key }}</td>
                                <td scope="row">{{ $docteur->name }}</td>
                                <td scope="row">{{ $docteur->postnom }}</td>
                                <td scope="row">{{ $docteur->prenom }}</td>
                                <td scope="row">{{ $docteur->sexe }}</td>
                                <td scope="row">{{ $docteur->date_de_naissance }}</td>
                                <td scope="row">{{ $docteur->telephone }}</td>
                                <td scope="row">{{ $docteur->email }}</td>
                                <td scope="row">{{ $docteur->docteur->specialite }}</td>
                                <td>
                                    <a href="{{ route('admin.docteurs.edit', ['docteur' => $docteur->id]) }}"
                                        class="btn btn-warning">Edit</a>
                                    <form action="{{ route('admin.docteurs.destroy', ['docteur' => $docteur->id]) }}"
                                        style="display: inline" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger">Delete</button>
                                    </form>
                                </td>

                            </tr>
                        @empty
                            <div class="alert alert-danger">
                                Empty database
                            </div>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
