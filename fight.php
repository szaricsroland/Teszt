<?php 
include('connection.php');
 //adatok
    $ids =$_POST['ids'];
    $id1 = $ids[0];
    $id2 = $ids[1];
    $query = mysqli_query($con, "SELECT id, Name, Cast, Power FROM robot WHERE id='$id1'");
    $querya = mysqli_query($con,"SELECT id, Name, Cast, Power FROM robot WHERE id='$id2'");
    $row = mysqli_fetch_array($query);
    $rowa = mysqli_fetch_array($querya);
    $jsonArray = array(
      'id' => $row['id'],
      'Name' => $row['Name'],
      'Cast' => $row['Cast'],
      'Power' => $row['Power'],
    );
    $jsonArraya = array(
      'id' => $rowa['id'],
      'Name' => $rowa['Name'],
      'Cast' => $rowa['Cast'],
      'Power' => $rowa['Power'],
    );
          //Győztes ellenőrzés
      if($jsonArray['Power'] == $jsonArraya['Power']) {
         if ($jsonArray['id'] > $jsonArraya['id']){
          $ret = implode(" ", $jsonArray);
          echo "A győztes: " .  $ret;
    }
      else if ($jsonArray['id'] < $jsonArraya['id']){
          $ret = implode(" ", $jsonArraya);
          echo "A győztes: " . $ret;
        
  }
     
    }
    else {

    
    if($jsonArray['Power'] > $jsonArraya['Power']) {
      $ret = implode(" ", $jsonArray);
      echo "A győztes: " .  $ret;
}
  else {
      $ret = implode(" ", $jsonArraya);
      echo "A győztes: " .  $ret;
}
    }
?>