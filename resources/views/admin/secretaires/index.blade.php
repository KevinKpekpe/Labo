@extends('admin.base')
@section('content')
    <section class="content secretaires">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Les Secretaires</h2>
                <small class="text-muted">Bienvenue sur notre application</small>
            </div>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="row clearfix">
                <a href="{{ route('admin.secretaires.create') }}" class="btn btn-success mb-2">Ajouter un secretaire</a>
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
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($secretaires as $key => $secretaire)
                            @php
                                $key += 1;
                            @endphp
                            <tr>
                                <td scope="row">{{ $key}}</td>
                                <td scope="row">{{ $secretaire->name }}</td>
                                <td scope="row">{{ $secretaire->postnom }}</td>
                                <td scope="row">{{ $secretaire->prenom }}</td>
                                <td scope="row">{{ $secretaire->sexe }}</td>
                                <td scope="row">{{ $secretaire->date_de_naissance }}</td>
                                <td scope="row">{{ $secretaire->telephone }}</td>
                                <td scope="row">{{ $secretaire->email }}</td>
                                <td>
                                    <a href="{{ route('admin.secretaires.edit', ['secretaire' => $secretaire->id]) }}"
                                        class="btn btn-warning">Edit</a>
                                    <form
                                        action="{{ route('admin.secretaires.destroy', ['secretaire' => $secretaire->id]) }}"
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
