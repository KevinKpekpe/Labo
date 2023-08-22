@extends('base')
@section('content')
    <section class="content patients">
        <div class="container-fluid">
            <h2>Informations générales</h2>
            <dl class="row">
                @php
                $dateAnniversaire = \Carbon\Carbon::parse($bonlabo->patient->date_anniversaire);
                $dateCreation = \Carbon\Carbon::parse($bonlabo->date_prescription );
                $age = $dateCreation->diffInYears($dateAnniversaire);
            @endphp
                <dt class="col-sm-2">Patient</dt>
                <dd class="col-sm-10">{{ $bonlabo->patient->nom }} {{ $bonlabo->patient->prenom }} <br> Age
                    :{{ $age }} <br> Sexe : {{ $bonlabo->patient->sexe }} </dd>

                <dt class="col-sm-2">Médecin</dt>
                <dd class="col-sm-10">{{ $bonlabo->docteur->user->name ?? 'Patient Ambulatoire' }}
                    {{ $bonlabo->docteur->user->prenom ?? '' }}</dd>

                <dt class="col-sm-2">Date de bonlabo</dt>
                <dd class="col-sm-10">{{ $bonlabo->date_prescription }}</dd>
            </dl>

            <h2>Examens</h2>
            <table class="table  table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>Nom</th>
                        <th>Résultats</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bonlabo->bonDetails as $detail)
                        <tr>
                            <td>{{ $detail->examen->description }}</td>
                            <td>{{ $detail->resultat ?? 'indisponible' }}</td>
                            <td>{{ $detail->date }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <a href="{{ route('secretaire.bonlabo-details.edit', ['bonlaboId' => $bonlabo->id]) }}"
                class="btn btn-warning">Resultat</a>
            <a href="{{ route('secretaire.bonlabos.edit', ['bonlabo' => $bonlabo->id]) }}" class="btn btn-primary">Modifier</a>
            {{-- <a href="{{ route('bonlabo-details.edit', ['bonlaboId' => $bonlabo->id]) }}" class="btn btn-warning">Modifier résultats</a> --}}
            <form action="{{ route('secretaire.bonlabos.destroy', ['bonlabo' => $bonlabo->id]) }}" method="POST"
                style="display: inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Supprimer</button>
            </form>
            <a href="{{route('createPDF',$bonlabo->id)}}" class="btn btn-dark">Imprimer</a>
        </div>
        </div>
    </section>
@endsection
