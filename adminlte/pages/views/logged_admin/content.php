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
          <h3 class="card-title">Użytkownicy</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>Imię</th>
              <th>Nazwisko</th>
                <th>E-mail</th>
              <th>Data utworzenia</th>
              <th>Data ostatniego logowania</th>
              <th>Rola</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php
              require_once "../../scripts/connect.php";
            $stmt = $conn->prepare("SELECT u.id, u.firstName, u.lastName, u.email, u.created_at AS createUser, IFNULL(l.created_at, 'Brak danych') AS lastLog, r.role FROM users u LEFT JOIN logs l ON u.id = l.user_id INNER JOIN roles r ON u.role_id = r.id WHERE l.created_at IS NULL OR l.created_at = (SELECT MAX(created_at) FROM logs WHERE user_id = u.id) ORDER BY lastLog DESC");

            $stmt->execute();
              $result = $stmt->get_result();
              while($user = $result->fetch_assoc()){
                  $lastLog = !empty($user['lastLog']) ? $user['lastLog'] : 'Brak danych';
	              echo <<< USERS
                <tr>
                  <td>$user[firstName]</td>
                  <td>$user[lastName]</td>
                  <td>$user[email]</td>
                  <td>$user[createUser]</td>
                  <td>$user[lastLog]</td>
                  <td>$user[role]</td>
                  <td><a href="../../scripts/delete_user.php?userIdDelete=$user[id]">Usuń</a> / 
                  <a href="./edit_user.php?userIdUpdate=$user[id]">Edytuj</a></td>
                </tr>
USERS;
              }
            ?>
            </tbody>
            <tfoot>
            <tr>
              <th>Imię</th>
              <th>Nazwisko</th>
                <th>E-mail</th>
              <th>Data utworzenia</th>
              <th>Data ostatniego logowania</th>
              <th>Rola</th>
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



