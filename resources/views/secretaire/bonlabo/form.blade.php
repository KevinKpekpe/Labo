@extends('admin.base')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Créer un Bon</h2>
                <small class="text-muted">Bienvenue sur notre application</small>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="header">
                            <h2>Information basic<small>Remplissez le formulaire ci-dessous...</small> </h2>

                        </div>
                        <form method="POST" action="{{ route($bonlabo->exists ? 'admin.bonlabos.update' : 'admin.bonlabos.store', $bonlabo) }}" class="needs-validation" novalidate>
                            @csrf
                            @method($bonlabo->exists ? 'put' : 'post')
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
                                                <label for="patient_id">Patient :</label>
                                                <select id="patient_id" name="patient_id" class="form-control">
                                                    @foreach ($patients as $patient)
                                                        <option value="{{ $patient->id }}" @if (isset($bonlabo) && $bonlabo->patient_id == $patient->id) selected @endif>
                                                            {{ $patient->nom }} {{ $patient->prenom }}</option>
                                                    @endforeach
                                                </select>
                                                @error('patient_id')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-12">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label for="docteur_id">Docteur :</label>
                                                <select id="docteur_id" name="docteur_id" class="form-control">
                                                    <option value="">Aucun</option>
                                                    @foreach ($docteurs as $docteur)
                                                        <option value="{{ $docteur->id }}" @if (isset($bonlabo) && $bonlabo->docteur_id == $docteur->id) selected @endif>
                                                            {{ $docteur->user->name }} {{ $docteur->user->prenom }}</option>
                                                    @endforeach
                                                </select>
                                                @error('docteur_id')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-12">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label for="examens">Examens :</label>
                                                <select id="examens" name="examens[]" class="form-control" multiple>
                                                    @foreach ($examens as $examen)

                                                        <option value="{{ $examen->id }}" @if (isset($bonlabo) && $bonlabo->hasExamen($examen->id)) selected @endif>
                                                            {{ $examen->description}}</option>
                                                    @endforeach

                                                </select>
                                                @error('examens')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="col-lg-3 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label for="examens">Date de Prescription:</label>
                                            <input type="date" name="date_prescription"
                                                class="datepicker form-control @error('date_prescription') is-invalid @enderror"
                                                placeholder="Date d'prescription"
                                                value="{{ old('date_prescription',$bonlabo->date_prescription) }}">
                                            @error('date_prescription')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div> --}}
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
