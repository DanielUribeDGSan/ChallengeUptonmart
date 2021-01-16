<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nómina pdf</title>
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <style>
    .sombra {
        box-shadow: 0px 3px 20px #00000029;
    }

    .no-border {
        border: none;
    }
    </style>
</head>

<body>

    <div class="container mt-5 text-center">
        <h1>Información de tu nómina</h1>
        <table class="table mt-5">
            <thead>
                <tr>
                    <th scope="col">Banco</th>
                    <th scope="col">N° cuenta</th>
                    <th scope="col">Sueldo bruto</th>
                    <th scope="col">Sueldo neto</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($nominas as $key => $nomina)
                <tr>
                    <td>{{$nomina->banco}}</td>
                    <td>{{$nomina->cuenta}}</td>
                    <td>$ {{number_format($nomina->cantidad_bruto, 2)}}</td>
                    <td> ${{$nomina->cantidad_neta}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- JS boostrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>
</body>

</html>