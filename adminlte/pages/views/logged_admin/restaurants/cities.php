<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Administrator</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Administrator</li>
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
                    <h3 class="card-title">Miasta</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Miasto</th>
                            <th>Liczba Kukieł</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        require_once "../../scripts/connect.php";
                        $stmt = $conn->prepare("SELECT c.id, c.city, COUNT(a.city_id) AS count FROM city c LEFT JOIN address a ON c.id = a.city_id GROUP BY c.id, c.city");
                        $stmt->execute();
                        $result = $stmt->get_result();
                        while($city = $result->fetch_assoc()){
                            echo <<< USERS
                <tr>
                  <td>$city[city]</td>
                  <td>$city[count]</td>
                  <td><a href="../../scripts/delete_city.php?cityIdDelete=$city[id]">Usuń</a></td>
                </tr>
USERS;
                        }
                        ?>
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Miasto</th>
                            <th>Liczba kukieł</th>
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