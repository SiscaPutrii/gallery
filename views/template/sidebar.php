<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link text-dark <?= $side == 'dashboard' ? '' : 'collapsed'; ?>" href="gallery.php">
                <i class="bi text-dark bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
            <a class="nav-link text-dark <?= $title == 'profil' ? '' : 'collapsed'; ?>" href="profil.php">
                <i class="bi text-dark bi-person"></i>
                <span>Profil</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link text-dark <?= $side == 'calbum' ? '' : 'collapsed'; ?>" href="calbum.php">
                <i class="bx text-dark bx-photo-album"></i>
                <span>My Album</span>
            </a>
        </li>

    </ul>

</aside><!-- End Sidebar-->