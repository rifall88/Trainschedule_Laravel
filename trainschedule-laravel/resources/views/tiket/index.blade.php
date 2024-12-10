<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket Management</title>
    <link rel="stylesheet" href="{{ asset('css/schedule.css') }}">
</head>
<body>
    <div class="navbar">
        <div>
            <img src="{{ asset('assets/logo.png') }}" alt="This Logo">
        </div>
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="{{ url('route') }}">Route</a></li>
            <li><a href="#" class="active">Schedule</a></li>
            <li><a href="#">Station</a></li>
            <li class="dropdown">
                <button class="dropdown-toggle">
                    <img src="{{ asset('assets/icon_akun.svg') }}" alt="Profile Picture" class="profile-img">
                </button>
                <div class="dropdown-menu">
                    <a href="#" class="menu-item">
                        <span class="icon">👤</span> My Profile
                    </a>
                    <a href="#" class="menu-item">
                        <span class="icon">🛒</span> Histori Pesanan
                    </a>
                    <a href="#" class="menu-item">
                        <span class="icon">⚙️</span> Setting
                    </a>
                    <a href="#" class="menu-item logout">
                        <span class="icon">🔴</span> Log Out
                    </a>
                    </form>
                </div>
            </li>
        </ul>
    </div>

    <!-- Success Message -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Error Messages -->
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="ticket-form">
        <h2>Ticket Booking</h2>
        <form id="ticketForm" action="{{ route('tikets.store') }}" method="POST">
        @csrf
            <label for="asal">Home Station</label>
            <select id="asal" name="asal">
                <option value="">Home Station</option>
            </select>

            <label for="tujuan">Destination Station</label>
            <select id="tujuan" name="tujuan" disabled>
                <option value="">Destination Station</option>
            </select>

            <label for="class">Select Class</label>
            <select id="class" name="class">
                <option value="">Select Class</option>
                <option value="Economy">Economy Class</option>
                <option value="Business">Business Class</option>
                <option value="Executive">Executive Class</option>
            </select>

            <label for="tanggal">Departure Date</label>
            <input type="date" id="tanggal" name="tanggal" required>

            <label for="dewasa">Mature</label>
            <select id="dewasa" name="dewasa">
                <option value="1">1 Mature</option>
                <option value="2">2 Mature</option>
                <option value="3">3 Mature</option>
            </select>

            <label for="infant">Infant</label>
            <select id="infant" name="infant">
                <option value="0">0 Infant</option>
                <option value="1">1 Infant</option>
            </select>

            <button type="submit">Pesan Tiket</button>
        </form>
    </div>
    <div>
        <div>
        <button type="button" class="tombol" onclick="window.location.href='{{ route('tikets.cetak') }}'">
            Cetak Tiket
        </button>
        </div>
        <table class="tabel-data" border="1">
            <thead>
                <tr>
                    <th>Home Station</th>
                    <th>Destination Station</th>
                    <th>Class</th>
                    <th>Departure Date</th>
                    <th>Payment Status</th>
                    <th>Actions</th>
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
                        <td>
                            <a href="{{ route('tikets.edit', $tiket->Id_Tiket) }}" class="tmbl">Edit</a>
                            <form action="{{ route('tikets.destroy', $tiket->Id_Tiket) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Are you sure?')" class="tmbl">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                       
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <footer>
        <p>© 2024 TrainSchedule by AhmdRfld. All rights reserved.</p>
    </footer>
    <script src="{{ asset('javascript/schedule.js') }}"></script>
    <script src="{{ asset('javascript/dropdown.js') }}"></script>
</body>
</html>
