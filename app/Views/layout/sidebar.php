 <!-- ======= Sidebar ======= -->

 <?php
    $path = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
    $segment = $path[1];

    ?>

 <aside id="sidebar" class="sidebar">

     <ul class="sidebar-nav" id="sidebar-nav">
         <li class="nav-item">
             <a class="nav-link <?= ($segment == '') ? '' : 'collapsed'; ?>" href="/">
                 <i class="bi bi-grid"></i>
                 <span>Dashboard</span>
             </a>
         </li>

         <li class="nav-item">
             <a class="nav-link <?= ($segment == 'dev') ? '' : 'collapsed'; ?>" href="<?= base_url('dev'); ?>">
                 <i class="bi bi-buildings"></i>
                 <span>Developer</span>
             </a>
         </li>

         <li class="nav-item">
             <a class="nav-link <?= ($segment == 'prmh') ? '' : 'collapsed'; ?>" href="<?= base_url('prmh'); ?>">
                 <i class="bi bi-buildings"></i>
                 <span>Perumahan</span>
             </a>
         </li>

         <li class="nav-item">
             <a class="nav-link <?= ($segment == 'kons') ? '' : 'collapsed'; ?>" href="<?= base_url('kons'); ?>">
                 <i class="bi bi-buildings"></i>
                 <span>Konsumen</span>
             </a>
         </li>

         <li class="nav-item">
             <a class="nav-link <?= ($segment == 'usr') ? '' : 'collapsed'; ?>" href="<?= base_url('usr'); ?>">
                 <i class="bi bi-buildings"></i>
                 <span>User</span>
             </a>
         </li>


         <li class="nav-item">
             <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                 <i class="bi bi-menu-button-wide"></i><span>Components</span><i class="bi bi-chevron-down ms-auto"></i>
             </a>
             <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                 <li>
                     <a href="components-alerts.html">
                         <i class="bi bi-circle"></i><span>Alerts</span>
                     </a>
                 </li>
                 <li>
                     <a href="components-accordion.html">
                         <i class="bi bi-circle"></i><span>Accordion</span>
                     </a>
                 </li>
             </ul>
         </li><!-- End Components Nav -->

     </ul>

 </aside><!-- End Sidebar-->