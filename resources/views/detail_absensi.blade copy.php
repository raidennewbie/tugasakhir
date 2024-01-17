<!-- resources/views/guru/lihat_status_siswa_per_minggu.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Lihat Status Siswa per Minggu</title>
</head>
<body>
    <h1>Status Siswa per Minggu</h1>

    <h2>Siswa: {{ $siswa->name }}</h2>

    <table>
        <thead>
            <tr>
                <th>Minggu</th>
                <th>Hadir</th>
                <th>Izin</th>
                <th>Alpa</th>
            </tr>
        </thead>
        <tbody>
            @foreach($dataAbsensiPerMinggu as $minggu => $dataAbsensi)
                <tr>
                    <td>{{ $minggu }}</td>
                    <td>{{ $dataAbsensi->where('status', 'hadir')->count() }}</td>
                    <td>{{ $dataAbsensi->where('status', 'izin')->count() }}</td>
                    <td>{{ $dataAbsensi->where('status', 'alpa')->count() }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
