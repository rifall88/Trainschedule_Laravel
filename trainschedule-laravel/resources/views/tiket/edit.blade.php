<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Tiket</title>
    <link rel="stylesheet" href="{{ asset('css/Update.css') }}">
</head>
<body>
    <div class="form-container">
        <h2>Update Tiket</h2>
        <form action="{{ route('tikets.update', $tiket->Id_Tiket) }}" method="POST">
            @csrf
            @method('PUT')

            <label for="Stasiun_Asal">Stasiun Asal</label>
            <input type="text" id="Stasiun_Asal" name="Stasiun_Asal" value="{{ old('Stasiun_Asal', $tiket->Stasiun_Asal) }}" required>

            <label for="Stasiun_Tujuan">Stasiun Tujuan</label>
            <input type="text" id="Stasiun_Tujuan" name="Stasiun_Tujuan" value="{{ old('Stasiun_Tujuan', $tiket->Stasiun_Tujuan) }}" required>

            <label for="Class">Kelas</label>
            <input type="text" id="Class" name="Class" value="{{ old('Class', $tiket->Class) }}" required>

            <label for="Tanggal_Berangkat">Tanggal Berangkat</label>
            <input type="date" id="Tanggal_Berangkat" name="Tanggal_Berangkat" value="{{ old('Tanggal_Berangkat', $tiket->Tanggal_Berangkat) }}" required>

            <button type="submit">Update</button>
            <a href="{{ route('tikets.index') }}">Kembali ke Jadwal</a>
        </form>
    </div>
</body>
</html>
