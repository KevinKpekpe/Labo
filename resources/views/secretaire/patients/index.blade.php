@extends('base')
@section('content')
    <section class="content patients">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Nos Patients</h2>
                <small class="text-muted">Bienvenue sur notre application</small>
            </div>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="row clearfix">
                <a href="{{ route('secretaire.patients.create') }}" class="btn btn-success mb-2">Ajouter un Patient</a>
                <table class="table  table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>Nom</th>
                            <th>Postnom</th>
                            <th>Prenom</th>
                            <th>Sexe</th>
                            <th>Type</th>
                            <th>Date</th>
                            <th>telephone</th>
                            <th>Email</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($patients as $key => $patient)
                            @php
                                $key += 1;
                            @endphp
                            <tr>
                                <td scope="row">{{ $key }}</td>
                                <td scope="row">{{ $patient->nom }}</td>
                                <td scope="row">{{ $patient->postnom }}</td>
                                <td scope="row">{{ $patient->prenom }}</td>
                                <td scope="row">{{ $patient->sexe }}</td>
                                <td scope="row">{{ $patient->type }}</td>
                                <td scope="row">{{ $patient->date_anniversaire }}</td>
                                <td scope="row">{{ $patient->telephone }}</td>
                                <td scope="row">{{ $patient->email }}</td>
                                <td>
                                    <a href="{{ route('secretaire.patients.edit', ['patient' => $patient->id]) }}"
                                        class="btn btn-warning">Edit</a>
                                    <form action="{{ route('secretaire.patients.destroy', ['patient' => $patient->id]) }}"
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
            {{$patients->links()}}
        </div>
    </section>
@endsection
