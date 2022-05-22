<nav class="pcoded-navbar menu-light ">
    <div class="navbar-wrapper  ">
        <div class="navbar-content scroll-div " >

            <input type="hidden" name="_token" id="tokenku" value="{{ csrf_token() }}">
            
            <div class="">
                <div class="main-menu-header">
                    <img class="img-radius" src="assets/user.png" alt="User-Profile-Image">
                    <div class="user-details">
                        <div id="more-details">{{ Str::upper(Session::get('nama')) }} <i class="fa fa-caret-down"></i></div>
                    </div>
                </div>
                <div class="collapse" id="nav-user-link">
                    <ul class="list-inline">
                        <li class="list-inline-item"><a href="#" onclick="menu('Profil')" data-toggle="tooltip" title="View Profile"><i class="feather icon-user"></i></a></li>
                        <li class="list-inline-item"><a href="/logout" data-toggle="tooltip" title="Logout" class="text-danger"><i class="feather icon-power"></i></a></li>
                    </ul>
                </div>
            </div>
            
            <ul class="nav pcoded-inner-navbar " style="display: block;">
                <li class="nav-item pcoded-menu-caption">
                    <label>Kelola Menu </label>
                </li>

                <li class="nav-item" style="display: <?php if(Session::get('is_admin')==911){echo "block";}else{echo "none";} ?>">
                    <a  class="nav-link " onclick="menu('Setting Biaya')"><span class="pcoded-micon"><i class="fa fa-car"></i></span><span class="pcoded-mtext">Setting Jenis & Biaya</span></a>
                </li>
                <li class="nav-item">
                    <a  class="nav-link " onclick="menu('Parkir')"><span class="pcoded-micon"><i class="fa fa-map-marker"></i></span><span class="pcoded-mtext">Transaksi Parkir</span></a>
                </li>
                {{-- <li class="nav-item">
                    <a  class="nav-link " onclick="menu('Laporan')"><span class="pcoded-micon"><i class="fa fa-book"></i></span><span class="pcoded-mtext">Laporan Transaksi</span></a>
                </li> --}}
            </ul>
            
            
            
        </div>
    </div>
</nav>