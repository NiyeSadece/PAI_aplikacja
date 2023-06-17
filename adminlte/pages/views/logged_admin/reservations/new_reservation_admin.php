<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Rezerwacja stolika</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="logged.php">Home</a></li>
                        <li class="breadcrumb-item active">Rezerwacja stolika</li>
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
                        <h3 class="card-title">Podaj dane dotyczące Twojej rezerwacji</h3>
                    </div>
                    <div class="card-body">

                        <form action="../../scripts/reservation_admin.php" method="POST">

                            <!-- Wybór użytkownika -->
                            <div class="form-group">
                                <label>Wybierz użytkownika:</label>


                                <select class="form-control form-control-lg" name="user" id="userID">
                                    <option value="" disabled selected>-Wybierz użytkownika-</option>
                                    <?php
                                    require_once "../../scripts/connect.php";
                                    $sql = "SELECT id, firstName, lastName, email FROM users";
                                    $result = $conn->query($sql);
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<option value='$row[id]'>$row[email] — $row[firstName] $row[lastName]</option>";
                                    }
                                    ?>
                                </select>


                            </div>

                            <!-- Wybór miasta -->
                            <div class="form-group">
                                <label>Wybierz miasto:</label>


                                <select class="form-control form-control-lg" name="city" id="cityID">
                                    <option value="" disabled selected>-Wybierz miasto-</option>
                                    <?php
                                    require_once "../../scripts/connect.php";
                                    $sql = "SELECT id, city FROM city";
                                    $result = $conn->query($sql);
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<option value='$row[id]'>$row[city]</option>";
                                    }
                                    ?>
                                </select>


                            </div>


                            <!-- Wybór restauracji -->
                            <div class="form-group">
                                <label>Wybierz restauracje:</label>


                                <select class="form-control form-control-lg" name="address" id="show">
                                    <option value="" >-Wybierz adres restauracji-</option>
                                    <!--  Tu działa skrypt js - dynamiczna lista rozwijana -->
                                </select>

                            </div>

                            <!-- Data rezerwacji -->


                            <div class="form-group">
                                <label>Wybierz datę rezerwacji:</label>
                                <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                    <input type="date" class="form-control"  name="reservation_date" />

                                </div>
                            </div>
                            <!-- /.form group -->

                            <!-- Godzina rezerwacji -->



                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Wybierz godzinę rozpoczęcia rezerwacji:</label>
                                        <div class="input-group">
                                            <input type="text" id="timepkr" class="form-control" placeholder="HH:MM" onclick="showpickers('timepkr',24)" pattern="[0-9]{2}:[0-9]{2}" name="start_time" "/>
                                            <button type="button" class="btn btn-primary" onclick="showpickers('timepkr',24)">
                                                <i class="far fa-clock"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="timepicker" data-target-input="nearest"></div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Podaj liczbę godzin rezerwacji:</label>
                                        <input type="number" id="hoursInput" class="form-control" min="1" onblur="calculateEndTime()" />
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Godzina zakończenia rezerwacji:</label>
                                        <input type="text" id="endTimeDisplay" class="form-control" placeholder="HH:MM" name="end_time" readonly />
                                    </div>
                                </div>
                            </div>


                            <!--Wysłanie formularza-->
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-10">
                                    </div>
                                    <div class="col-2">
                                        <input type="submit" value="WYBÓR STOLIKA" class="btn btn-outline-primary btn-block ">
                                    </div>
                                </div>
                            </div>
                        </form>

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
