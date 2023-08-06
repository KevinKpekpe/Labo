@extends('admin.base')
@section('content')
    <section class="content patients">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Nos Examens</h2>
                <small class="text-muted">Bienvenue sur notre application</small>
            </div>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="row clearfix">
                <a href="{{route('admin.examens.create')}}" class="btn btn-success mb-2">Créer un Examen</a>
                <table class="table  table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>Description</th>
                            <th>Notes</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($examens as $examen)
                            <tr>
                                <td scope="row">{{ $examen->id }}</td>
                                <td scope="row">{{ $examen->description }}</td>
                                <td scope="row">{{ $examen->note }}</td>
                                <td>
                                    <a href="{{ route('admin.examens.edit', ['examen' => $examen->id]) }}"
                                        class="btn btn-warning">Edit</a>
                                    <form action="{{ route('admin.examens.destroy', ['examen' => $examen->id]) }}"
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
