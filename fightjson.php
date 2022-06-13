<?php 
include('connection.php');
    //adatok
    $id1 = $_POST['id1'];
    $id2 = $_POST['id2'];
    $query = mysqli_query($con, "SELECT id, Name, Cast, Power FROM robot WHERE id='$id1'");
    $querya = mysqli_query($con,"SELECT id, Name, Cast, Power FROM robot WHERE id='$id2'");

    if(mysqli_num_rows($query) == 1) {
      if(mysqli_num_rows($querya) == 1) {
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
    //győztes ellenőrzés
if($id1 != $id2) {


     if($jsonArray['Power'] == $jsonArraya['Power']) {

       if ($jsonArray['id'] >$jsonArraya['id']){

        echo  "A győztes: " . json_encode($jsonArray);
  }
   else if ($jsonArray['id'] < $jsonArraya['id']){

        echo  "A győztes: " . json_encode($jsonArraya);
 }
  
 }
    else {

 
       if($jsonArray['Power'] > $jsonArraya['Power']) {

  echo  "A győztes: " . json_encode($jsonArray);
}
else {

  echo  "A győztes: " . json_encode($jsonArraya);
}

}
}
else {
  echo "Saját magával nem harcolhat a robot!";
}
      }
      else{
        if(mysqli_num_rows($query) == 0 && mysqli_num_rows($querya) == 0) {
          echo "Egyik robot sem található!";
        }
       
       else {
        echo "Második robot ID-ja nem található!";
       } 
      }
    }
    else{
      if(mysqli_num_rows($query) == 0 && mysqli_num_rows($querya) == 0) {
        echo "Egyik robot sem található!";
      }
      else {
              echo "Első robot ID-ja nem található!";
      }

    }



    



?>