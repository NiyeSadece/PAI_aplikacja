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
            <div class="row">
                <!-- Left col -->
                <div class="col-md-8">
                    <!-- /.card -->
                    <div class="row">
                        <div class="col-md-6">
                            <!-- USERS LIST -->
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Użykownicy - logi</h3>
                                    <?php
                                    require_once "../../scripts/connect.php";
                                    $stmt = $conn->prepare("SELECT u.firstName, u.lastName, l.created_at, l.status FROM users u INNER JOIN logs l on u.id = l.user_id ORDER BY l.created_at DESC limit 8");
                                    $stmt->execute();
                                    $result = $stmt->get_result();
                                    $count = $result->num_rows;
                                    ?>
                                    <div class="card-tools">
                                        <span class="badge badge-danger"><?php echo "Użytkowników: $count"?></span>
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body p-0">
                                    <ul class="users-list clearfix">
                                        <?php
                                        while($user = $result->fetch_assoc()){
                                            echo <<< USERLOG
                          <li>
                            <a class="users-list-name" href="#">$user[firstName] $user[lastName]</a>
                            <span class="users-list-date">$user[created_at]</span>
  USERLOG;
                                            if ($user["status"] == 1){
                                                echo '<span class="users-list-date">zalogowany</span>';
                                            }else{
                                                echo '<span class="users-list-date">niezalogowany</span>';
                                            }
                                            echo <<< USERLOG
                          </li>
USERLOG;
                                        }
                                        ?>
                                    </ul>
                                    <!-- /.users-list -->
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer text-center">
                                    <a href="javascript:">View All Users</a>
                                </div>
                                <!-- /.card-footer -->
                            </div>
                            <!--/.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div></div>
            <br>

            <!-- /.row -->
        </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
</div>
