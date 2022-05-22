<nav class="pcoded-navbar menu-light ">
    <div class="navbar-wrapper  ">
        <div class="navbar-content scroll-div " >

            <input type="hidden" name="_token" id="tokenku" value="{{ csrf_token() }}">
            
            <div class="">
                <div class="main-menu-header">
                    <img class="img-radius" src="assets/user.png" alt="User-Profile-Image">
                    <div class="user-details">
                        <div id="more-details">USRRNAME <i class="fa fa-caret-down"></i></div>
                    </div>
                </div>
                <div class="collapse" id="nav-user-link">
                    <ul class="list-inline">
                        <li class="list-inline-item"><a href="#" onclick="menu('Profil')" data-toggle="tooltip" title="View Profile"><i class="feather icon-user"></i></a></li>
                        <li class="list-inline-item"><a href="logout.php" data-toggle="tooltip" title="Logout" class="text-danger"><i class="feather icon-power"></i></a></li>
                    </ul>
                </div>
            </div>
            
            <ul class="nav pcoded-inner-navbar " style="display: block;">
                <li class="nav-item pcoded-menu-caption">
                    <label>Kelola Menu</label>
                </li>

                <li class="nav-item">
                    <a  class="nav-link " onclick="menu('Setting Biaya')"><span class="pcoded-micon"><i class="fa fa-car"></i></span><span class="pcoded-mtext">Setting Jenis & Biaya</span></a>
                </li>
                <li class="nav-item">
                    <a  class="nav-link " onclick="menu('Pemesanan')"><span class="pcoded-micon"><i class="fa fa-cutlery"></i></span><span class="pcoded-mtext">Transaksi Pemesanan</span></a>
                </li>
                <li class="nav-item">
                    <a  class="nav-link " onclick="menu('Laporan')"><span class="pcoded-micon"><i class="fa fa-book"></i></span><span class="pcoded-mtext">Laporan Transaksi</span></a>
                </li>
            </ul>
            
            <ul class="nav pcoded-inner-navbar " style="display: none;">
                
                <li class="nav-item pcoded-menu-caption">
                    <label>Data SIBANTER</label>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link " onclick="menu('WARGA')"><span class="pcoded-micon"><i class="feather icon-user"></i></span><span class="pcoded-mtext">Bantuan</span></a>
                </li>
                

            </ul>
            
            <div class="card text-center" style="display: none;">
                <div class="card-block">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <i class="fab fa-whatsapp f-40"></i>
                    <h6 class="mt-3">Help?</h6>
                    <p>Jika Data tidak tepat. Untuk Menghubungi Admin Via Whatsapp</p>						
                </div>
            </div>
            
        </div>
    </div>
</nav>