 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Dodawanie użytkownika</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="logged.php">Home</a></li>
              <li class="breadcrumb-item active">Dodawanie użytkownika</li>
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
                <h3 class="card-title">Podaj dane nowego użytkownika</h3>
              </div>
              <div class="card-body">

                  <form action="../../scripts/add_user.php" method="POST">
                      <!-- Imię -->
                      <div class="form-group">
                          <label>Podaj imię:</label>
                          <input type="text" class="form-control form-control-lg" name="firstName" placeholder="Imię">
                      </div>
                      <!-- Nazwisko -->
                      <div class="form-group">
                          <label>Podaj nazwisko:</label>
                          <input type="text" class="form-control form-control-lg" name="lastName" placeholder="Nazwisko">
                      </div>
                      <!-- Email1 -->
                      <div class="form-group">
                          <label>Podaj adres e-mail:</label>
                          <input type="email" class="form-control form-control-lg" name="email1" placeholder="E-mail">
                      </div>
                      <!-- Email2 -->
                      <div class="form-group">
                          <label>Powtórz adres e-mail:</label>
                          <input type="email" class="form-control form-control-lg" name="email2" placeholder="E-mail ponownie">
                      </div>
                      <!-- Hasło1 -->
                      <div class="form-group">
                          <label>Podaj hasło:</label>
                          <input type="password" class="form-control form-control-lg" name="pass1" placeholder="Hasło">
                      </div>
                      <!-- Hasło2 -->
                      <div class="form-group">
                          <label>Powtórz hasło:</label>
                          <input type="password" class="form-control form-control-lg" name="pass2" placeholder="Hasło ponownie">
                      </div>
                      <!-- Nr telefonu -->
                      <div class="form-group">
                          <label>Podaj numer telefonu:</label>
                          <input type="text" class="form-control form-control-lg" name="phoneNumber" placeholder="Nr telefonu">
                      </div>
                <!-- Wybór roli -->
                <div class="form-group">
                  <label>Wybierz rolę:</label>


                            <select class="form-control form-control-lg" name="role_id">
                                <option value="" disabled selected>-Wybierz rolę-</option>
                                <?php
                                require_once "../../scripts/connect.php";
                                $sql = "SELECT id, role FROM roles";
                                $result = $conn->query($sql);
                                while ($row = $result->fetch_assoc()) {
                                   echo "<option value='$row[id]'>$row[role]</option>";
                                }
                                ?>
                            </select>


                </div>

                      <!-- /.form group -->


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
                  </form><br><br>

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
