<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <title>Data Penduduk</title>
</head>
<body>
  <table class="table">
    <thead>
      <tr>
        <th style="text-align: center; vertical-align: middle; font-weight: 700; height: 50px; background-color: yellow; border: 1px solid #000;">No</th>
        <th style="text-align: center; vertical-align: middle; font-weight: 700; height: 50px; background-color: yellow; border: 1px solid #000;">NIK</th>
        <th style="text-align: center; vertical-align: middle; font-weight: 700; height: 50px; background-color: yellow; border: 1px solid #000;">No KK</th>
        <th style="text-align: center; vertical-align: middle; font-weight: 700; height: 50px; background-color: yellow; border: 1px solid #000;">Nama</th>
        <th style="text-align: center; vertical-align: middle; font-weight: 700; height: 50px; background-color: yellow; border: 1px solid #000;">Jenis Kelamin</th>
        <th style="text-align: center; vertical-align: middle; font-weight: 700; height: 50px; background-color: yellow; border: 1px solid #000;">Alamat</th>
        <th style="text-align: center; vertical-align: middle; font-weight: 700; height: 50px; background-color: yellow; border: 1px solid #000;">RT</th>
        <th style="text-align: center; vertical-align: middle; font-weight: 700; height: 50px; background-color: yellow; border: 1px solid #000;">RW</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($data as $d)
      <tr>
        <td style="text-align: center; height: 50px; vertical-align: middle; border: 1px solid #000;">{{ $loop->iteration }}</td>
        <td style="text-align: center; height: 50px; vertical-align: middle; border: 1px solid #000;">{{ $d->nik }}</td>
        <td style="text-align: center; height: 50px; vertical-align: middle; border: 1px solid #000;">{{ $d->no_kk }}</td>
        <td style="text-align: center; height: 50px; vertical-align: middle; border: 1px solid #000;">{{ $d->nama }}</td>
        <td style="text-align: center; height: 50px; vertical-align: middle; border: 1px solid #000;">{{ $d->jenis_kelamin }}</td>
        <td style="text-align: center; height: 50px; vertical-align: middle; border: 1px solid #000;">{{ $d->alamat }}</td>
        <td style="text-align: center; height: 50px; vertical-align: middle; border: 1px solid #000;">{{ $d->rt }}</td>
        <td style="text-align: center; height: 50px; vertical-align: middle; border: 1px solid #000;">{{ $d->rw }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</body>
</html>