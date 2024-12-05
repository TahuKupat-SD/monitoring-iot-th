<?php
$page = $_GET['page'];
$insert = false;

if(isset ($_POST['edit_data'])){
  $old_id = $_POST['edit_data'];

  $serial_number = $_POST['serial_number'];
  $mcu_type = $_POST['mcu_type'];
  $location = $_POST['location'];
  $active = $_POST['active'];

  $sql_edit = "UPDATE devices SET serial_number = '$serial_number', mcu_type = '$mcu_type', location = '$location', active = '$active' WHERE serial_number = '$old_id'";
  mysqli_query($conn,$sql_edit);

} else if(isset($_POST['serial_number'])){

  $serial_number = $_POST['serial_number'];
  $mcu_type = $_POST['mcu_type'];
  $location = $_POST['location'];

  $sql_insert = "INSERT INTO devices (serial_number, mcu_type, location) VALUES ('$serial_number', '$mcu_type', '$location')";
  mysqli_query($conn, $sql_insert);
  $insert = true;
}

if(isset($_GET['edit'])){
  $id = $_GET['edit'];
  $sql_select_data = "SELECT * FROM devices WHERE serial_number = '$id' LIMIT 1";

  $result = mysqli_query($conn, $sql_select_data);
  $data = mysqli_fetch_assoc($result);
}


$sql = "SELECT * FROM devices";
$result = mysqli_query($conn, $sql);

?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Device</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
         <?php
         if($insert == true){
          alertsSuccess("data berhasil ditambahkan");
         }
         ?>
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Registered Devices</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Serial Number</th>
                    <th>Tipe Microcontroller</th>
                    <th>Location</th>
                    <th>Time Registered</th>
                    <th>Active</th>
                    <th>Edit</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php while($row = mysqli_fetch_assoc($result)){?>
                      <tr>
                        <td><?php echo $row['serial_number'];?></td>
                        <td><?php echo $row['mcu_type'];?></td>
                        <td><?php echo $row['location'];?></td>
                        <td><?php echo $row['created_time'];?></td>
                        <td><?php echo $row['active'];?></td>
                        <td><a href="?page=<?php echo $page ?>&edit=<?php echo $row['serial_number']?>"><i class="fas fa-edit"></a.</i></td>
                      </tr>
                    <?php } ?>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>

              <?php if(!isset($_GET['edit'])){ ?>
                <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title">Add Data</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form method="post" action="?page=<?php echo $page?>">
                    <div class="card-body">
                      <div class="form-group">
                        <label>Serial Number</label>
                        <input type="text" class="form-control" name="serial_number" placeholder="Enter Serial Number(can't be the same)" required>
                      </div>
                      <div class="form-group">
                        <label>Type MCU</label>
                        <input type="text" class="form-control" name="mcu_type" placeholder="Enter Type MCU" required>
                      </div>
                      <div class="form-group">
                        <label>Location</label>
                        <div class="input-group">
                        <input type="text" class="form-control" name="location" placeholder="Location" required>
                        </div>
                      </div>
                    </div>
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                  </form>
                </div>
              <?php } else {?>  

              <div class="card card-warning">
                <div class="card-header">
                  <h3 class="card-title">Edit Data</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="post" action="?page=<?php echo $page?>">
                  <div class="card-body">
                    <div class="form-group">
                      <label>Serial Number</label>
                      <input type="hidden" name="edit_data" value="<?php echo $data['serial_number'] ?>">
                      <input type="text" class="form-control" name="serial_number" value = "<?php echo $data['serial_number']?>" placeholder="Enter Serial Number(can't be the same)" required>
                    </div>
                    <div class="form-group">
                      <label>Type MCU</label>
                      <input type="text" class="form-control" name="mcu_type" value = "<?php echo $data['mcu_type']?>" placeholder="Enter Type MCU" required>
                    </div>
                    <div class="form-group">
                      <label>Location</label>
                      <div class="input-group">
                        <input type="text" class="form-control" name="location" value = "<?php echo $data['location']?>" placeholder="Location" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Status</label>
                      <div class="input-group">
                          <select class="form-control" name="active">
                            <?php if($data['active'] == 'Yes'){?>
                              <option value ="Yes">Active</option>
                              <option value = "No">Not Active</option>
                            <?php } else { ?>
                              <option value = "No">Not Active</option>
                            <option value = "Yes"> Active</option>
                            <?php } ?>
                          </select>
                      </div>
                    </div>
                   </div>
                  <div class="card-footer">
                    <button type="submit" class="btn btn-warning">Edit</button>
                  </div>
                </form>
              </div>
              <?php } ?>
             </div>
         </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>