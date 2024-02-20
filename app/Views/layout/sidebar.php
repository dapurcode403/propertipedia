<?php
$path = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
$segment = $path[1];

?>
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
            <a href="/" class="nav-link <?= ($segment == '') ? 'active' : ''; ?>">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Dashboard
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="<?= base_url('dev'); ?>" class="nav-link <?= ($segment == 'dev') ? 'active' : ''; ?>">
                <ion-icon class="nav-icon" name="business-outline"></ion-icon>
                <p>
                    Developer
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="<?= base_url('prmh'); ?>" class="nav-link <?= ($segment == 'prmh') ? 'active' : ''; ?>">
                <ion-icon class="nav-icon" name="map-outline"></ion-icon>
                <p>
                    Perumahan
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="<?= base_url('kons'); ?>" class="nav-link <?= ($segment == 'kons') ? 'active' : ''; ?>">
                <ion-icon class="nav-icon" name="people-outline"></ion-icon>
                <p>
                    Konsumen
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="<?= base_url('usr'); ?>" class="nav-link <?= ($segment == 'usr') ? 'active' : ''; ?>">
                <ion-icon class="nav-icon" name="person-outline"></ion-icon>
                <p>
                    User
                </p>
            </a>
        </li>
        <!-- <li class="nav-item">
            <a href="#" class="nav-link ">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Starter Pages
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Active Page</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Inactive Page</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                    Simple Link
                    <span class="right badge badge-danger">New</span>
                </p>
            </a>
        </li> -->
    </ul>
</nav>