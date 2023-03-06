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
        <tr colspan="8">

            <th align="center" colspan="8" rowspan="3">
                <h1 class="fw-bold">
                    <br>REKAP NILAI<br>
                    <b>USPBK {{ $rekap[0]->tingkatan }} {{ $rekap[0]->jurusan }} {{ $rekap[0]->no_kelas }} </b> <br>
                    {{ $rekap[0]->mapel }} <br>
                </h1>
            </th>
        </tr>
        <tr>

        </tr>
    </table>
    <table border="1">
        <thead>
            <tr>
                <th><b style="text-transform: uppercase"> No</b></th>
                <th style="width: 250px"><b style="text-transform: uppercase"> NAMA SISWA</b></th>
                <th><b style="text-transform: uppercase; width: 150px;"> NO PESERTA</b></th>
                <th><b style="text-transform: uppercase; width: 350px;"> KELAS</b></th>
                <th><b style="text-transform: uppercase; width: 150px;"> MAPEL</b></th>
                <th><b style="text-transform: uppercase"> B</b></th>
                <th><b style="text-transform: uppercase"> S</b></th>
                <th><b style="text-transform: uppercase"> SKOR</b></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rekap as $r)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td style="width:250px;">{{ $r->nama }}</td>
                    <td style="width:150px;" align="left">{{ $r->no_peserta }}</td>
                    <td style="width:350px;">{{ $r->tingkatan }} {{ $r->jurusan }} {{ $r->no_kelas }}</td>
                    <td style="width:150px;">{{ $r->mapel }}</td>
                    <td align="left">{{ $r->total_jawaban_b }}</td>
                    <td align="left">{{ $r->total_jawaban_s }}</td>
                    <td align="left">{{ $r->rata_rata }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
