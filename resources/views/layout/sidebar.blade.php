<aside class="left-sidebar" data-sidebarbg="skin6">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar" data-sidebarbg="skin6">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="/beranda" aria-expanded="false"><i
                            data-feather="home" class="feather-icon"></i><span class="hide-menu">Beranda</span></a></li>
                @if(Auth::user()->tipe_user=='admin')
                <li class="list-divider"></li>
                <li class="nav-small-cap"><span class="hide-menu">Informasi User</span></li>
                <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="{{route('user.index')}}"
                        aria-expanded="false"><i class="fas fa-user"></i><span class="hide-menu">Tambah
                            Apoteker</span></a>
                </li>
                @endif
                
                <li class="list-divider"></li>
                @if(Auth::user()->tipe_user=='apoteker')
                <li class="nav-small-cap"><span class="hide-menu">Informasi Resep</span></li>
                <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="{{route('resep.index')}}"
                        aria-expanded="false"><i class="fas fa-pen-square"></i><span class="hide-menu">Buat
                            Resep</span></a></li>
                <!--   <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="{{route('riwayatresep.index')}}"
                        aria-expanded="false"><i class="fas fa-notes-medical"></i><span class="hide-menu">Riwayat
                            Resep</span></a></li> -->
                <li class="list-divider"></li>
                <li class="nav-small-cap"><span class="hide-menu">Informasi Pasien</span></li>

                <li class="sidebar-item"> <a class="sidebar-link" href="{{route('pasien.index')}}"
                        aria-expanded="false"><i class="fas fa-user-plus"></i><span class="hide-menu">Pasien</span></a>
                </li>
                <li class="list-divider"></li>
                <li class="nav-small-cap"><span class="hide-menu">Informasi obat</span></li>
                <li class="sidebar-item"> <a class="sidebar-link has-arrow" aria-expanded="false"><i
                            data-feather="circle" class="feather-icon"></i><span class="hide-menu">Menu informasi
                            obat</span></a>
                    <ul aria-expanded="false" class="collapse first-level base-level-line">
                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="{{route('obat.index')}}"
                                aria-expanded="false"><i class="fas fa-adjust"></i><span
                                    class="hide-menu">Obat</span></a>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link"
                                href="{{route('bentukobat.index')}}" aria-expanded="false"><i
                                    class="fas fa-pills"></i><span class="hide-menu">Sediaan</span></a>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link"
                                href="{{route('kontraindikasiobat.index')}}" aria-expanded="false"><i
                                    class="fas fa-vial"></i><span class="hide-menu">Kontraindikasi</span></a>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link"
                                href="{{route('interaksiobat.index')}}" aria-expanded="false"><i
                                    class="fas fa-hourglass-half"></i><span class="hide-menu">Interaksi</span></a>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link"
                                href="{{route('fungsiobat.index')}}" aria-expanded="false"><i
                                    class="fas fa-capsules"></i><span class="hide-menu">Penggunaan</span></a>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link"
                                href="{{route('efeksampingobat.index')}}" aria-expanded="false"><i
                                    class="fas fa-exclamation"></i><span class="hide-menu">Efek Samping
                                </span></a>
                        </li>
                    </ul>
                </li>
                @endif


        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
