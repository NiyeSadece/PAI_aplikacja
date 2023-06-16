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
                    <h3 class="card-title">Restauracje</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Nazwa</th>
                            <th>Adres</th>
                            <th>Miasto</th>
                            <th>Numer telefonu</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        require_once "../../scripts/connect.php";
                        $stmt = $conn->prepare("SELECT r.restaurant_id, r.name, r.phoneNumber, a.address, c.city FROM restaurants r INNER JOIN address a ON r.address_id = a.id INNER JOIN city c ON a.city_id = c.id");
                        $stmt->execute();
                        $result = $stmt->get_result();
                        while($restaurant = $result->fetch_assoc()){
                            echo <<< USERS
                <tr>
                  <td>$restaurant[name]</td>
                  <td>$restaurant[address]</td>
                  <td>$restaurant[city]</td>
                  <td>$restaurant[phoneNumber]</td>
                  <td><a href="../../scripts/delete_restaurant.php?restaurantIdDelete=$restaurant[restaurant_id]">Usuń</a> / 
                  <a href="./edit_restaurant.php?restaurantIdUpdate=$restaurant[restaurant_id]">Edytuj</a></td>
                </tr>
USERS;
                        }
                        ?>
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Nazwa</th>
                            <th>Adres</th>
                            <th>Miasto</th>
                            <th>Numer telefonu</th>
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
