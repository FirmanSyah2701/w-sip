<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Covid Indonesia Terupdate</title>
</head>
<style>
    h2{
        text-align: center;
    }
    table{
        margin-left: auto;
        margin-right: auto;
    }
</style>
<body>
    <h2> Data Covid Indonesia Terupdate </h2>
    <table border="3">
        <thead>
            <tr>
                <th>No</th>
                <th>Jumlah positif</th>
                <th>Jumlah dirawat</th>
                <th>Jumlah sembuh</th>
                <th>Jumlah meninggal</th>
            </tr>
        </thead>
        <tbody>
            @php $i = 0; @endphp
             @foreach ($data as $dat)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $dat->jumlah_positif->value }}</td>
                    <td>{{ $dat->jumlah_dirawat->value }}</td>
                    <td>{{ $dat->jumlah_sembuh->value }}</td>
                    <td>{{ $dat->jumlah_meninggal->value }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>