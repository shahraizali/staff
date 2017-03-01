<?php include_once("includes/header.php");
    if (isset($_SESSION['page_name']))
            $_SESSION['page_name'] =  '';
 $_SESSION['page_name'] =  "student";
?>
    
    
    <script type="text/javascript">
   
           function simple(value){
            value = "123"
            
                 $.ajax({
                    type: "POST",
                    url: "includes/getStudentData.php",
                    data: {"simple" : value},
                    success: function(data){
                        $("#student_data").html(data);
                    }
                 
                 });
            }

    function selectdep(value){
       console.log( $("#sec").innerHTML );
        $("#sec").innerHTML =  "<option>Selects Section</option>";
        console.log($("#sec").innerHTML );
            console.log( value +" ayi hai");
                 $.ajax({
                    type: "POST",
                    url: "includes/getStudentData.php",
                    data: {"dep" : value},
                    success: function(data){
                        $("#student_data").html(data);
                    }
                 
                 });
            }



             function sem_dep(value){
                 $.ajax({
                    type: "POST",
                    url: "includes/getStudentData.php",
                    data: {"dep_sem" : value},
                    success: function(data){
                        $("#sem").html(data);
                    }
                 
                 });
            } 

             function deg_section(deg){
        console.log("from deg_selection deg "+ deg); 

                 $.ajax({
                    type: "POST",
                    url: "includes/getStudentData.php",
                   data: {  "deg_for_section": deg },
                    success: function(data){
                        $("#sec").html(data);
                    }
                 
                 });
            } 

               function deg_selected(sem , dep ){
                console.log("sem: "+ sem +" dep: "+ dep.value);
                 $.ajax({
                    type: "POST",
                    url: "includes/getStudentData.php",
                    data: { "deg_sel": sem , "dep_sel": dep.value },
                    success: function(data){
                        $("#student_data").html(data);
                    }
                 
                 });
            }


            function sec_selected(sec , sem , dep ){
                console.log("sec: "+ sec +"sem: "+ sem.value +" dep: "+ dep.value);
                 $.ajax({
                    type: "POST",
                    url: "includes/getStudentData.php",
                    data: { "secc_sel": sec ,"degg_sel": sem.value , "depp_sel": dep.value },
                    success: function(data){
                        $("#student_data").html(data);
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
                            Students Page
                            <small>Subheading</small>
                        </h1>
    
<ul class="breadcrumb">
    <li>
       Filters
    </li>
    <li>
             Departments:
       <select  class="form-control xl3" name="dep" id="dep" onchange ="selectdep(this.value), sem_dep(this.value)"  >
           <option>Select Department</option>
              <?php $q  ="select * from departments";
                $result = mysql_query($q);
               
                while( $row =  mysql_fetch_assoc($result) ){
                    echo "<option>".$row['name']."</option>";
                }
               ?>
       </select>
    </li>   
    <li>
    Degrees:
      <select class="form-control" name="sem"  id="sem"  onchange ="deg_selected( this.value , document.getElementById('dep') ) , deg_section(this.value ) " >
             <option>Select Semester</option>
     </select>
    </li>
    <li>
        Sections:
      <select class="form-control"  name="sec"  id="sec" onchange ="sec_selected( this.value  , document.getElementById('sem'), document.getElementById('dep'))"  >
             <option>Select Section</option>
     </select>
    </li>
    <li>
       <input type="button"  class="btn btn-default" name="filter" onclick="simple()" value="Clear Filter">
    </li>
</ul>
 <table class="table table-striped" >
        <thead>
            <th>Name</th>
            <th>Email</th>
            <th>Password</th>
            <th>Session</th>
            <th>Sec</th>
            <th>Department</th>
            <th>Degree</th>
            <th>verified</th>
        </thead>

        <tbody id ="student_data">
            <?php
                            $q  ="select * from students";
                $result = mysql_query($q);
               
                while( $row =  mysql_fetch_assoc($result) ){
                       echo"<tr>
                                <td>".$row['std_name']."</td>
                                <td>".$row['email']."</td>
                                <td>".$row['pass']."</td>
                                <td>".getSessName($row['sess_id'])[0]."</td>
                                <td>".getSectionName($row['sec_no'])[0]."</td>
                                <td>".getDepName($row['dep_id'])[0]."</td>
                                <td>".getDegName($row['deg_id'])[0]."</td>
                                <td>".$row['checked']."</td>
                             </tr>   
                            ";
                    
                }
                

            ?>
            
            
        </tbody>
</table>
     </div>
        </div>
       </div>

       </div>

   <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
