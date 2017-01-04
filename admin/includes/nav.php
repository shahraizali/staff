<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Admin Pannel</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                
              
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Shahraiz Ali <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li  <?php if( @$_SESSION['page_name'] ==  "dashboard"){echo "style='background-color:black'" ;} ?>>
                        <a href="index.php"  name="default"  ><i class="fa fa-fw fa-dashboard"></i>Dashboard</a>
                    </li <?php if( @$_SESSION['page_name'] ==  "student"){echo "style='background-color:black'" ;} ?>>
                    <li>
                        <a href="#"  onclick="getter(this.name)" name="students" ><i class="fa fa-fw fa-table" ></i>Students</a>
                    </li>
                    <li  <?php if( @$_SESSION['page_name'] ==  "form"){echo "style='background-color:black'" ;} ?>>
                        <a href="subjects.php" name="Form" ><i class="fa fa-fw fa-edit" id="form"   ></i><span >Subjects</span></a>
                    </li>
                   
                    
                    
                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>