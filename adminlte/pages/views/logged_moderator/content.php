<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Pracownik</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Pracownik</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Main row -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Rezerwacje</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Restauracja</th>
                            <th>Stolik</th>
                            <th>Użytkownik</th>
                            <th>Data rezerwacji</th>
                            <th>Godzina rezerwacji</th>
                            <th>Godzina zakończenia rezerwacji</th>
                            <th>Data utworzenia</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        require_once "../../scripts/connect.php";
                        $stmt = $conn->prepare("SELECT r.reservation_id, f.name, u.firstName, u.lastName, u.email, t.tableNumber, t.seats, r.reservation_date, r.startTime, r.endTime, r.created_at, s.status FROM reservations r INNER JOIN restaurants f ON r.restaurant_id = f.restaurant_id INNER JOIN users u ON r.user_id = u.id INNER JOIN tables t ON r.table_id = t.table_id INNER JOIN status s ON r.status_id = s.id");
                        $stmt->execute();
                        $result = $stmt->get_result();
                        while($reservation = $result->fetch_assoc()){
                            echo <<< USERS
                <tr>
                  <td>$reservation[name]</td>
                  <td>Nr $reservation[tableNumber] dla $reservation[seats] osób</td>
                  <td>$reservation[firstName] $reservation[lastName] — $reservation[email]</td>
                  <td>$reservation[reservation_date]</td>
                  <td>$reservation[startTime]</td>
                  <td>$reservation[endTime]</td>
                  <td>$reservation[created_at]</td>
                  <td>$reservation[status]</td>
                  <td><a href="../../scripts/delete_reservation.php?reservationIdDelete=$reservation[reservation_id]">Usuń</a> / 
                  <a href="./edit_reservation_admin.php?reservationIdUpdate=$reservation[reservation_id]">Edytuj</a></td>
                </tr>
USERS;
                        }
                        ?>
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Restauracja</th>
                            <th>Stolik</th>
                            <th>Użytkownik</th>
                            <th>Data rezerwacji</th>
                            <th>Godzina rezerwacji</th>
                            <th>Godzina zakończenia rezerwacji</th>
                            <th>Data utworzenia</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <br>

            <!-- /.row -->
        </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
</div>