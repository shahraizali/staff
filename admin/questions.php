<?php include_once("includes/header.php");
    if (isset($_SESSION['page_name']))
            $_SESSION['page_name'] =  '';
 $_SESSION['page_name'] =  "question";
?>
<script type="text/javascript">
       function edit_question( id ){
            console.log("id given is "+ id);
            $.ajax({
              type: "POST",
              url: "includes/getDashboardData.php",
              data: { "question_id": id , "question_edit": "true"},
              success: function(data){
                  $("#question_modal_data").html(data);
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
                            Questions Page
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

                                <div class="col-md-12">
                                    <h1  data-toggle="collapse" data-target="#dep_table"  class="well"  >Questions</h1> 
                                    

                                    <div class="collapse in" id="dep_table"  >
                                       

                                        <table class="table table-striped"  > 
                                            <thead>
                                                <th>Title</th>
                                                <th>Option 1</th>
                                                <th>Option 2</th>
                                                <th>Option 3</th>
                                                <th>Option 4</th>
                                                <th>Add / Delete</th>
                                                <th>Edit</th>
                                            </thead>
                                            <tbody >
                                                <div id="depp">
                                                <?php
                                                     if(isset($_POST["add_question"])){
                                                          addQuestion($_POST["Title"], $_POST["opt1"] ,$_POST["opt2"] , $_POST["opt3"] , $_POST["opt4"] );
                                                     }
                                                     if(isset($_POST["del_question"])){
                                                          delQuestion($_POST["del_question"]);
                                                     }
                                                     if(isset($_POST['update_question'])){
                                                        updateQuestion($_POST['update_question'] ,$_POST["Title"], $_POST["opt1"] ,$_POST["opt2"] , $_POST["opt3"] , $_POST["opt4"] );
                                                     }
                                                      echo getQuestions();
                                                 
                                                ?></div>
                                                <tr>
                                                <form method="POST" >
                                                  

                                                    <td>
                                                      <input name="Title" type="text"  class="form-control" placeholder="Title for Question"/>
                                                    </td>
                                                    <td>
                                                      <input name="opt1" type="text"  class="form-control" placeholder="Option 1"/>
                                                    </td>
                                                    <td>
                                                      <input name="opt2" type="text"  class="form-control" placeholder="Option 2"/>
                                                    </td>
                                                    <td>
                                                      <input name="opt3" type="text"  class="form-control" placeholder="Option 3"/>
                                                    </td>
                                                    <td>
                                                      <input name="opt4" type="text"  class="form-control" placeholder="Option 4"/>
                                                    </td>
                                                    <td>
                                                      <button class='btn btn-success' type="submit" name="add_question" type="submit"  style="width:70px" > Add </button> 
                                                    </td>
                                                     </form>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>

                                      <div class="modal fade" id="question_edit_modal" role="dialog">
                                                <div class="modal-dialog modal-lg">

                                                  <!-- Modal content-->
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                      <h4 class="modal-title">Editor</h4>
                                                    </div>
                                                      <div class="modal-body" >
                                                           <form method="post"  id="question_modal_data">
                                                              
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
