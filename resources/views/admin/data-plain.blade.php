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
      <tr style="border-bottom: 1px solid #000000;">
        <th style="height: 50px; vertical-align: middle; text-align: center;">No</th>
        <th style="height: 50px; vertical-align: middle; text-align: center;">NIK</th>
        <th style="height: 50px; vertical-align: middle; text-align: center;">No KK</th>
        <th style="height: 50px; vertical-align: middle; text-align: center;">Nama</th>
        <th style="height: 50px; vertical-align: middle; text-align: center;">Jenis Kelamin</th>
        <th style="height: 50px; vertical-align: middle; text-align: center;">Alamat</th>
        <th style="height: 50px; vertical-align: middle; text-align: center;">RT</th>
        <th style="height: 50px; vertical-align: middle; text-align: center;">RW</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($data as $d)
      <tr style="border-bottom: 1px solid #000000;">
        <td style="height: 50px; vertical-align: middle; text-align: center;">{{ $loop->iteration }}</td>
        <td style="height: 50px; vertical-align: middle; text-align: center;">{{ $d->nik }}</td>
        <td style="height: 50px; vertical-align: middle; text-align: center;">{{ $d->no_kk }}</td>
        <td style="height: 50px; vertical-align: middle; text-align: center;">{{ $d->nama }}</td>
        <td style="height: 50px; vertical-align: middle; text-align: center;">{{ $d->jenis_kelamin }}</td>
        <td style="height: 50px; vertical-align: middle; text-align: center;">{{ $d->alamat }}</td>
        <td style="height: 50px; vertical-align: middle; text-align: center;">{{ $d->rt }}</td>
        <td style="height: 50px; vertical-align: middle; text-align: center;">{{ $d->rw }}</td>
      </tr>
      @endforeach
    </tbody>
    <tfoot>
      <tr style="border-bottom: 1px solid #000000;">
        <th style="height: 50px; vertical-align: middle; text-align: center;">No</th>
        <th style="height: 50px; vertical-align: middle; text-align: center;">NIK</th>
        <th style="height: 50px; vertical-align: middle; text-align: center;">No KK</th>
        <th style="height: 50px; vertical-align: middle; text-align: center;">Nama</th>
        <th style="height: 50px; vertical-align: middle; text-align: center;">Jenis Kelamin</th>
        <th style="height: 50px; vertical-align: middle; text-align: center;">Alamat</th>
        <th style="height: 50px; vertical-align: middle; text-align: center;">RT</th>
        <th style="height: 50px; vertical-align: middle; text-align: center;">RW</th>
      </tr>
    </tfoot>
  </table>
</body>
</html>