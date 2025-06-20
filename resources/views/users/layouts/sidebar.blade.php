<aside id="sidebar">
    <!-- Content for sidebar -->
    <div class="vh-100 overflow-auto">
        <div class="sidebar-logo">
            @if (Auth::user()->role === 'admin')
                <a href="{{ route('admin.dashboard') }}">Manajemen Barang</a>
            @elseif (Auth::user()->role === 'supervisor')
                <a href="{{ route('supervisor.dashboard') }}">Manajemen Barang</a>
            @elseif (Auth::user()->role === 'staf')
                <a href="{{ route('staf.dashboard') }}">Manajemen Barang</a>
            @endif
        </div>

        <ul class="sidebar-nav">
            @if (Auth::user()->role === 'admin')
                <li class="sidebar-header">
                    Admin Element
                </li>
                <li class="sidebar-item">
                    <a href="{{ route('admin.dashboard') }}" class="sidebar-link">
                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAaklEQVRIS2NkoDFgpLH5DKMWEAxh+gfRfyAAOYsRCEA0kPsLSLESdCpUAUwfTD2GD2huAbEuJVYd/eOAWJcRq46YOABHOrGAnEimrgXEupRYdaORjBFSo5FMbOKBqxuGqYjkMCCggeZBBADiXjAZVkgU8gAAAABJRU5ErkJggg=="
                            class="pe-2" />
                        Dashboard
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{ route('admin.lihatkategori') }}" class="sidebar-link">
                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAaklEQVRIS2NkoDFgpLH5DKMWEAxh+gfRfyAAOYsRCEA0kPsLSLESdCpUAUwfTD2GD2huAbEuJVYd/eOAWJcRq46YOABHOrGAnEimrgXEupRYdaORjBFSo5FMbOKBqxuGqYjkMCCggeZBBADiXjAZVkgU8gAAAABJRU5ErkJggg=="
                            class="pe-2" />
                        Lihat Kategori
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{ route('admin.lihatproduk') }}" class="sidebar-link">
                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAaklEQVRIS2NkoDFgpLH5DKMWEAxh+gfRfyAAOYsRCEA0kPsLSLESdCpUAUwfTD2GD2huAbEuJVYd/eOAWJcRq46YOABHOrGAnEimrgXEupRYdaORjBFSo5FMbOKBqxuGqYjkMCCggeZBBADiXjAZVkgU8gAAAABJRU5ErkJggg=="
                            class="pe-2" />
                        Lihat Produk
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{ route('admin.lihattransaksi') }}" class="sidebar-link">
                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAaklEQVRIS2NkoDFgpLH5DKMWEAxh+gfRfyAAOYsRCEA0kPsLSLESdCpUAUwfTD2GD2huAbEuJVYd/eOAWJcRq46YOABHOrGAnEimrgXEupRYdaORjBFSo5FMbOKBqxuGqYjkMCCggeZBBADiXjAZVkgU8gAAAABJRU5ErkJggg=="
                            class="pe-2" />
                        Lihat Transaksi
                    </a>
                </li>
                
                {{-- <li class="sidebar-item">
                    <a href="{{ route('tambahProfil') }}" class="sidebar-link">
                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAaklEQVRIS2NkoDFgpLH5DKMWEAxh+gfRfyAAOYsRCEA0kPsLSLESdCpUAUwfTD2GD2huAbEuJVYd/eOAWJcRq46YOABHOrGAnEimrgXEupRYdaORjBFSo5FMbOKBqxuGqYjkMCCggeZBBADiXjAZVkgU8gAAAABJRU5ErkJggg=="
                            class="pe-2" />
                        Tambah Profil
                    </a>
                </li> --}}
                <li class="sidebar-item">
                    <a href="{{ route('lihatProfil') }}" class="sidebar-link">
                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAaklEQVRIS2NkoDFgpLH5DKMWEAxh+gfRfyAAOYsRCEA0kPsLSLESdCpUAUwfTD2GD2huAbEuJVYd/eOAWJcRq46YOABHOrGAnEimrgXEupRYdaORjBFSo5FMbOKBqxuGqYjkMCCggeZBBADiXjAZVkgU8gAAAABJRU5ErkJggg=="
                            class="pe-2" />
                        Lihat Profil
                    </a>
                </li>
            @elseif (Auth::user()->role === 'supervisor')
                <li class="sidebar-header">
                    Supervisor Element
                </li>
                <li class="sidebar-item">
                    <a href="{{ route('supervisor.dashboard') }}" class="sidebar-link">
                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAaklEQVRIS2NkoDFgpLH5DKMWEAxh+gfRfyAAOYsRCEA0kPsLSLESdCpUAUwfTD2GD2huAbEuJVYd/eOAWJcRq46YOABHOrGAnEimrgXEupRYdaORjBFSo5FMbOKBqxuGqYjkMCCggeZBBADiXjAZVkgU8gAAAABJRU5ErkJggg=="
                            class="pe-2" />
                        Dashboard
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{ route('supervisor.lihatkategori') }}" class="sidebar-link">
                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAaklEQVRIS2NkoDFgpLH5DKMWEAxh+gfRfyAAOYsRCEA0kPsLSLESdCpUAUwfTD2GD2huAbEuJVYd/eOAWJcRq46YOABHOrGAnEimrgXEupRYdaORjBFSo5FMbOKBqxuGqYjkMCCggeZBBADiXjAZVkgU8gAAAABJRU5ErkJggg=="
                            class="pe-2" />
                        Lihat Kategori
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{ route('supervisor.lihatproduk') }}" class="sidebar-link">
                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAaklEQVRIS2NkoDFgpLH5DKMWEAxh+gfRfyAAOYsRCEA0kPsLSLESdCpUAUwfTD2GD2huAbEuJVYd/eOAWJcRq46YOABHOrGAnEimrgXEupRYdaORjBFSo5FMbOKBqxuGqYjkMCCggeZBBADiXjAZVkgU8gAAAABJRU5ErkJggg=="
                            class="pe-2" />
                        Lihat Produk
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{ route('supervisor.lihattransaksi') }}" class="sidebar-link">
                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAaklEQVRIS2NkoDFgpLH5DKMWEAxh+gfRfyAAOYsRCEA0kPsLSLESdCpUAUwfTD2GD2huAbEuJVYd/eOAWJcRq46YOABHOrGAnEimrgXEupRYdaORjBFSo5FMbOKBqxuGqYjkMCCggeZBBADiXjAZVkgU8gAAAABJRU5ErkJggg=="
                            class="pe-2" />
                        Lihat Transaksi
                    </a>
                </li>
            @elseif (Auth::user()->role === 'staf')
                <li class="sidebar-header">
                    Staf Element
                </li>
                <li class="sidebar-item">
                    <a href="{{ route('staf.dashboard') }}" class="sidebar-link">
                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAaklEQVRIS2NkoDFgpLH5DKMWEAxh+gfRfyAAOYsRCEA0kPsLSLESdCpUAUwfTD2GD2huAbEuJVYd/eOAWJcRq46YOABHOrGAnEimrgXEupRYdaORjBFSo5FMbOKBqxuGqYjkMCCggeZBBADiXjAZVkgU8gAAAABJRU5ErkJggg=="
                            class="pe-2" />
                        Dashboard
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{ route('staf.lihatproduk') }}" class="sidebar-link">
                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAaklEQVRIS2NkoDFgpLH5DKMWEAxh+gfRfyAAOYsRCEA0kPsLSLESdCpUAUwfTD2GD2huAbEuJVYd/eOAWJcRq46YOABHOrGAnEimrgXEupRYdaORjBFSo5FMbOKBqxuGqYjkMCCggeZBBADiXjAZVkgU8gAAAABJRU5ErkJggg=="
                            class="pe-2" />
                        Lihat Produk
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{ route('staf.lihattransaksi') }}" class="sidebar-link">
                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAaklEQVRIS2NkoDFgpLH5DKMWEAxh+gfRfyAAOYsRCEA0kPsLSLESdCpUAUwfTD2GD2huAbEuJVYd/eOAWJcRq46YOABHOrGAnEimrgXEupRYdaORjBFSo5FMbOKBqxuGqYjkMCCggeZBBADiXjAZVkgU8gAAAABJRU5ErkJggg=="
                            class="pe-2" />
                        Lihat Transaksi
                    </a>
                </li>

            @endif
        </ul>
    </div>
</aside>
