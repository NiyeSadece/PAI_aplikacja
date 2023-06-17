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
                        <li class="breadcrumb-item active">Nowe miasto</li>
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
                        <h3 class="card-title">Podaj nowe miasto, które zostało zakukłaczone!</h3>
                    </div>
                    <div class="card-body">

                        <form action="../../scripts/new_city.php" method="POST">

                            <!-- Miasto -->
                            <div class="form-group">
                                <label>Podaj miasto:</label>
                                <input type="text" class="form-control form-control-lg" name="city" placeholder="Miasto">
                            </div>

                            <!--Wysłanie formularza-->
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-10">
                                    </div>
                                    <div class="col-2">
                                        <input type="submit" value="DODAJ" class="btn btn-outline-primary btn-block ">
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