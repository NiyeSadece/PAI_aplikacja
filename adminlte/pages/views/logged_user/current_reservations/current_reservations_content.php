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
                    <h1 class="m-0">Cześć, <?php echo $_SESSION["logged"]["firstName"]?>!</h1>

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
                        <h3 class="card-title">Twoje rezerwacje</h3>
                    </div>
                    <div class="card-body">

                        <?php
                        if (isset($_SESSION["reservations"]) && !empty($_SESSION["reservations"])) {
                            $reservations = $_SESSION["reservations"];

                            foreach ($reservations as $reservation) {
                                $reservationId = $reservation["reservationId"];
                                $restaurantName = $reservation["restaurantName"];
                                $address = $reservation["address"];
                                $tableNumber = $reservation["tableNumber"];
                                $seats = $reservation["seats"];
                                $reservationDate = $reservation["reservationDate"];
                                $startTime = $reservation["startTime"];
                                $endTime = $reservation["endTime"];

                                echo <<< RESERVATION
                                    <div>
                                        <h4>Indywidualny numer rezerwacji: $reservationId</h4>
                                        <p>Miejsce: $restaurantName, $address</p>
                                        <p>Numer stolika: $tableNumber</p>
                                        <p>Ilość miejsc przy stoliku: $seats</p>
                                        <p>Data: $reservationDate</p>
                                        <p>Godzina rozpoczęcia: $startTime</p>
                                        <p>Godzina zakończenia: $endTime</p>
                                        
                                        <div class="d-flex">
                                        <form action="../../scripts/edit_reservation.php" method="post">
                                         <input type="hidden" name="edit_reservation" value="$reservationId">
                                         <input type="hidden" name="restaurant Name" value="$restaurantName">
                                         <input type="hidden" name="address" value="$address">
                                         <input type="hidden" name="tableNumber" value="$tableNumber">
                                         <input type="hidden" name="seats" value="$seats">
                                         <input type="hidden" name="reservationDate" value="$reservationDate">
                                         <input type="hidden" name="startTime" value="$startTime">
                                         <input type="hidden" name="endTime" value="$endTime">
                                         
                                         <button type="submit" class="btn btn-primary mr-2">Edytuj</button>
                                        </form>
                                        
                                        <form action="../../scripts/delete_reservation_user.php" method="post" onsubmit="return confirm('Czy na pewno chcesz usunąć tę rezerwację?');">
                                            <input type="hidden" name="delete_reservationId" value="$reservationId">
                                            <button type="submit" class="btn btn-primary">Usuń</button>
                                        </form>
                                        </div> 
                                        <!-- d-flex-->

                                    </div>
                                    <hr>
RESERVATION;
                            }
                        } else  {
                            echo "<p>Brak bieżących rezerwacji.</p>";
                        }
                        ?>


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
