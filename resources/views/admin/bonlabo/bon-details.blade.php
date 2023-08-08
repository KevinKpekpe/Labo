@extends('admin.base')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Resultats</h2>
                <small class="text-muted">Bienvenue sur notre application</small>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="header">
                            <h2>Information basic<small>Remplissez le formulaire ci-dessous...</small> </h2>

                        </div>
                        <form method="POST" action="{{ route('admin.bonlabo-details.update', $bonlaboId) }}"
                            class="needs-validation" novalidate>
                            @csrf
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
                                    @foreach ($bonlaboDetails as $prescriptionDetail)
                                        <div class="col-lg-4 col-sm-12">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <label for="resultats[{{ $prescriptionDetail->examen_id }}]">{{ $prescriptionDetail->examen->description }}</label>
                                                    <textarea class="form-control" name="resultats[{{ $prescriptionDetail->examen_id }}]"
                                                        id="resultats[{{ $prescriptionDetail->examen_id }}]">{{ $prescriptionDetail->resultat }}</textarea>
                                                </div>
                                            </div>

                                        </div>
                                    @endforeach
                                    <div class="col-lg-4 col-sm-12">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="datetime-local" class="form-control" name="date"
                                                    id="date" value="{{ $bonlaboDetails->first()->date }}">
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
    <script>
        // Obtient la date et l'heure courantes au format "AAAA-MM-JJThh:mm"
        var now = new Date().toISOString().slice(0, 16);

        // Définit la date et l'heure courantes comme valeur minimale
        document.getElementById("date").setAttribute("min", now);
    </script>
@endsection
