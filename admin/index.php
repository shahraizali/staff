<!--
      
      Admin pannel Index

-->

  
<?php include_once("includes/header.php");
                include_once("../helper.php");
            include_once("../connection.php");
            if(isset($_SESSION['page_name']))
                 unset($_SESSION['page_name']);
            $_SESSION['page_name']='dashboard';
    ?>

 <script type="text/javascript">

        function edit_staff( id ){
          console.log("id ayi hai : "+ id);
           
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
      function edit_section( id ){
            $.ajax({
              type: "POST",
              url: "includes/getDashboardData.php",
              data: { "sec_id": id , "sec_edit": "true"},
              success: function(data){
                  $("#section_modal_data").html(data);
              }

            });
        }
        function edit_section_sub( id ){
            console.log("id given is "+ id);
            $.ajax({
              type: "POST",
              url: "includes/getDashboardData.php",
              data: { "sec_sub_id": id , "sec_sub_edit": "true"},
              success: function(data){
                  $("#section_sub_modal_data").html(data);
              }

            });
        }
      function get_session_for_section( id ){
          console.log("getting session for deg_id : "+ id);
           
           $.ajax({
              type: "POST",
              url: "includes/getDashboardData.php",
              data: { "deg_id": id , "get_sess_for_sec": "true"},
              success: function(data){
                $("#sess_for_sec").html(data);
              }
              

           });

        }
        function get_session_for_section_edit( id , sem_id ){
          console.log("getting session for deg_id : "+ id);
           
           $.ajax({
              type: "POST",
              url: "includes/getDashboardData.php",
              data: { "deg_id": id , "sem_id": sem_id  ,"get_sess_for_sec_edit": "true"},
              success: function(data){
                $("#sesss_for_sec").html(data);
              }
              

           });

        }


        function getSub_dep( sem_sec_id ){
          console.log("getting subjects for sem_sec_id : "+ sem_sec_id);
           
           $.ajax({
              type: "POST",
              url: "includes/getDashboardData.php",
              data: { "sem_sec_id": sem_sec_id   ,"get_sub_for_sem_sec_id": "true"},
              success: function(data){
                $("#subjects_landing").html(data);
              }
              

           });

        }

        function getSaff_dep( sem_sec_id ){
          console.log("getting staffs for sem_sec_id : "+ sem_sec_id);
           
           $.ajax({
              type: "POST",
              url: "includes/getDashboardData.php",
              data: { "sem_sec_id": sem_sec_id  ,"get_staff_for_sem_sec_id": "true"},
              success: function(data){
                $("#staff_landing").html(data);
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

				  <!--/***
				 *      _____                             _                            _   
				 *     |  __ \                           | |                          | |  
				 *     | |  | |  ___  _ __    __ _  _ __ | |_  _ __ ___    ___  _ __  | |_ 
				 *     | |  | | / _ \| '_ \  / _` || '__|| __|| '_ ` _ \  / _ \| '_ \ | __|
				 *     | |__| ||  __/| |_) || (_| || |   | |_ | | | | | ||  __/| | | || |_ 
				 *     |_____/  \___|| .__/  \__,_||_|    \__||_| |_| |_| \___||_| |_| \__|
				 *                   | |                                                   
				 *                   |_|                                                   
				 */-->
  
  
    <div class="col-md-6">
    <h1  data-toggle="collapse" data-target="#dep_table"  class="well"  >Departments</h1> 
    

    <div class="collapse" id="dep_table"  >
       

        <table class="table table-striped"  > 
            <thead>
                <th>Name</th>
                <th>Add / Delete</th>
                   <th>Edit</th>
            </thead>
            <tbody >
                <div id="depp">
                <?php
                     if(isset($_POST["add_dep"])){
                          addDepartment($_POST["name_of_dep"]);
                     }
                     if(isset($_POST["del_dep"])){
                          delDepartment($_POST["del_dep"]);
                     }
                     if(isset($_POST['update_dep'])){
                        updateDepartment($_POST['name_of_dep'] , $_POST['update_dep']);
                     }
                      echo getDepartments();
                 
                ?></div>
                <tr>
                <form method="POST" >
                  
                    <td>
                      <input name="name_of_dep" type="text"  class="form-control" placeholder="Name"/>
                    </td>
                    <td>
                      <button class='btn btn-success' type="submit" name="add_dep" type="submit"  style="width:70px" > Add </button> 
                    </td>
                     </form>
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
                      <div class="modal-body" >
                           <form method="post"  id="dep_modal_data">
                              
                           </form>
                         
                      </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                  </div>

                </div>
              </div>
      
    </div>

					<!--/***
				 *      _____                                
				 *     |  __ \                               
				 *     | |  | |  ___   __ _  _ __  ___   ___ 
				 *     | |  | | / _ \ / _` || '__|/ _ \ / _ \
				 *     | |__| ||  __/| (_| || |  |  __/|  __/
				 *     |_____/  \___| \__, ||_|   \___| \___|
				 *                     __/ |                 
				 *                    |___/                  
				 */-->
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
              <div id="degg">
              <?php
                     if(isset($_POST["add_deg"])){
                             addDegree($_POST["deg_name"] , $_POST['deg_selected'] );
                     }
                     if(isset($_POST["del_deg"])){
                          delDegree($_POST["del_deg"]);
                     }
                     if(isset($_POST['update_deg'])){
                        updateDegree($_POST['update_deg'] ,$_POST['deg_name'] , $_POST['deg_selected']);
                     }
                      
                 
                ?>
                </div>
           <?php

                $q =  "select * from degrees";
                $r = mysql_query($q);
                while( $row = mysql_fetch_assoc($r)){
                    echo "<tr>
                    <td>".$row['name']."</td>
                    <td>".getDepName($row['dep_id'])[0]."</td>
                    <td> <form method='post'><button class='btn btn-danger' name='del_deg' value='".$row['id']."'>Delete</button> </form></td>
                    <td><button class='btn btn-default' onclick='edit_degree(this.name)' name='".$row['id']."' data-toggle='modal' data-target='#degree_edit_modal'>Edit</button></td>
                    </tr>";
                }
                
                ?>
                <tr>
                <form method="post" >
                    <td><input type="text" name="deg_name" class="form-control" placeholder="Degree Name"/></td>
                    <td><select name="deg_selected" class="form-control">
                            <?php
                             $q =  "select * from departments";
                             $r = mysql_query($q);
                             while( $row = mysql_fetch_assoc($r)){
                                echo "<option value='".$row['id']."'>".$row['name']."</option>";
                             }
                        ?>
                        </select></td>
                    <td><button class='btn btn-success' name="add_deg" type="submit"  style="width:70px" > Add </button></td>
                </form>
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


				<!--/***
			 *       _____                  _               
			 *      / ____|                (_)              
			 *     | (___    ___  ___  ___  _   ___   _ __  
			 *      \___ \  / _ \/ __|/ __|| | / _ \ | '_ \ 
			 *      ____) ||  __/\__ \\__ \| || (_) || | | |
			 *     |_____/  \___||___/|___/|_| \___/ |_| |_|
			 *                                              
			 *                                              
			 */-->
     <div class="col-md-12" >
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
                <div id="sess">
              <?php
                     if(isset($_POST["add_sess"])){
                          addSession($_POST["sess_name"] ,$_POST["sess_start"], $_POST["sess_end"], $_POST['deg_selected'] );
                     }
                     if(isset($_POST["del_sess"])){
                          delSession($_POST["del_sess"]);
                     }
                     if(isset($_POST['update_sess'])){
                         
                        updateSession( $_POST['update_sess'] , $_POST["sess_name"] ,$_POST["sess_start"], $_POST["sess_end"], $_POST['deg_selected']);
                     }
                      
                 
                ?>
                </div>
                <?php

                $q =  "select * from sessions";
                $r = mysql_query($q);
                while( $row = mysql_fetch_assoc($r)){
                    echo "<tr>
                    <td>".$row['name']."</td>
                    <td>".$row['start']."</td>
                    <td>".$row['end']."</td>
                    <td>".getDegName($row['deg_id'])[0]."</td>
                    <td><form method='post'><button class='btn btn-danger' name='del_sess' value='".$row['id']."'>Delete</button></form></td>
                    <td><button class='btn btn-default' onclick='edit_sessions(this.name)' name='".$row['id']."' data-toggle='modal' data-target='#sess_edit_modal'>Edit</button></td>

                    </tr>";
                }
                
                ?>
                <tr>
                   <form method="post">
                          <td><input type="text" name="sess_name" class="form-control" placeholder="Session Name"/></td>
                          <td><input type="number" name="sess_start" pattern="[2][0][1-9][0-9]" title="Enter correct year" class="form-control" placeholder="start date"/></td>
                          <td><input type="number" name="sess_end" pattern="[2][0][1-9][0-9]" title="Enter correct year" class="form-control" placeholder="ending date"/></td>
                          <td><select name="deg_selected" class="form-control">
                                  <?php
                                   $q =  "select * from degrees";
                                   $r = mysql_query($q);
                                   while( $row = mysql_fetch_assoc($r)){
                                      echo "<option value='".$row['id']."'>".$row['name']."</option>";
                                   }
                              ?>
                              </select></td>
                          <td><button class='btn btn-success' name="add_sess" type="submit"  style="width:70px" > Add </button></td>
                   </form>
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


				  <!--/***
			 *       _____  _           __   __ 
			 *      / ____|| |         / _| / _|
			 *     | (___  | |_  __ _ | |_ | |_ 
			 *      \___ \ | __|/ _` ||  _||  _|
			 *      ____) || |_| (_| || |  | |  
			 *     |_____/  \__|\__,_||_|  |_|  
			 *                                  
			 *                                  
			 */-->
     <div class="col-md-5" >
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
                <div id="staff">
              <?php
                     if(isset($_POST["add_staff"])){
                          addStaff($_POST["staff_name"] ,$_POST["dep_selected"]);
                     }
                     if(isset($_POST["del_staff"])){
                          delStaff($_POST["del_staff"]);
                     }
                     if(isset($_POST['update_staff'])){
                         
                        updateStaff($_POST['update_staff'] , $_POST["staff_name"] ,$_POST["dep_selected"]);
                     }
                      
                 
                ?>
                </div>
                <?php

                $q =  "select * from staff";
                $r = mysql_query($q);
                while( $row = mysql_fetch_assoc($r)){
                  echo "<tr>

                            <td>".$row['name']."</td>
                            <td>".getDepName($row['dep_id'])[0]."</td>
                            <td><form method='post'><button class='btn btn-danger' name='del_staff' value='".$row['id']."'>Delete</button></form></td>
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
        </div>

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

      
  
				<!--// _____              _    _               
				//    / ____|            | |  (_)              
				//   | (___    ___   ___ | |_  _   ___   _ __  
				//    \___ \  / _ \ / __|| __|| | / _ \ | '_ \ 
				//    ____) ||  __/| (__ | |_ | || (_) || | | |
				//   |_____/  \___| \___| \__||_| \___/ |_| |_|
				//                                             
				//                                                                                         -->
     <div class="col-md-7" >
         <h1  data-toggle="collapse" data-target="#section_table" class="well">Sections</h1> 
        <div class="collapse" id="section_table">
        <table class="table table-striped"  > 
            <thead>
                
                <th>Section </th>
                <th>Degree</th>
                <th>Session</th>
                <th>Add / Delete</th>
                <th>Edit</th>
            </thead>
            <tbody>
                <div id="section">
              <?php
                     if(isset($_POST["add_section"])){
                          addSection($_POST["sec_selected"] ,$_POST["deg_selected"], $_POST["sess_selected"]);
                     }
                     if(isset($_POST["del_section"])){
                          delSection($_POST["del_section"]);
                     }
                     if(isset($_POST['update_section'])){
                         
                        updateSection($_POST['update_section'] ,$_POST["sec_selected"] ,$_POST["deg_selected"], $_POST["sess_selected"]);
                     }
                      
                 
                ?>
                </div>
                <?php

                $q =  "select * from sem_sec";
                $r = mysql_query($q);
                while( $row = mysql_fetch_assoc($r)){
                  echo "<tr>

                        
                            <td>".getSectionName($row['sec_id'])[0]."</td>
                            <td>".getDegName($row['deg_id'])[0]."</td>
                            <td>".getSessName($row['sem_id'])[0]."</td>
                           
                            
                            <td><form method='post'><button class='btn btn-danger' name='del_section' value='".$row['id']."'>Delete</button></form></td>
                            <td><button class='btn btn-default'  name='".$row['id']."'  data-toggle='modal' data-target='#section_edit_modal'  onclick =\"edit_section(this.name)\">Edit</button></td>
                       </tr>";
                }
                
                ?>
                <tr>
                  <form method="post">
                      <td><select name="sec_selected" class="form-control">
                            <?php
                             $q =  "select * from sections";
                             $r = mysql_query($q);
                             while( $row = mysql_fetch_assoc($r)){
                                echo "<option value='".$row['id']."'>".$row['name']."</option>";
                             }
                        ?>
                        </select></td>
                      <td><select name="deg_selected" class="form-control" onchange= "get_session_for_section(this.value)">
                            <?php
                             $q =  "select * from degrees";
                             $r = mysql_query($q);
                               echo "<option value='0'>None</option>";
                             while( $row = mysql_fetch_assoc($r)){
                                echo "<option value='".$row['id']."'>".$row['name']."</option>";
                             }
                        ?>
                        </select></td>
                        <td > <select name="sess_selected" class="form-control" id="sess_for_sec" ></select> </td>
                    <td><button class='btn btn-success' type="submit" name="add_section" style="width:70px" > Add </button></td>
                    </form>
                </tr>

            </tbody>
        </table>
        </div>

          <div class="modal fade" id="section_edit_modal" role="dialog">
                <div class="modal-dialog">

                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Editor</h4>
                    </div>
                      <div class="modal-body" id="section_modal_data">
                          
                         
                      </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                  </div>

                </div>
              </div>
    </div>    
    
    
    
    

		  <!--/***
		/***
		 *                       _    _                                 _      _              _        
		 *                      | |  (_)                               | |    (_)            | |       
		 *      ___   ___   ___ | |_  _   ___   _ __        ___  _   _ | |__   _   ___   ___ | |_  ___ 
		 *     / __| / _ \ / __|| __|| | / _ \ | '_ \      / __|| | | || '_ \ | | / _ \ / __|| __|/ __|
		 *     \__ \|  __/| (__ | |_ | || (_) || | | |     \__ \| |_| || |_) || ||  __/| (__ | |_ \__ \
		 *     |___/ \___| \___| \__||_| \___/ |_| |_|     |___/ \__,_||_.__/ | | \___| \___| \__||___/
		 *                                                                   _/ |                      
		 *                                                                  |__/                       
		 */
		 */ -->
     <div class="col-md-12" >
         <h1  data-toggle="collapse" data-target="#section_sub_table" class="well">Selecting Subjects For Sections</h1> 
        <div class="collapse" id="section_sub_table">
        <table class="table table-striped"  > 
            <thead>
                
                <th>Degree,Session,Section</th>
                <th>Subjects</th>
                   
                <th>Edit</th>
            </thead>
            <tbody>
                <div id="section_subjects">
              <?php
                     if(isset($_POST["add_section_subject"])){
                          addSectionSubject($_POST["deg_sec_sem_selected"] ,$_POST["sub_selected"], $_POST["staff_selected"]);
                     }
                     if(isset($_POST["del_sub"])){
                          delSubject_sec($_POST["del_sub"]);
                     }
                     if(isset($_POST['update_subs'])){
                         
                        updateSubject_sec( $_POST['update_subs'],$_POST["selected_subs"], $_POST["selected_staff"]);
                     }
                      
                 
                ?>
                </div>
                <?php

                $q =  "select * from sec_subs";
                $r = mysql_query($q);
                          $q3 =  "select * from sem_sec";
                    $q2  =  mysql_query($q3);
                while( $row2 =  mysql_fetch_array($q2)  ){
              $row = mysql_fetch_assoc($r)   ;
                   
                  echo "<tr>

                            <td>".strtoupper(getDegName($row2['deg_id'])[0])." ,
                            ".strtoupper(getSessName($row2['sem_id'])[0])." ,
                            ".getSectionName($row2['sec_id'])[0]."</td>";
                            $q_new  =  'Select * from sec_subs where sem_sec_id  = \''.$row2['id'].'\'; ';
                   // echo $q_new;
                            $qr =    mysql_query($q_new);
                                    $rowg = mysql_fetch_assoc($qr);
                             echo "<td> <span data-toggle='tooltip' title='".strtoupper(getStaffName($rowg['staff_id'])[0])."'>".strtoupper(getSubName($rowg['sub_id'])['code'])." <span>, ";
                            while($rowg = mysql_fetch_assoc($qr)){
                                 echo  "<span data-toggle='tooltip' title='".strtoupper(getStaffName($rowg['staff_id'])[0])."'>".(getSubName($rowg['sub_id'])['code'])."</span>, ";
                            }
                            echo "</td>
                            <td><button class='btn btn-default'  name='".$row2['id']."'  data-toggle='modal' data-target='#section_sub_modal'  onclick =\"edit_section_sub(this.name)\">Edit</button></td>
                       </tr>";
                }
                
                ?>
                <tr>
                  <form method="post">
                  <td><select name="deg_sec_sem_selected" class="form-control" onchange="getSub_dep(this.value)  , getSaff_dep(this.value)">
                            <?php
                                          $q3 =  "select * from sem_sec";
                                $q2  =  mysql_query($q3);
                            while( $row2 =  mysql_fetch_array($q2)  ){
                            echo "<option value='".$row2['id']."' >".strtoupper(getDegName($row2['deg_id'])[0])." ,
                                ".strtoupper(getSessName($row2['sem_id'])[0])." ,
                                ".getSectionName($row2['sec_id'])[0]."</option>";
                            }
                        ?>
                        </select></td>
                      <td><select name="sub_selected" class="form-control" id="subjects_landing">
                            <?php
                             $q =  "select * from all_subs";
                             $r = mysql_query($q);
                             while( $row = mysql_fetch_assoc($r)){
                                echo "<option value='".$row['id']."'>".strtoupper($row['code'])." =>  ".strtoupper($row['Name'])."</option>";
                             }
                        ?>
                        </select></td>
                        <td > <select name="staff_selected" class="form-control"  id="staff_landing" >
                               <?php
                             $q =  "select * from staff";
                             $r = mysql_query($q);
                             while( $row = mysql_fetch_assoc($r)){
                                echo "<option value='".$row['id']."' data-toggle='tooltip' title='  ".getDepName($row['dep_id'])[0]." ' >".$row['name']." </option>";
                             }
                        ?>
                            
                            </select> </td>
                    <td><button class='btn btn-success' type="submit" name="add_section_subject" style="width:70px" > Add </button></td>
                    </form>
                </tr>

            </tbody>
        </table>
        </div>

          <div class="modal fade" id="section_sub_modal" role="dialog">
                <div class="modal-dialog">

                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Editor</h4>
                    </div>
                      <div class="modal-body" id="section_sub_modal_data">
                          
                         
                      </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                  </div>

                </div>
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
