<nav class="sidebar sidebar-offcanvas poppins" id="sidebar">
    <ul class="nav poppins font-sm">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('document-types.index') }}">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title font-sm">Tipe Dokumen</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="">
                <i class="icon-head menu-icon"></i>
                <span class="menu-title font-sm">Pegawai</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="">
                <i class="mdi mdi-file-document menu-icon"></i>
                <span class="menu-title font-sm">Dokumen</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="">
                <i class="mdi mdi-message-text menu-icon"></i>
                <span class="menu-title font-sm">Pengajuan Surat</span>
            </a>
        </li>






    </ul>
</nav>
<script>
    // Mendapatkan elemen tombol dan elemen navigasi
    var toggleButton = document.getElementById('toggle-sidebar-mobile');
    var sidebar = document.getElementById('sidebar');

    // Menambahkan event listener untuk meng-handle klik pada tombol
    toggleButton.addEventListener('click', function() {
        // Toggle kelas 'active' pada elemen navigasi
        sidebar.classList.toggle('active');
    });
</script>
