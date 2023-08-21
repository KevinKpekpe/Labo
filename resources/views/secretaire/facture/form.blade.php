@extends('admin.base')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Ajouter un facture</h2>
                <small class="text-muted">Bienvenue sur notre application</small>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="header">
                            <h2>Information basic<small>Remplissez le formulaire ci-dessous...</small> </h2>

                        </div>
                        <form method="POST" action="{{ route($facture->exists ? 'admin.factures.update' : 'admin.factures.store', $facture) }}" class="needs-validation" novalidate>
                            @csrf
                            @method($facture->exists ? 'put' : 'post')
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
                                                <input type="text" name="numero_facture"
                                                    class="form-control @error('numero_facture') is-invalid @enderror"
                                                    placeholder="Le numero de la facture " value="{{ old('numero_facture',$facture->numero_facture) }}">
                                                @error('numero_facture')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-12">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="montant"
                                                    class="form-control @error('montant') is-invalid @enderror"
                                                    placeholder="montant payé " value="{{ old('montant',$facture->montant) }}">
                                                @error('montant')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-12">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <select id="patient_id" name="patient_id" class="form-control">
                                                    @foreach ($patients as $patient)
                                                        <option value="{{ $patient->id }}" @if (isset($facture) && $facture->patient_id == $patient->id) selected @endif>
                                                            {{ $patient->nom }} {{ $patient->prenom }}</option>
                                                    @endforeach
                                                </select>
                                                @error('patient_id')
                                                    <div class="alert alert-danger">{{ $message }}</div>
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
