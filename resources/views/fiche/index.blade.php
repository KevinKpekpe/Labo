<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fiche Médicale</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"> --}}
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            margin: 50px auto;
            max-width: 600px;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header h3 {
            font-weight: bold;
            color: #333;
            margin-bottom: 5px;
        }

        .sub-header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .sub-header h5 {
            font-weight: bold;
            color: #555;
            margin-bottom: 5px;
        }

        .info-list {
            margin-bottom: 20px;
        }

        .info-list h5 {
            font-weight: bold;
            color: #333;
            margin-bottom: 5px;
        }

        .exam-list {
            margin-bottom: 20px;
        }

        .exam-list h5 {
            font-weight: bold;
            color: #333;
            margin-bottom: 10px;
        }

        .exam-list table {
            width: 100%;
            border-collapse: collapse;
            table-layout: fixed;
        }

        .exam-list th,
        .exam-list td {
            padding: 10px;
            text-align: center;
            border: 1px solid #ddd;
            word-break: break-word;
        }

        .exam-list th {
            background-color: #f8f9fa;
            color: #333;
            font-weight: bold;
        }

        .exam-list td {
            color: #555;
        }

        .exam-list td:first-child {
            text-align: left;
        }

        .icon {
            margin-right: 5px;
        }
    </style>
</head>
@php
$dateAnniversaire = \Carbon\Carbon::parse($bonlabo->patient->date_anniversaire);
$dateCreation = \Carbon\Carbon::parse($bonlabo->date_prescription );
$age = $dateCreation->diffInYears($dateAnniversaire);
@endphp
<body>
    <div class="container">
        <div class="header">
            <h3><i class="fas fa-hospital"></i> Fiche Médicale</h3>
            <p>Nom de l'hôpital: Clinique Kinoise</p>
        </div>
        <div class="sub-header">
            <div>
                <h5><i class="fas fa-user"></i> Nom: {{ $bonlabo->patient->nom }}</h5>
                <h5><i class="fas fa-user"></i> Post-nom: {{ $bonlabo->patient->postnom }}</h5>
                <h5><i class="fas fa-venus-mars"></i> Sexe: {{ $bonlabo->patient->sexe }}</h5>
                <h5><i class="fas fa-birthday-cake"></i> Âge: {{$age}} ans</h5>
                <h5><i class="fas fa-user-md"></i> Nom du docteur: Dr. {{$bonlabo->docteur->user->name ?? 'Ambulatoire'}}</h5>
            </div>
            <div>
                <h5><i class="far fa-calendar-alt"></i> {{ $bonlabo->date_prescription }}</h5>
            </div>
        </div>
        <div class="exam-list">
            <h5><i class="fas fa-file-medical"></i> Résultats des examens:</h5>
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
        </div>
    </div>
</body>

</html>
