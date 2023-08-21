@extends('admin.base')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Ajouter un docteur</h2>
                <small class="text-muted">Bienvenue sur notre application</small>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="header">
                            <h2>Information basic<small>Remplissez le formulaire ci-dessous...</small> </h2>

                        </div>
                        <form method="POST"
                            action="{{ route($docteur->exists ? 'admin.docteurs.update' : 'admin.docteurs.store', $docteur) }}"
                            class="needs-validation" novalidate enctype="multipart/form-data">
                            @csrf
                            @method($docteur->exists ? 'put' : 'post')
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            @if (session()->has('error'))
                                <div class="alert alert-danger">{{ session('error') }}</div>
                            @endif
                            <div class="body">
                                <div class="row clearfix">
                                    <div class="col-lg-4 col-sm-12">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="name"
                                                    class="form-control @error('name') is-invalid @enderror"
                                                    placeholder="Nom" value="{{ old('name', $docteur->name) }}">
                                                @error('name')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-12">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="matricule"
                                                    class="form-control @error('matricule') is-invalid @enderror"
                                                    placeholder="Matricule"
                                                    value="{{ old('matricule', $docteur->matricule) }}">
                                                @error('matricule')
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
                                                    placeholder="Postnom" value="{{ old('postnom', $docteur->postnom) }}">
                                                @error('postnom')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-4 col-sm-12">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="prenom"
                                                    class="form-control @error('prenom') is-invalid @enderror"
                                                    placeholder="Prénom" value="{{ old('prenom', $docteur->prenom) }}">
                                                @error('prenom')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-12">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="adresse"
                                                    class="form-control @error('adresse') is-invalid @enderror"
                                                    placeholder="Adresse" value="{{ old('adresse', $docteur->adresse) }}">
                                                @error('adresse')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-12">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="telephone"
                                                    class="form-control @error('telephone') is-invalid @enderror"
                                                    placeholder="Téléphone"
                                                    value="{{ old('telephone', $docteur->telephone) }}">
                                                @error('telephone')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-4 col-sm-12">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <select name="sexe" class="form-control">
                                                    <option value="M"
                                                        {{ old('sexe', $docteur->sexe) === 'M' ? 'selected' : '' }}>
                                                        Masculin</option>
                                                    <option value="F"
                                                        {{ old('sexe', $docteur->sexe) === 'F' ? 'selected' : '' }}>Féminin
                                                    </option>
                                                </select>
                                                @error('sexe')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-12">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="email" name="email"
                                                    class="form-control @error('email') is-invalid @enderror"
                                                    placeholder="Adresse e-mail"
                                                    value="{{ old('email', $docteur->email) }}">
                                                @error('email')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-4 col-sm-12">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="password" name="password"
                                                    class="form-control @error('password') is-invalid @enderror"
                                                    placeholder="Mot de passe">
                                                @error('password')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-12">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="password" name="password_confirmation" class="form-control"
                                                    placeholder="Confirmer le mot de passe">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-4 col-sm-12">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="date" name="date_de_naissance"
                                                    class="form-control @error('description') is-invalid @enderror"
                                                    value="{{ old('description', $docteur->date_de_naissance) }}">
                                                @error('date_de_naissance')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="dz-message">

                                            <div class="fallback">
                                                <input name="avatar" type="file" required />
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-12">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="cnom"
                                                    class="form-control @error('cnom') is-invalid @enderror"
                                                    placeholder="cnom du docteur"
                                                    value="{{ old('cnom', $tb_docteur->cnom) }}">
                                                @error('cnom')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-12">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="specialite"
                                                    class="form-control @error('specialite') is-invalid @enderror"
                                                    placeholder="specialite"
                                                    value="{{ old('specialite', $tb_docteur->specialite) }}">
                                                @error('specialite')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-12 col-sm-12">
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
