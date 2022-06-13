<?php 
include('connection.php');
$name = $_POST['name'];
$cast = $_POST['cast'];
$power = $_POST['power'];
$id = $_POST['id'];

$sql = "UPDATE `robot` SET  `Name`='$name' , `Cast`= '$cast', `Power`='$power' WHERE id='$id' ";
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