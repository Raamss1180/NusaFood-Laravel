<html>
<head>
    <meta charset="UTF-8" />
    <link rel="icon" href="assets/icon.png" />
    <link rel="stylesheet" href="{{asset('css/transaction.css')}}" />
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <title>Transaction</title>
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
                <a href="menu">
                    <i class="ph ph-book-open"></i>
                    <span class="links_name">Menu</span>
                </a>
            </li>
            <li>
                <a href="transaction">
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
            <h3>Transaction</h3>
            <a href="transaction-cetak.php" class="btn-cetak">Cetak</a>
            <table class="table-data">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>alamat</th>
                        <th>Menu</th>
                        <th>Harga</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th>Action</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                @forelse ($transactions as $data)
                <tbody>
                    <tr>
                        <td>{{$data->nama}}</td>
                        <td>{{$data->alamat}}</td>
                        <td>{{$data->menu->menu}}</td>
                        <td>Rp. {{number_format($data->harga)}}</td>
                        <td>{{$data->updated_at}}</td>
                        <td>{{$data->status}}</td>
                        <td style='display: none;'>{{$data->no_hp}}</td>
                        <td>
                        <button class='btn_detail'
                        onclick='showDetails("{{$data->nama}}", "{{$data->alamat}}", "{{$data->menu->menu}}", "{{$data->harga}}", "{{$data->jumlah}}", "{{$data->no_hp}}", "{{$data->updated_at}}","{{$data->status}}")'>Detail</button>
                        </td>
                        <td>
                        <button type="button" class="CRUD-edit">
                            <a href="{{ url('transaction-edit', $data->id) }}" class="CRUD-edit">Edit</a>
                        </button>
                        <button type="button" class="CRUD-hapus">
                            <a href="{{ url('transaction-hapus', $data->id) }}" class="CRUD-hapus">Hapus</a>
                        </button>
                        </td>
                    @empty
                    <tr>
                        <td colspan="8" style="text-align: center;">Belum ada yang beli</td>
                    </tr>
                    </tr>
                        @endforelse
                </tbody>
            </table>
        </div>
    </section>
    <script>
        let sidebar = document.querySelector(".sidebar");
        let sidebarBtn = document.querySelector(".sidebarBtn");
        sidebarBtn.onclick = function () {
            sidebar.classList.toggle("active");
            if (sidebar.classList.contains("active")) {
                sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
            } else sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
        };
        function showDetails(nama, alamat, menu, harga, jumlah, nomor, tanggal, status) {
            alert(`Nama: ${nama}\nAlamat: ${alamat}\nMenu: ${menu}\nHarga: ${harga}\nJumlah: ${jumlah}\nNo HP: ${nomor}\nTanggal: ${tanggal}\nStatus: ${status}`);
    }
    </script>
</body>
</html>