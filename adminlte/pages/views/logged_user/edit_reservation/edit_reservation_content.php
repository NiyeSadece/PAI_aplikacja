<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <?php
        if (isset($_SESSION["error"])){
            echo <<< ERROR
    <div class="callout callout-danger">
        <h5>Błąd!</h5>
        <p>$_SESSION[error]</p>
    </div>
ERROR;
        }
        unset($_SESSION["error"]);
        ?>
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edycja rezerwacji o identyfikatorze: <?php echo $_SESSION["edit_reservationId"] ?> </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="logged.php">Home</a></li>
                        <li class="breadcrumb-item active">Twoje rezerwacje</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <!-- /.login-logo -->
            <?php
            if (isset($_SESSION["success"])){
                echo <<< ERROR
    <div class="callout callout-success">
        <h5>Info</h5>
        <p>$_SESSION[success]</p>
    </div>
ERROR;
                unset($_SESSION["success"]);
            }?>

            <!-- /.col (left) -->
            <div class="row-cols-1">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">
                    </div>
                    <div class="card-body">

                        <!-- Dodaj formularz z ukrytym polem edit_reservation -->
                        <form action="#" method="post">
                            <input type="hidden" name="edit_reservation" value="<?php echo $_SESSION["edit_reservationId"] ?>">

                            <!-- Dodaj pola formularza z wypełnionymi danymi dotyczącymi istniejącej rezerwacji -->
                            <div class="form-group">
                                <label for="name">Nazwa</label>
                                <input type="text" class="form-control" id="name" name="name" value="">
                            </div>

                            <div class="form-group">
                                <label for="date">Data</label>
                                <input type="date" class="form-control" id="date" name="date" value="">
                            </div>

                            <!-- Reszta pól formularza -->

                            <button type="submit" class="btn btn-primary">Edytuj</button>
                        </form>



                        <!-- /.card-body -->
                        <div>

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
