<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Nowa restauracja</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="logged.php">Home</a></li>
                        <li class="breadcrumb-item active">Nowa restauracja</li>
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
                        <h3 class="card-title">Podaj dane nowej restauracji</h3>
                    </div>
                    <div class="card-body">

                        <form action="../../scripts/new_restaurant.php" method="POST">

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


                            <!-- Adres -->
                            <div class="form-group">
                                <label>Podaj adres:</label>
                                <input type="text" class="form-control form-control-lg" name="address" placeholder="Ulica i numer">
                            </div>

                            <!-- Nazwa -->
                            <div class="form-group">
                                <label>Podaj nazwę:</label>
                                <input type="text" class="form-control form-control-lg" name="name" placeholder="Nazwa">
                            </div>

                            <!-- Numer telefonu -->
                            <div class="form-group">
                                <label>Podaj numer telefonu:</label>
                                <input type="text" class="form-control form-control-lg" name="phone" placeholder="Numer telefonu">
                            </div>

                            <!--Wysłanie formularza-->
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-10">
                                    </div>
                                    <div class="col-2">
                                        <input type="submit" value="DALEJ" class="btn btn-outline-primary btn-block ">
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