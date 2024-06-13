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
                <a href="logout">
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
            <form action="{{ url('menu-update', $menu->id_menu) }}" class="transaksi-gelap" method='post' enctype="multipart/form-data">
            @csrf
            @method('PUT')
                <input type="hidden" name="id" value="{{$menu->id}}">
                <input type="hidden" name="fotoSblm" value="{{$menu->foto}}">
                <label for="menu">Menu:</label>
                    <input type="text" id="menu" name="menu" placeholder="Menu" value="{{$menu->menu}}"><br><br>
                <label for="deskripsi">Deskripsi:</label>
                    <input type="text" id="deskripsi" name="deskripsi" placeholder="deskripsi" value="{{$menu->deskripsi}}"><br><br>
                <label for="harga">Harga:</label>
                    <input type="text" id="harga" name="harga" placeholder="Harga" value="{{$menu->harga}}"><br><br>
                <label for="foto">Foto:</label>
                    <img src="../images-menu/{{$menu->foto}}" alt="" width="200px">
                    <input type="file" id="foto" name="foto"><br><br>
                <button type="submit" id="edit" name="edit"> Simpan</button>
              </form>
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
    </script>
</body>
</html>