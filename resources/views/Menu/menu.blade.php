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
           <a class="tambah-data" href="menu-entry">Tambah Data</a>
           <table class="table-data">
              <thead>
                 <tr>
                    <th>Menu</th>
                    <th>Deskripsi</th>
                    <th>Harga</th>
                    <th>Foto</th>
                    <th>Edit</th>
                 </tr>
              </thead>
              <tbody>
                <tr>
              @if (!isset($tbmenu) || count($tbmenu) == 0)
              <td colspan='5' style="text-align: center;">Tidak ada data menu yang tersedia</td>
            </tr>
            @endif
              @foreach($tbmenu as $item)
                 <tr>
                    <td>{{$item->menu}}</td>
                    <td>{{$item->deskripsi}}</td>
                    <td>Rp. {{number_format($item->harga)}}</td>
                    <td><img src="{{ asset('images-menu/' . $item->foto)  }}" alt="" width="220px"></td>
                    <td>
                        <button type="button" class="CRUD-edit">
                            <a href="/menu-edit/{{ $item->id_menu }}" class="CRUD-edit">Edit</a>
                        </button>
                        <button type="button" class="CRUD-hapus">
                            <a href="/menu-hapus/{{ $item->id_menu }}" class="CRUD-hapus">Hapus</a>
                        </button>
                    </td>
                 </tr>
                 @endforeach
           </table>
        </div>
     </section>
</body>
</html>