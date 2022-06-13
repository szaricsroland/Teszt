<?php 
include('connection.php');
$name = $_POST['name'];
$cast = $_POST['cast'];
$power = $_POST['power'];

$sql = "INSERT INTO `robot` (`Name`,`Cast`,`Power`) values ('$name', '$cast', '$power')";
$query= mysqli_query($con,$sql);
if($query ==true)
{
    $data = array(
        'status'=>'true',
    );
    echo json_encode($data);
}
else
{
     $data = array(
        'status'=>'false',
    );
    echo json_encode($data);
} 

?>