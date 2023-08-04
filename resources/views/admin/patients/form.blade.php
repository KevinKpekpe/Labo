@extends('admin.base')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Ajouter un patient</h2>
                <small class="text-muted">Bienvenue sur notre application</small>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="header">
                            <h2>Information basic<small>Remplissez le formulaire ci-dessous...</small> </h2>

                        </div>
                        <form method="POST" action="{{ route($patient->exists ? 'admin.patients.update' : 'admin.patients.store', $patient) }}" class="needs-validation" novalidate>
                            @csrf
                            @method($patient->exists ? 'put' : 'post')
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
                                                <input type="text" name="nom"
                                                    class="form-control @error('nom') is-invalid @enderror"
                                                    placeholder="Nom de famille" value="{{ old('nom',$patient->nom) }}">
                                                @error('nom')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-12">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="prenom"
                                                    class="form-control @error('prenom') is-invalid @enderror"
                                                    placeholder="Prenom" value="{{ old('prenom',$patient->prenom) }}">
                                                @error('prenom')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-12">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="postnom"
                                                    class="form-control @error('postnom') is-invalid @enderror"
                                                    placeholder="Postnom" value="{{ old('postnom',$patient->postnom) }}">
                                                @error('postnom')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-3 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="telephone"
                                                    class="form-control @error('telephone') is-invalid @enderror"
                                                    placeholder="Telephone" value="{{ old('telephone',$patient->telephone) }}">
                                                @error('telephone')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-12">
                                        <div class="form-group drop-custum">
                                            <select class="form-control show-tick @error('sexe') is-invalid @enderror"
                                                name="sexe">
                                                <option value="">-- Genre --</option>
                                                <option value="M" {{ old('sexe',$patient->sexe) == 'M' ? 'selected' : '' }}>Homme
                                                </option>
                                                <option value="F" {{ old('sexe',$patient->sexe) == 'F' ? 'selected' : '' }}>Femme
                                                </option>
                                            </select>
                                            @error('sexe')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="date" name="date_anniversaire"
                                                    class="datepicker form-control @error('date_anniversaire') is-invalid @enderror"
                                                    placeholder="Date d'anniversaire"
                                                    value="{{ old('date_anniversaire',$patient->date_anniversaire) }}">
                                                @error('date_anniversaire')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="email" name="email"
                                                    class="form-control @error('email') is-invalid @enderror"
                                                    placeholder="Email du patient" value="{{ old('email',$patient->email) }}">
                                                @error('email')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <select class="form-control @error('type') is-invalid @enderror" name="type"
                                                id="">
                                                <option>Selectionner Le Type de Patient</option>
                                                <option value="Ambulant" {{ old('type',$patient->type) == 'Ambulant' ? 'selected' : '' }}>
                                                    Ambulant</option>
                                                <option value="Resident" {{ old('type',$patient->type) == 'Resident' ? 'selected' : '' }}>
                                                    Resident</option>
                                            </select>
                                            @error('type')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
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
