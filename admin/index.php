 
<?php include_once("includes/header.php");
                include_once("../helper.php");
            include_once("../connection.php");
            if(isset($_SESSION['page_name']))
                 unset($_SESSION['page_name']);
            $_SESSION['page_name']='dashboard';
    ?>

 <script type="text/javascript">
  function gg(){
    console.log("gfhgh");
  }
        function edit_staff( id ){
          console.log("id ayi hai : "+ id);
           $("#staff_modal_data").html("ygjgjgjhghjgh");
           $.ajax({
              type: "POST",
              url: "includes/getDashboardData.php",
              data: { "staff_id": id , "staff_edit": "true"},
              success: function(data){
                $("#staff_modal_data").html(data);
              }
              

           });

        }

        function edit_department(id){
            $.ajax({
              type: "POST",
              url: "includes/getDashboardData.php",
              data: { "dep_id": id , "dep_edit": "true"},
              success: function(data){
                $("#dep_modal_data").html(data);
              }
             });

        }

        function edit_degree(id ){
          $.ajax({
              type: "POST",
              url: "includes/getDashboardData.php",
              data: { "deg_id": id , "deg_edit": "true"},
              success: function(data){
                    $("#deg_modal_data").html(data);
              }

          });
        }

        function edit_sessions( id ){
            $.ajax({
              type: "POST",
              url: "includes/getDashboardData.php",
              data: { "sess_id": id , "sess_edit": "true"},
              success: function(data){
                  $("#sess_modal_data").html(data);
              }

            });
        }

    </script>

<body>

    <div id="wrapper">

        <!-- Navigation -->
            <?php  include_once("includes/nav.php"); ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12" id="right_place">

<h1 class="page-header">
    Simple Dashboard
    <small>Subheading</small>
</h1>
<ol class="breadcrumb">
    <li>
        <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
    </li>
    <li class="active">
        <i class="fa fa-file"></i> Blank Page
    </li>
</ol>


<div class="row"  >

  <!--departments section-->
    <div class="col-md-6">
    <h1  data-toggle="collapse" data-target="#dep_table" class="well">Departments</h1> 
    

    <div class="collapse" id="dep_table">
       

        <table class="table table-striped"  > 
            <thead>
                <th>Name</th>
                <th>Add / Delete</th>
                   <th>Edit</th>
            </thead>
            <tbody>
                <?php

                $q =  "select * from departments";
                $r = mysql_query($q);
                while( $row = mysql_fetch_assoc($r)){
                    echo "<tr>
                    <td>".$row['name']."</td>
                     <td><button class='btn btn-danger' name='".$row['id']."'>Delete</button></td>
                       <td><button class='btn btn-default' onclick='edit_department(this.name)' name='".$row['id']."' data-toggle='modal' data-target='#department_edit_modal'>Edit</button></td>
                    </tr>";
                }
                
                ?>
                <tr>
                    <td><input type="text" class="form-control" placeholder="Name"/></td>
                    <td><button class='btn btn-success' type="submit"  style="width:70px" > Add </button></td>
                </tr>

            </tbody>
        </table>
    </div>
       <div class="modal fade" id="department_edit_modal" role="dialog">
                <div class="modal-dialog">

                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Editor</h4>
                    </div>
                      <div class="modal-body" id="dep_modal_data">
                          
                         
                      </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                  </div>

                </div>
              </div>
    </div>

    <!--degrees section-->
    <div class="col-md-6" >
         <h1  data-toggle="collapse" data-target="#deg_table" class="well">Degrees</h1> 
        <div class="collapse" id="deg_table">
            <table class="table table-striped"  > 
            <thead>
                <th>Name</th>
                <th>Department</th>
                <th>Add / Delete</th>
                <th>Edit</th>
            </thead>
            <tbody>
                <?php

                $q =  "select * from degrees";
                $r = mysql_query($q);
                while( $row = mysql_fetch_assoc($r)){
                    echo "<tr>
                    <td>".$row['name']."</td>
                    <td>".getDepName($row['dep_id'])[0]."</td>
                    <td><button class='btn btn-danger' name='".$row['id']."'>Delete</button></td>
                    <td><button class='btn btn-default' onclick='edit_degree(this.name)' name='".$row['id']."' data-toggle='modal' data-target='#degree_edit_modal'>Edit</button></td>
                    </tr>";
                }
                
                ?>
                <tr>
                    <td><input type="text" class="form-control" placeholder="Degree Name"/></td>
                    <td><select name="deg_selected" class="form-control">
                            <?php
                             $q =  "select * from departments";
                             $r = mysql_query($q);
                             while( $row = mysql_fetch_assoc($r)){
                                echo "<option value='".$row['id']."'>".$row['name']."</option>";
                             }
                        ?>
                        </select></td>
                    <td><button class='btn btn-success' type="submit"  style="width:70px" > Add </button></td>
                </tr>

            </tbody>
        </table>
     </div>

      <div class="modal fade" id="degree_edit_modal" role="dialog">
                <div class="modal-dialog">

                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Editor</h4>
                    </div>
                      <div class="modal-body" id="deg_modal_data">
                          
                         
                      </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                  </div>

                </div>
              </div>


    </div>


    <!--Sessions Section-->
     <div class="col-md-6" >
         <h1  data-toggle="collapse" data-target="#sess_table" class="well">Sessions</h1> 
        <div class="collapse" id="sess_table">
            <table class="table table-striped"  > 
            <thead>
                <th>Name</th>
                <th>Start</th>
                <th>End</th>
                <th>Degree</th>
                <th>Add / Delete</th>
                <th>Edit</th>
            </thead>
            <tbody>
                <?php

                $q =  "select * from sessions";
                $r = mysql_query($q);
                while( $row = mysql_fetch_assoc($r)){
                    echo "<tr>
                    <td>".$row['name']."</td>
                    <td>".$row['start']."</td>
                    <td>".$row['end']."</td>
                    <td>".getDegName($row['deg_id'])[0]."</td>
                    <td><button class='btn btn-danger' name='".$row['id']."'>Delete</button></td>
                    <td><button class='btn btn-default' onclick='edit_sessions(this.name)' name='".$row['id']."' data-toggle='modal' data-target='#sess_edit_modal'>Edit</button></td>

                    </tr>";
                }
                
                ?>
                <tr>
                    <td><input type="text" class="form-control" placeholder="Degree Name"/></td>
                    <td><input type="number" pattern="[2][0][1-9][0-9]" title="Enter correct year" class="form-control" placeholder="start date"/></td>
                    <td><input type="number"  pattern="[2][0][1-9][0-9]" title="Enter correct year" class="form-control" placeholder="ending date"/></td>
                    <td><select name="deg_selected" class="form-control">
                            <?php
                             $q =  "select * from degrees";
                             $r = mysql_query($q);
                             while( $row = mysql_fetch_assoc($r)){
                                echo "<option value='".$row['id']."'>".$row['name']."</option>";
                             }
                        ?>
                        </select></td>
                    <td><button class='btn btn-success' type="submit"  style="width:70px" > Add </button></td>
                </tr>

            </tbody>
        </table>
        </div>


          <div class="modal fade" id="sess_edit_modal" role="dialog">
                <div class="modal-dialog">

                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Editor</h4>
                    </div>
                      <div class="modal-body" id="sess_modal_data">
                          
                         
                      </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                  </div>

                </div>
              </div>
  

    </div>


      <!--Staff section -->
     <div class="col-md-6" >
         <h1  data-toggle="collapse" data-target="#staff_table" class="well">Staff</h1> 
        <div class="collapse" id="staff_table">
        <table class="table table-striped"  > 
            <thead>
                <th>Name</th>
                <th>department</th>
                <th>Add / Delete</th>
                <th>Edit</th>
            </thead>
            <tbody>
                <?php

                $q =  "select * from staff";
                $r = mysql_query($q);
                while( $row = mysql_fetch_assoc($r)){
                  echo "<tr>

                            <td>".$row['name']."</td>
                            <td>".getDepName($row['dep_id'])[0]."</td>
                            <td><button class='btn btn-danger' name='".$row['id']."'>Delete</button></td>
                            <td><button class='btn btn-default'  name='".$row['id']."'  data-toggle='modal' data-target='#staff_edit_modal'  onclick =\"edit_staff(this.name)\">Edit</button></td>
                       </tr>";
                }
                
                ?>
                <tr>
                  <form method="post">
                    <td><input type="text" class="form-control" name="staff_name" placeholder=" Name"/></td>
                    <td><select name="dep_selected" class="form-control">
                            <?php
                             $q =  "select * from departments";
                             $r = mysql_query($q);
                             while( $row = mysql_fetch_assoc($r)){
                                echo "<option value='".$row['id']."'>".$row['name']."</option>";
                             }
                        ?>
                        </select></td>
                    <td><button class='btn btn-success' type="submit" name="add_staff" style="width:70px" > Add </button></td>
                    </form>
                </tr>

            </tbody>
        </table>
            
             <div class="modal fade" id="staff_edit_modal" role="dialog">
                <div class="modal-dialog">

                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Editor</h4>
                    </div>
                      <div class="modal-body" id="staff_modal_data">
                          
                         
                      </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                  </div>

                </div>
              </div>
  
            
        </div>
    </div>

      <!--Sections and subjects -->

      <div class="col-md-6">
        <h1 class="well" data-toggle="collapse" data-target="#sem_sec">Semester sections</h1>
        <div>
          
        </div>

      </div>






</div>


 </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

   



</body>

</html>
