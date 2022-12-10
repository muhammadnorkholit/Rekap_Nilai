<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Siswa</th>
                <th>No Peserta</th>
                <th>Kelas</th>
                <th>Mapel</th>
                <th>B</th>
                <th>S</th>
                <th>Skor</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rekap as $r)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $r->nama }}</td>
                    <td>{{ $r->no_peserta }}</td>
                    <td>{{ $r->kelas }}</td>
                    <td>{{ $r->mapel }}</td>
                    <td>{{ $r->total_jawaban_B }}</td>
                    <td>{{ $r->total_jawaban_S }}</td>
                    <td>{{ $r->rata_rata }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
