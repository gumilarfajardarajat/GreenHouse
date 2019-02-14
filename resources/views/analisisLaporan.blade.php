<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <title>Document</title>
</head>
<body>
    <h2>Laporan Analisis Media Tanam</h2>
    <h2>{{$month}},  {{$y}}</h2>
    <table class="table mt-5">
        <thead>
        <tr>
            <th scope="col">Hari</th>
            <th scope="col">Intensitas Cahaya</th>
            <th scope="col">Suhu</th>
            <th scope="col">pH</th>
            <th scope="col">Kelembaban Tanah</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($collection as $item)
        <tr>
            <th scope="row">{{$item->day}}</th>
            <td>{{$item->cahaya}}</td>
            <td>{{$item->suhu}}</td>
            <td>{{$item->ph}}</td>
            <td>{{$item->kt}}</td>            
        </tr>
        @endforeach
        </tbody>
    </table>
</body>
</html>