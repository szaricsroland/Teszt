<?php 
include('connection.php');

$id = $_POST['id'];
$sql = "UPDATE robot SET Deleted = 'true' WHERE id='$id' ";

$delQuery =mysqli_query($con,$sql);
if($delQuery==true)
{
	 $data = array(
        'status'=>'success',
       
    );

    echo json_encode($data);
}
else
{
     $data = array(
        'status'=>'failed',
      
    );

    echo json_encode($data);
} 

?>