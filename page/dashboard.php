<?php

$sql = "SELECT * FROM devices WHERE active = 'Yes'";
$result = mysqli_query($conn, $sql);

?>


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-4">
            <div class="small-box bg-lightblue">
                <div class="inner">
                    <h3><span id="ph">-</span> %</h3>

                    <p>Sensor pH</p>
                </div>
                <div class="icon">
                    <i class="fas fa-eye-dropper"></i>
                </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="small-box bg-teal">
                <div class="inner">
                    <h3><span id="turbidity">-</span> %</h3>

                    <p>Sensor Turbidity</p>
                </div>
                <div class="icon">
                    <i class="fas fa-water"></i>
                </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="small-box bg-fuchsia">
                <div class="inner">
                    <h3><span id="temperature">-</span> °C</h3>

                    <p>Sensor Temperature</p>
                </div>
                <div class="icon">
                    <i class="fas fa-thermometer-quarter"></i>
                </div>
            </div>
          </div>
          <div class="col-8">
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Normal Value Limits</h3>
              </div>
              <p> </p>
               <div class="col-12">
                <div class="card card-lightblue">
                <div class="card-header">
                    <h3 class="card-title">Normal Ph Value Limits</h3>
                </div>
                  <div class="card-body">
                    <div class="row margin">
                      <div class="col-sm-6">
                        <p>Range Min</p>
                        <input id="r_phmin" onchange="publish_Rphmin()" type="text">
                      </div>
                      <div class="col-sm-6">
                        <p>Range Max</p>
                        <input id="r_phmax" onchange="publish_Rphmax()" type="text">
                      </div>
                    </div>
                  </div>
                <!-- /.card-body -->
                </div>
               </div>
               <div class="col-12">
                <div class="card card-teal">
                <div class="card-header">
                    <h3 class="card-title">Normal Turbidity Value Limits</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row margin">
                      <div class="col-sm-6">
                        <p>Range Min</p>
                        <input id="r_tumin" onchange="publish_Rtumin()" type="text">
                      </div>
                      <div class="col-sm-6">
                        <p>Range Min</p>
                        <input id="r_tumax" onchange="publish_Rtumax()" type="text">
                      </div>
                    </div>
                </div>
                <!-- /.card-body -->
                </div>
               </div>
               <div class="col-12">
                <div class="card card-fuchsia">
                <div class="card-header">
                    <h3 class="card-title">Normal Temperature Value Limits</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row margin">
                      <div class="col-sm-6">
                        <p>Range Min</p>
                        <input id="r_temin" onchange="publish_Rtemin()" type="text">
                      </div>
                      <div class="col-sm-6">
                        <p>Range Min</p>
                        <input id="r_temax" onchange="publish_Rtemax()" type="text">
                      </div>
                    </div>
                </div>
                <!-- /.card-body -->
                </div>
               </div>
            </div>
            <!-- /.card -->
          </div>
          <div class="col-4">
            <div class="card card-navy">
              <div class="card-header">
                <h3 class="card-title">Aktuator Condition</h3>
              </div>
              <p> </p>
              <div class="col-12">
                <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title"> Pump </h3>
                </div>
                <p> </p>
                    <div class="col-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title"> Pump Cold </h3>
                            </div>
                        <p> </p>
                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                <label class="btn btn-info" id="Pcold-on">
                                    <input type="radio" name="pump1" onchange="publish_PC(this)" id="PC_on" autocomplete="off"> On
                                </label>
                                <label class="btn btn-info" id="Pcold-off">
                                    <input type="radio" name="pump1" onchange="publish_PC(this)" id="PC_off" autocomplete="off"> Off
                                </label>                                
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card card-danger">
                        <div class="card-header">
                            <h3 class="card-title"> Pump Hot </h3>
                        </div>
                        <p> </p>
                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                <label class="btn btn-info" id="Phot-on">
                                    <input type="radio" name="pump2" onchange="publish_PH(this)" id="PH_on" autocomplete="off"> On
                                </label>
                                <label class="btn btn-info" id="Phot-off">
                                    <input type="radio" name="pump2" onchange="publish_PH(this)" id="PH_off" autocomplete="off"> Off
                                </label>                                
                            </div>
                        </div>
                    </div>
                </div>
              </div>

              <div class="col-12">
                <div class="card card-orange">
                <div class="card-header">
                    <h3 class="card-title">valve</h3>
                </div>
                <p> </p>
                <div class="col-12">
                    <div class="card card-indigo">
                    <div class="card-header">
                        <h3 class="card-title"> Valve Drain </h3>
                    </div>
                    <p> </p>
                         <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                <label class="btn btn-secondary" id="Vdr-on">
                                    <input type="radio" name="valve1" onchange="publish_VD(this)" id="Vd_on" autocomplete="off"> On
                                </label>
                                <label class="btn btn-secondary" id="Vdr-off">
                                    <input type="radio" name="valve1" onchange="publish_VD(this)" id="Vd_off" autocomplete="off"> Off
                                </label>                                
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card card-purple">
                    <div class="card-header">
                        <h3 class="card-title"> Valve Fill </h3>
                    </div>
                    <p> </p>
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                <label class="btn btn-secondary" id="Vfi-on">
                                    <input type="radio" name="valve2" onchange="publish_VF(this)" id="Vf_on" autocomplete="off"> On
                                </label>
                                <label class="btn btn-secondary" id="Vfi-off">
                                    <input type="radio" name="valve2" onchange="publish_VF(this)" id="Vf_off" autocomplete="off"> Off
                                </label>                                
                        </div>
                    </div>
                </div>
                </div>
              </div>
            </div>
            <!-- /.card -->
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="card-primary">
              <div class="card-header">
                <h3 class="card-title">List of Devices</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" style="height: 300px;">
                <table class="table table-head-fixed text-nowrap">
                  <thead>
                    <tr>
                      <th>Serial Number</th>
                      <th>Location</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php while ($row = mysqli_fetch_assoc($result)){?>
                    <tr>
                      <td><?php echo $row['serial_number']?></td>
                      <td><?php echo $row['location'] ?></td>
                      <td id="TH/status/<?php echo $row['serial_number'] ?>">Offline</td>
                    </tr>  
                    <?php } ?>                  
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>

  <script src="https://unpkg.com/mqtt/dist/mqtt.min.js"></script>

  
  <script>
  const clientId = Math.random().toString(16).substr(2, 8);
  const host = 'wss://kualitas-lele.cloud.shiftr.io/:443';
  const options = {
      keepalive: 30,
      clientId: clientId,
      username: "kualitas-lele",
      password: "ao3JP0y3CjEZGK7D",
      protocolId: 'MQTT',
      protocolVersion: 4,
      reconnectPeriod: 1000,
      connectTimeout: 30 * 1000,
    }
    console.log("menghubungkan ke Broker");
    const client = mqtt.connect(host, options);

    client.on("connect", ()=>{
      console.log("Terhubung");
      document.getElementById("status").innerHTML = "Online";
      document.getElementById("status").style.color = "green";  

      client.subscribe("TH/#", {qos: 1});
    });

    client.on("message", function(topic, payload){
      if(topic === "TH/565656/sensor/ph"){
        document.getElementById("ph").innerHTML = payload;
      }else if(topic === "TH/565656/sensor/turbidity"){
        document.getElementById("turbidity").innerHTML = payload;
      }else if(topic === "TH/565656/sensor/temperature"){
        document.getElementById("temperature").innerHTML = payload;
      }else if(topic === "TH/565656/range/phmin"){
        let rphmin = $("#r_phmin").data("ionRangeSlider")
        rphmin.update({
          from: payload.toString()
      })
      }else if(topic === "TH/565656/range/phmax"){
        let rphmax = $("#r_phmax").data("ionRangeSlider")
        rphmax.update({
          from: payload.toString()
      })
      }else if(topic === "TH/565656/range/tumin"){
        let rtumin = $("#r_tumin").data("ionRangeSlider")
        rtumin.update({
          from: payload.toString()
      })
      }else if(topic === "TH/565656/range/tumax"){
        let rtumax = $("#r_tumax").data("ionRangeSlider")
        rtumax.update({
          from: payload.toString()
      })
      }else if(topic === "TH/565656/range/temin"){
        let rtemin = $("#r_temin").data("ionRangeSlider")
        rtemin.update({
          from: payload.toString()
      })
      }else if(topic === "TH/565656/range/temax"){
        let rtemax = $("#r_temax").data("ionRangeSlider")
        rtemax.update({
          from: payload.toString()
      })
      }else if(topic === "TH/565656/actuator/PC"){
        if(payload == "on"){
          document.getElementById("Pcold-on").classList.add("active");
          document.getElementById("Pcold-off").classList.remove("active");
        }else{
          document.getElementById("Pcold-on").classList.remove("active");
          document.getElementById("Pcold-off").classList.add("active");
        }
      }else if(topic === "TH/565656/actuator/PHo"){
        if(payload == "on"){
          document.getElementById("Phot-on").classList.add("active");
          document.getElementById("Phot-off").classList.remove("active");
        }else{
          document.getElementById("Phot-on").classList.remove("active");
          document.getElementById("Phot-off").classList.add("active");
        }
      }else if(topic === "TH/565656/actuator/Vd"){
        if(payload == "on"){
          document.getElementById("Vdr-on").classList.add("active");
          document.getElementById("Vdr-off").classList.remove("active");
        }else{
          document.getElementById("Vdr-on").classList.remove("active");
          document.getElementById("Vdr-off").classList.add("active");
        }
      }else if(topic === "TH/565656/actuator/Vf"){
        if(payload == "on"){
          document.getElementById("Vfi-on").classList.add("active");
          document.getElementById("Vfi-off").classList.remove("active");
        }else{
          document.getElementById("Vfi-on").classList.remove("active");
          document.getElementById("Vfi-off").classList.add("active");
        }
      }

      if(topic.includes("TH/status/")){
          document.getElementById(topic).innerHTML = payload;          
          if(payload === "off"){
            document.getElementById(topic).style.color = "red";
          }else if(payload === "on"){
            document.getElementById(topic).style.color = "green";
          }
      }
    });

    function publish_Rphmin(value){
      data = document.getElementById("r_phmin").value;
      client.publish("TH/565656/range/phmin", data, {qos:1, retain:true});
    }
    function publish_Rphmax(value){
      data = document.getElementById("r_phmax").value;
      client.publish("TH/565656/range/phmax", data, {qos:1, retain:true});
    }
    function publish_Rtumin(value){
      data = document.getElementById("r_tumin").value;
      client.publish("TH/565656/range/tumin", data, {qos:1, retain:true});
    }
    function publish_Rtumax(value){
      data = document.getElementById("r_tumax").value;
      client.publish("TH/565656/range/tumax", data, {qos:1, retain:true});
    }
    function publish_Rtemin(value){
      data = document.getElementById("r_temin").value;
      client.publish("TH/565656/range/temin", data, {qos:1, retain:true});
    }
    function publish_Rtemax(value){
      data = document.getElementById("r_temax").value;
      client.publish("TH/565656/range/temax", data, {qos:1, retain:true});
    }

    function publish_PC(value){
      if(document.getElementById("PC_on").checked){
        data = "on";
      }
      else if(document.getElementById("PC_off").checked){
        data = "off";
      }
      client.publish("TH/565656/actuator/PC", data, {qos:1, retain:true});
    }
    function publish_PH(value){
      if(document.getElementById("PH_on").checked){
        data = "on";
      }
      else if(document.getElementById("PH_off").checked){
        data = "off";
      }
      client.publish("TH/565656/actuator/PHo", data, {qos:1, retain:true});
    }
    function publish_VD(value){
      if(document.getElementById("Vd_on").checked){
        data = "on";
      }
      else if(document.getElementById("Vd_off").checked){
        data = "off";
      }
      client.publish("TH/565656/actuator/Vd", data, {qos:1, retain:true});
    }
    function publish_VF(value){
      if(document.getElementById("Vf_on").checked){
        data = "on";
      }
      else if(document.getElementById("Vf_off").checked){
        data = "off";
      }
      client.publish("TH/565656/actuator/Vf", data, {qos:1, retain:true});
    }
  </script> 