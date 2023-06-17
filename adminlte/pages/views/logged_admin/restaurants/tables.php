<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Lista stolików w restauracji: </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="logged.php">Home</a></li>
                        <li class="breadcrumb-item active">Dodaj stoliki</li>
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
                                </div>
                                <hr>
                            <?php } ?>
                            <form action="../../scripts/tables.php" method="POST">
                                <input type="text" name="tableNumber" placeholder="Numer stolika">
                                <input type="text" name="seats" placeholder="Liczba krzeseł">
                                <input type="submit" value="DODAJ" class="btn btn-primary">
                            </form>
                        <?php } else { ?>
                            <p>Brak stolików.</p>
                        <form action="../../scripts/tables.php" method="POST">
                            <input type="text" name="tableNumber" placeholder="Numer stolika">
                            <input type="text" name="seats" placeholder="Liczba krzeseł">
                            <input type="submit" value="DODAJ" class="btn btn-primary">
                        </form>
                        <?php } ?>
                        <a href="./restaurants.php"><input type="submit" value="KONIEC" class="btn btn-primary"></a>

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