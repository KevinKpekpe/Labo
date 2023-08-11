@extends('base')
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
                <table class="table  table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>Patient</th>
                            <th>Date de prescription</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($bons as $key => $bonlabo)
                            @php
                                $key += 1;
                            @endphp
                            <tr>
                                <td scope="row">{{ $key }}</td>
                                <td>{{ $bonlabo->patient->nom }} {{ $bonlabo->patient->prenom }}</td>
                                <td>{{ $bonlabo->date_prescription }}</td>
                                <td>
                                    <a href="{{route('docteur.show.detail',$bonlabo->id)}}"
                                        class="btn btn-primary">Voir</a>
                                    <a href="{{route('createPDF',$bonlabo->id)}}" class="btn btn-danger">Imprimer</a>
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
