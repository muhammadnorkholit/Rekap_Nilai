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
        <tr>
            <th colspan="8" rowspan="2">
                <h1 class="fw-bold">
                    REKAP NILAI <br>
                    PAS GANJIL {{ $rekap[0]->kelas }} {{ $rekap[0]->jurusan }} {{ $rekap[0]->no_kelas }}
                </h1>
            </th>

        </tr>
    </table>
    <table border="1">
        <thead>
            <tr>
                <th>No</th>
                <th style="min-width: 200px">Nama Siswa</th>
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
                    <td style="min-width: 300px">{{ $r->kelas }} {{ $r->jurusan }} {{ $r->no_kelas }}</td>
                    <td style="min-width: 300px">{{ $r->mapel }}</td>
                    <td>{{ $r->total_jawaban_B }}</td>
                    <td>{{ $r->total_jawaban_S }}</td>
                    <td>{{ $r->rata_rata }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
