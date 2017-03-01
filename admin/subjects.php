<?php include_once("includes/header.php");
    if (isset($_SESSION['page_name']))
            $_SESSION['page_name'] =  '';
 $_SESSION['page_name'] =  "form";
?>
<script type="text/javascript">
       function edit_subs( id ){
            console.log("id given is "+ id);
            $.ajax({
              type: "POST",
              url: "includes/getDashboardData.php",
              data: { "sub_id": id , "sub_edit": "true"},
              success: function(data){
                  $("#sub_modal_data").html(data);
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
                            Subjects Page
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
  
  
    <div class="col-md-12">
    <h1  data-toggle="collapse" data-target="#dep_table"  class="well"  >Subjects</h1> 
    

    <div class="collapse in" id="dep_table"  >
       

        <table class="table table-striped"  > 
            <thead>
                <th>Code</th>
                <th>Name</th>
                <th>Department</th>
                <th>Add / Delete</th>
                   <th>Edit</th>
            </thead>
            <tbody >
                <div id="depp">
                <?php
                     if(isset($_POST["add_sub"])){
                          addSubject($_POST["code_of_sub"],$_POST["name_of_sub"], $_POST['dep_selected']);
                     }
                     if(isset($_POST["del_subb"])){
                          delSubject($_POST["del_subb"]);
                     }
                     if(isset($_POST['update_sub'])){
                        updateSubject($_POST['update_sub'] ,$_POST["sub_code"],$_POST["sub_name"], $_POST['dep_selected']);
                     }
                      echo getSubjects();
                 
                ?></div>
                <tr>
                <form method="POST" >
                  

                    <td>
                      <input name="code_of_sub" type="text"  class="form-control" placeholder="Subject Code"/>
                    </td>
                    <td>
                      <input name="name_of_sub" type="text"  class="form-control" placeholder="Subject Name"/>
                    </td>

                    <td><select name="dep_selected" class="form-control">
                            <?php
                             $q =  "select * from departments";
                             $r = mysql_query($q);
                             while( $row = mysql_fetch_assoc($r)){
                                echo "<option value='".$row['id']."'>".$row['name']."</option>";
                             }
                        ?>
                        </select></td>
                    <td>
                      <button class='btn btn-success' type="submit" name="add_sub" type="submit"  style="width:70px" > Add </button> 
                    </td>
                     </form>
                </tr>

            </tbody>
        </table>
    </div>

      <div class="modal fade" id="sub_edit_modal" role="dialog">
                <div class="modal-dialog">

                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Editor</h4>
                    </div>
                      <div class="modal-body" >
                           <form method="post"  id="sub_modal_data">
                              
                           </form>
                         
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
