<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Lista dostępnych stolików w restauracji: </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="logged.php">Home</a></li>
                        <li class="breadcrumb-item active">Nowa rezerwacja</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">



            <!-- /.col (left) -->
            <div class="row-cols-1">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title"><?php echo $_SESSION["logged"]["restaurantName"]?>, <?php echo $_SESSION["logged"]["address"]?> </h3>
                    </div>
                    <div class="card-body">


                        <?php if (isset($_SESSION["logged"]["availableTables"])) {
                            $availableTables = $_SESSION["logged"]["availableTables"];

                            foreach ($availableTables as $table) { ?>
                                <div>
                                    <h4>Numer stolika: <?php echo $table["tableNumber"]; ?></h4>
                                    <p>Stolik dla <?php echo $table["seats"]; ?> osób</p>
                                    <form action="../../scripts/new_reservation.php" method="POST">
                                        <input type="hidden" name="tableNumber" value="<?php echo $table["tableNumber"]; ?>">
                                        <input type="hidden" name="seats" value="<?php echo $table["seats"]; ?>">
                                        <input type="submit" value="Zarezerwuj" class="btn btn-primary">
                                    </form>
                                </div>
                                <hr>
                            <?php } ?>
                        <?php } else { ?>
                            <p>Brak dostępnych stolików.</p>
                        <?php } ?>

                    </div>
                    <!-- /.card-body -->

                    <!-- /.card -->
                </div>
                <!-- /.col (right) -->
            </div>

        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
