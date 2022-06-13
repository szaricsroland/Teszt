<?php include('connection.php');

$output= array();
$sql = "SELECT * FROM robot";
$totalQuery = mysqli_query($con,$sql);
$total_all_rows = mysqli_num_rows($totalQuery);
$columns = array(
	0 => 'id',
	1 => 'Name',
	2 => 'Cast',
	3 => 'Power',
);
if(isset($_POST['search']['value']))
{
	$search_value = $_POST['search']['value'];
	$sql .= " WHERE Name like '%".$search_value."%'";
	$sql .= " OR Cast like '%".$search_value."%'";
	$sql .= " OR Power like '%".$search_value."%'";
	$sql .= " OR id like '%".$search_value."%'";
}

$query = mysqli_query($con,$sql);
$count_rows = mysqli_num_rows($query);
$data = array();
$count = 0;
while($row = mysqli_fetch_assoc($query))
{
	if($row['Deleted'] == "false") {
	$sub_array = array();
	$sub_array[] = $row['id'];
	$sub_array[] = $row['Name'];
	$sub_array[] = $row['Cast'];
	$sub_array[] = $row['Power'];
	$sub_array[] = '<a href="javascript:void();" data-id="'.$row['id'].'"  class="btn btn-info btn-sm editbtn" >Módosít</a>  <a href="javascript:void();" data-id="'.$row['id'].'"  class="btn btn-danger btn-sm deleteBtn" >Töröl</a> ';
	$sub_array[] = '<input type="checkbox" class="check" id="check" value="'.$row['id'].'">';
	$data[] = $sub_array;
	}
	else {
		$count = $count +1;
	}
}
 $total_all_rows = $total_all_rows - $count;

$output = array(
	'draw'=> intval($_POST['draw']),
	'recordsTotal' =>$count_rows ,
	'recordsFiltered'=>   $total_all_rows,
	'data'=>$data,
);
echo  json_encode($output);
