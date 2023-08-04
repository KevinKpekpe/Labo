@extends('admin.base')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Ajouter un examen</h2>
                <small class="text-muted">Bienvenue sur notre application</small>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="header">
                            <h2>Information basic<small>Remplissez le formulaire ci-dessous...</small> </h2>

                        </div>
                        <form method="POST" action="{{ route($examen->exists ? 'admin.examens.update' : 'admin.examens.store', $examen) }}" class="needs-validation" novalidate>
                            @csrf
                            @method($examen->exists ? 'put' : 'post')
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="body">
                                <div class="row clearfix">
                                    <div class="col-lg-4 col-sm-12">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="description"
                                                    class="form-control @error('description') is-invalid @enderror"
                                                    placeholder="Le nom de l'examen " value="{{ old('description',$examen->description) }}">
                                                @error('description')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-12">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <textarea  name="note"
                                                class="form-control @error('note') is-invalid @enderror"
                                                placeholder="Donner une description sur cet Examen">{{ old('note',$examen->note) }}</textarea>
                                                @error('note')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="row clearfix">
                                        <div class="">
                                            <button type="submit" class="btn btn-raised g-bg-cyan">Enregistrer</button>
                                            <button type="submit" class="btn btn-raised">Annuler</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
