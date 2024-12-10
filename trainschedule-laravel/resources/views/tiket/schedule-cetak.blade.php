<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket Management</title>
    <style>
    .tabel-data {
        width: 100%;
        border-collapse: collapse;
        table-layout: fixed;
    }
    .tabel-data th {
        background-color: #2d6aa6;
        font-family: "Alegreya Sans-Regular", Helvetica;
        padding: 10px;
        font-size: 15px;
        border: 1px solid #ddd;
        font-weight: 500;
    }
    .tabel-data td {
        padding: 10px;
        font-family: "Alegreya Sans-Regular", Helvetica;
        font-size: 15px;
        border: 1px solid #ddd;
        text-align: center;
    }
    </style>
</head>
<body>
    <div>
        <table class="tabel-data" border="1">
            <thead>
                <tr>
                    <th>Home Station</th>
                    <th>Destination Station</th>
                    <th>Class</th>
                    <th>Departure Date</th>
                    <th>Payment Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse($tikets as $tiket)
                    <tr>
                        <td>{{ $tiket->Stasiun_Asal }}</td>
                        <td>{{ $tiket->Stasiun_Tujuan }}</td>
                        <td>{{ $tiket->Class }}</td>
                        <td>{{ $tiket->Tanggal_Berangkat }}</td>
                        <td>Paid</td>
                    </tr>
                @empty
                    <tr>
                       
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</body>