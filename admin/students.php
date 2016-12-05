 <?php
            include_once("../helper.php");
            include_once("../connection.php");
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

             function sem_section(sem , dep ){
        console.log("from sec_selection sem: "+ sem +" dep: "+ dep.value); 

                 $.ajax({
                    type: "POST",
                    url: "includes/getStudentData.php",
                   data: { "sem_for_section": sem , "dep_for_section": dep.value },
                    success: function(data){
                        $("#sec").html(data);
                    }
                 
                 });
            } 

               function sem_selected(sem , dep ){
                console.log("sem: "+ sem +" dep: "+ dep.value);
                 $.ajax({
                    type: "POST",
                    url: "includes/getStudentData.php",
                    data: { "sem_sel": sem , "dep_sel": dep.value },
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
                    data: { "osec_sel": sec ,"osem_sel": sem.value , "odep_sel": dep.value },
                    success: function(data){
                        $("#student_data").html(data);
                    }
                 
                 });
            }
</script>


<h1 class="page-header">
    Students Page
    <small>Subheading</small>
</h1>

<ul class="breadcrumb">
    <li>
       Filters
    </li>
    <li>
       <select  name="dep" id="dep" onchange ="selectdep(this.value), sem_dep(this.value)"  >
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
      <select name="sem"  id="sem"  onchange ="sem_selected( this.value , document.getElementById('dep')) , sem_section(this.value , document.getElementById('dep'))   " >
             <option>Select A DEPARTMENT</option>
     </select>
    </li>
    <li>
      <select name="sec"  id="sec" onchange ="sec_selected( this.value  , document.getElementById('sem'), document.getElementById('dep'))"  >
             <option>Select A semester</option>
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
            <th>Semester</th>
            <th>Sec</th>
            <th>Department</th>
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
                                <td>".$row['sem_no']."</td>
                                <td>".getSectionName($row['sec_no'])[0]."</td>
                                <td>".getDepName($row['dep_id'])[0]."</td>
                                <td>".$row['checked']."</td>
                             </tr>   
                            ";
                    
                }
                

            ?>
            
            
        </tbody>
</table>


