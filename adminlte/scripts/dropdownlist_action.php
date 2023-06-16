<?php
include('connect.php');

$id = $_POST['id'];
echo $id;
$sql = "SELECT * FROM address WHERE city_id = '$id'";
$result = mysqli_query($conn,$sql);

$out='';
while ($row = mysqli_fetch_assoc($result)){
    $out .= '<option>'.$row['address'].'</option>';
}
echo $out;

?>