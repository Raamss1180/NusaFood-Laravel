<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Transaction</title>
    <link rel="stylesheet" href="{{ asset('css/transaction.css') }}">
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet">
</head>
<body>
    <div class="sidebar">
        <div class="logo-details">
            <i class="ph ph-bowl-food"></i>
            <span class="logo_name">NusaFood</span>
        </div>
        <ul class="nav-links">
            <li>
                <a href="dashboard" class="active">
                    <i class="ph ph-speedometer"></i>
                    <span class="links_name">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="/menu">
                    <i class="ph ph-book-open"></i>
                    <span class="links_name">Menu</span>
                </a>
            </li>
            <li>
                <a href="/transaction">
                    <i class="bx bx-list-ul"></i>
                    <span class="links_name">Transaction</span>
                </a>
            </li>
            <li>
                <a href="../Feed/keluhan.php">
                    <i class="ph ph-mailbox"></i>
                    <span class="links_name">Feed Back</span>
                </a>
            </li>
            <li>
                <a href="index">
                    <i class="bx bx-log-out"></i>
                    <span class="links_name">Log out</span>
                </a>
            </li>
        </ul>
    </div>
    <section class="home-section">
        <nav>
            <div class="sidebar-button">
                <i class="bx bx-menu sidebarBtn"></i>
            </div>
            <div class="profile-details">
                <span class="admin_name">NusaFood Admin</span>
            </div>
        </nav>
        <div class="home-content">
            <form action="{{ route('transaction.update', $transaction->id) }}" class="transaksi-edit" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <label for="nama">Nama:</label><br>
                <input type="text" id="nama" name="nama" value="{{ $transaction->nama }}" required><br>
                <label for="alamat">Alamat:</label><br>
                <input type="text" id="alamat" name="alamat" value="{{ $transaction->alamat }}" required><br>
                <label for="no_hp">No HP:</label><br>
                <input type="text" id="no_hp" name="no_hp" value="{{ $transaction->no_hp }}" required><br>
                <label for="makanan">Pilih Menu:</label><br>
                <select id="makanan" name="menu_id" required>
                    @foreach ($tbmenu as $menu)
                    <option value="" disabled selected>{{$menu->menu}}</option>
                        <option value="{{ $menu->id_menu }}" data-harga="{{ $menu->harga }}" {{ $menu->id_menu == $transaction->menu_id ? 'selected' : '' }}>{{ $menu->menu }}</option>
                    @endforeach
                </select><br>
                <label for="jumlah">Jumlah:</label><br>
                <input type="number" id="jumlah" name="jumlah" min="1" value="{{ $transaction->jumlah }}" required><br>
                <button class="pesanan" type="submit" id="edit" name="edit">Pesan</button>
                <input type="hidden" name="status" value="success">
            </form>
        </div>
    </section>
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <script>
        let sidebar = document.querySelector(".sidebar");
        let sidebarBtn = document.querySelector(".sidebarBtn");
        sidebarBtn.onclick = function () {
            sidebar.classList.toggle("active");
            if (sidebar.classList.contains("active")) {
                sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
            } else sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
        };
    </script>
</body>
</html>