<?php include('connection.php'); ?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap CSS -->
  <link href="css/bootstrap5.0.1.min.css" rel="stylesheet" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/datatables-1.10.25.min.css" />
  <title>Robot Game</title>
  <style type="text/css">
    .btnAdd {
      text-align: right;
      width: 83%;
      margin-bottom: 20px;
    }
  #fightForm, #end1 {
    width: 25%;
    text-align: center;}
   
  </style>
</head>
<body>
  <!--Alap felépítés -->
  <div class="container-fluid">
    <h2 class="text-center">Robot Game</h2>
    <p class="datatable design text-center">Robot Game</p>
    <div class="row">
      <div class="container">
      Pontosan 2 robotot válassz ki a checkboxok segítségével! <br> <br>
        <div class="btnAdd">
        <div  id="end1">
</div>
            <input type="button" id="button2" name ="button2" class="btn btn-primary" value="Harcba küld">
          <a href="#!" data-id="" data-bs-toggle="modal" data-bs-target="#addRobotModal" class="btn btn-success btn-sm">Robot hozzádadása</a>
        </div>
        <div class="row">
          <div class="col-md-2"></div>
          <div class="col-md-8">
            <table id="tabla" class="table">
              <thead>
                <th>Id</th>
                <th>Név</th>
                <th>Típus</th>
                <th>Erő</th>
                <th>Opciók</th>
                <th>Kiválaszt</th>
              </thead>
              <tbody>
              </tbody>
            </table>
          </div>
          <div class="col-md-2"></div>
        </div>
      </div>
    </div>
  </div>
  
  <script src="js/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
  <script src="js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  <script type="text/javascript" src="js/dt-1.10.25datatables.min.js"></script>
  <!-- Modal a modósításnak -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Módosít</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="updateRobot">
            <input type="hidden" name="id" id="id" value="">
            <input type="hidden" name="trid" id="trid" value="">
            <div class="mb-3 row">
              <label for="nameField" class="col-md-3 form-label">Név</label>
              <div class="col-md-9">
                <input type="text" class="form-control" id="nameField" name="nameUpdate" required>
              </div>
            </div>
            <div class="mb-3 row">
              <label for="powerField" class="col-md-3 form-label">Erő</label>
              <div class="col-md-9">
                <input type="number" min="0" class="form-control" id="powerField" name="powerField" required>
              </div>
            </div>
            <div class="mb-3 row">
              <label for="castField" class="col-md-3 form-label">Típus</label>
              <div class="col-md-9">
                <select class="form-control" id="castField" name="castUpdate" required>
                 <option value="Brawler">Brawler</option>
                 <option value="Rouge">Rouge</option>
                 <option value="Assault">Assault</option>
                </select>
              </div>
            </div>
            <div class="text-center">
              <button type="submit" class="btn btn-primary">Elküld</button>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Bezár</button>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal a robot hozzáadásnak -->
  <div class="modal fade" id="addRobotModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Robot hozzádadása</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="addRobot" action="">
            <div class="mb-3 row">
              <label for="addNameField" class="col-md-3 form-label">Név</label>
              <div class="col-md-9">
                <input type="text" class="form-control" id="addNameField" name="name" required>
              </div>
            </div>
            <div class="mb-3 row">
              <label for="addPowerField" class="col-md-3 form-label">Erő</label>
              <div class="col-md-9">
                <input type="number" min="0" class="form-control" id="addPowerField" name="powerAdd" required>
              </div>
            </div>
            <div class="mb-3 row">
              <label for="addCastField" class="col-md-3 form-label">Típus</label>
              <div class="col-md-9">
              <select class="form-control"id="addCastField" name="cast" required>
                 <option value="Brawler" >Brawler</option>
                 <option value="Rouge" >Rouge</option>
                 <option value="Assault">Assault</option>
                </select>
              </div>
            </div>
           
            <div class="text-center">
              <button type="submit" class="btn btn-primary">Elküld</button>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Bezár</button>
        </div>
      </div>
    </div>
  </div>
  <form class="container-fluid" id="fightForm" name="fightForm" method="post">
  <div  id="end">
</div>
<!-- form a json harcba küldéshez -->
  <h2 class="text-center">Add meg 2 robot id-jét az alábbi két mezőbe!</h2>
  <label for="fname">Első robot</label><br>
  <input type="number" min="1" id="id1" name="id1" class="form-control" placeholder="ID" ><br>
  <label for="lname">Második robot</label><br>
  <input type="number" min="1" id="id2" name="id2" class="form-control" placeholder="ID"><br>
  <input type="button" id="button1" name ="button1" class="btn btn-primary" value="Harcba küld JSON">

</form> 
<script>
       //datatable generálás
      $(document).ready(function() {
      $('#tabla').DataTable({
        "fnCreatedRow": function(nRow, aData, iDataIndex) {
          $(nRow).attr('id', aData[0]);
        },
        'serverSide': 'true',
        'processing': 'true',
        'paging': 'true',
        'order': [],
        'ajax': {
          'url': 'fetch_data.php',
          'type': 'post',
        },
        "aoColumnDefs": [{
            "bSortable": false,
          },
        ]
        
      });
    });
    //robot hozzáadás
    $(document).on('submit', '#addRobot', function(e) {
      e.preventDefault();
      var name = $('#addNameField').val();
      var power = $('#addPowerField').val();
      var cast = $('#addCastField').val();
        $.ajax({
          url: "add_robot.php",
          type: "post",
          data: {
            name: name,
            power: power,
            cast: cast
          },
          success: function(data) {
            var json = JSON.parse(data);
            var status = json.status;
            if (status == 'true') {
              mytable = $('#tabla').DataTable();
              mytable.draw();
              $('#addRobotModal').modal('hide');
            } else {
              alert('failed');
            }
          }
        });
    });
    //módosítás
    $(document).on('submit', '#updateRobot', function(e) {
      e.preventDefault();
      var name = $('#nameField').val();
      var cast = $('#castField').val();
      var power = $('#powerField').val();
      var trid = $('#trid').val();
      var id = $('#id').val();
        $.ajax({
          url: "update_robot.php",
          type: "post",
          data: {
            name: name,
            cast: cast,
            power: power,
            id: id
          },
          success: function(data) {
            var json = JSON.parse(data);
            var status = json.status;
            if (status == 'true') {
              table = $('#tabla').DataTable();

              var button = '<td> <a href="javascript:void();" data-id="' + id + '" class="btn btn-info btn-sm editbtn">Módosít</a>  <a href="#!"  data-id="' + id + '"  class="btn btn-danger btn-sm deleteBtn">Töröl</a></td>';
              var checkbox = '<input type="checkbox" class="check" id="check" value="'+ id + '">';
              var row = table.row("[id='" + trid + "']");
              row.row("[id='" + trid + "']").data([id, name, cast, power, button, checkbox]);
              $('#exampleModal').modal('hide');
            } else {
              alert('failed');
            }
          }
        });
    });
    //Módosít gombnak kiszedi az adott sori infót
    $('#tabla').on('click', '.editbtn ', function(event) {
      var table = $('#tabla').DataTable();
      var trid = $(this).closest('tr').attr('id');
      var id = $(this).data('id');
      $('#exampleModal').modal('show');

      $.ajax({
        url: "get_single_data.php",
        data: {
          id: id
        },
        type: 'post',
        success: function(data) {
          var json = JSON.parse(data);
          $('#nameField').val(json.name);
          $('#powerField').val(json.power);
          $('#castField').val(json.cast);
          $('#id').val(id);
          $('#trid').val(trid);
        }
      })
    });
//Törlés gomb
    $(document).on('click', '.deleteBtn', function(event) {
      var table = $('#tabla').DataTable();
      event.preventDefault();
      var id = $(this).data('id');
      if (confirm("Biztos törölni akarod ezt a Robotot? ")) {
        $.ajax({
          url: "delete_robot.php",
          data: {
            id: id
          },
          type: "post",
          success: function(data) {
            location.reload();
          }
        });
      } else {
        return null;
      }
    });
//json harcba küldés
$('#button1').click(function(){
 
 var id1 = $('#id1').val();
 var id2 = $('#id2').val();
 if(id1 === '' || id2 === '') {
  alert("Mindkét input mezőbe adja meg a robotok ID-ját! ");
 }
 else {
 $.ajax({    
 type : 'POST',
 url  : 'fightjson.php',
 data: {
    id1 : id1,
    id2 : id2,
 },
 success :  function(response) { 
         $("#end").html(response);                 
  }
  })
}}
);
//harcba küldés checkbox-szal
$('#button2').click(function(){
var result = $('input[type="checkbox"]:checked');
let resultString = new Array();
if (result.length == 2) {
                  result.each(function () {
                   resultString.push($(this).val());
                  });

 $.ajax({    
 type : 'POST',
 url  : 'fight.php',
 data: {
    ids : resultString,
 },
 success :  function(response) { 
         $("#end1").html(response);                 
  }
  })
}
else {
  alert("Pontosan 2 robotot válassz");
}

}
);

</script>
</body>
</html>