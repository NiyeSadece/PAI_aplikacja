<?php
                            $currentURL = $_SERVER['REQUEST_URI'];
                            ?>

                            <aside class="main-sidebar sidebar-dark-primary elevation-4">
                                <!-- Brand Logo -->
                                <a href="index3.html" class="brand-link">
                                    <img src="../../dist/img/logo-kukla-inicjal.png" alt="Kukła Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                                    <span class="brand-text font-weight-light">Restauracje KUKŁA</span>
                                </a>

                                <!-- Sidebar -->
                                <div class="sidebar">
                                    <!-- Sidebar user panel (optional) -->
                                    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                                        <div class="info">
                                            <a href="#" class="d-block"><?php echo $_SESSION["logged"]["firstName"]." ".$_SESSION["logged"]["lastName"] ?></a>
                                        </div>
                                    </div>

                                    <!-- Sidebar Menu -->
                                    <nav class="mt-2">
                                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                                            <!-- Add icons to the links using the .nav-icon class
                                                     with font-awesome or any other icon font library -->
                                            <li class="nav-item menu-open">
                                                <a href="#" class="nav-link active">
                                                    <i class="nav-icon fas fa-light fa-calendar"></i>
                                                    <p>
                                                        Rezerwacje
                                                        <i class="right fas fa-angle-right"></i>
                                                    </p>
                                                </a>
                                                <ul class="nav nav-treeview">
                                                    <li class="nav-item">
                                                        <a href="./logged.php" class="nav-link <?php if (strpos($currentURL, 'logged.php') !== false) echo 'active'; ?>">
                                                            <i class="far fa-circle nav-icon"></i>
                                                            <p>Podgląd</p>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="./new_reservation_admin.php" class="nav-link <?php if (strpos($currentURL, 'new_reservation_admin.php') !== false) echo 'active'; ?>">
                                                            <i class="far fa-circle nav-icon"></i>
                                                            <p>Dodaj rezerwację</p>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </nav>
                                    <!-- /.sidebar-menu -->
                                </div>
                                <!-- /.sidebar -->
                            </aside>