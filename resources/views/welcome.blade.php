<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <style>
            table,
            td, th {
                border: 1px solid #333;
            }
        </style>

    </head>
    <body>
        <form action="{{route('nouveau-employe')}}" method="post">
            @csrf
            <div class="col-md-6">
                <label for="name" class="form-label">Nom employé</label>
                <input type="text" class="form-control" name="nom">
            </div>
            <div class="col-md-6">
                <label for="prenom" class="form-label">Prénom(s) employé</label>
                <input type="text" class="form-control" name="prenom">
            </div>
            <div class="col-md-6">
                <label for="email" class="form-label">Email employé</label>
                <input type="email" class="form-control" name="email">
            </div>
            <div class="col-md-6">
                <label for="fonction" class="form-label">Fonction employé</label>
                <input type="text" class="form-control" name="fonction">
            </div>
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-primary px-5">Sauvegarder</button>
            </div>
        </form>
        <section style="margin-top: 5em;display:flex;justify-content:center;">
            <table>
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Email</th>
                        <th>Fonction</th>
                        <th>Qr code</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($employes as $employe)
                        <tr>
                            <td>{{$employe->nom}}</td>
                            <td>{{$employe->email}}</td>
                            <td>{{$employe->fonction}}</td>
                            <td><a href="{{asset('storage/'.$employe->qrcode)}}" download>Télécharger</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </section>
    </body>
</html>
