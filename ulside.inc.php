<style type="text/css">
   .nav-item:hover{
    background-color: #f99e00;
   }
 </style>

 <nav class="sidebar sidebar-offcanvas" id="sidebar" style="background-color:#ffe">
        <ul class="nav">
          <li class="nav-item nav-profile">
            <div class="nav-link">
              <div class="profile-image" >
                
                 <?php 
               
               $imgg="./photo/".$row_sch['accID'].".jpg";
               
               if(file_exists($imgg)){$simg="./photo/".$row_sch['accID'].".jpg";}else{$simg="./photo/0.png";}?> <img src="<?php echo $simg;?>" class="img-lg rounded-circle mb-2" alt="profile image"/>

              </div>
              <div class="profile-name">
               <p class="name">
			   	<?php
					$tt=-1;
if(isset($_SESSION['accID']) && $_SESSION['accID']>=0){ $tt=test_input($_SESSION['accID']);}



mysqli_select_db($dbsmart, $database_dbsmart );
$query_sch30 = sprintf("SELECT * FROM `bio`  WHERE status=1 AND accID=".$tt);
$sch30 = mysqli_query($dbsmart, $query_sch30) or die(mysqli_error($dbsmart));
$row_sch30 = mysqli_fetch_assoc($sch30);
$totalRows_sch30 = mysqli_num_rows($sch30);

?>
               Hi <a href="u_staff.php?u=<?php echo $row_sch30['staffNo']; ?>" ><?php echo $row_sch30['fname']."! ";?></a>
                </p>
                <p class="designation">
                  Admin
                </p>
              </div>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="dashboard.php">
              <i class="fa fa-home menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
		  
		  
		   <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#parent" aria-expanded="false" aria-controls="page-layouts">
              <i class="fab fa-trello menu-icon"></i>
              <span class="menu-title">Business & Staff</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="parent">
              <ul class="nav flex-column sub-menu">
			  
			   <li class="nav-item d-none d-lg-block"> <a class="nav-link" href="parent_list20.php">Org/Business List</a></li>
               <li class="nav-item d-none d-lg-block"> <a class="nav-link" href="Temup_parent.php">Update Business</a></li>
                <li class="nav-item"> <a class="nav-link" href="disableParent.php">Organisation  Status</a></li>
				<li class="nav-item d-none d-lg-block"> <a class="nav-link" href="student_list.php">Staff List</a></li>
				<li class="nav-item d-none d-lg-block"> <a class="nav-link" href="disableStudent.php">Disable Organisation</a></li>
				 <!-- <li class="nav-item"> <a class="nav-link" href="update_student.php">Update Student</a></li> -->
				 <li class="nav-item"> <a class="nav-link" href="change_class.php">Change Business Zones</a></li>
				<!--  <li class="nav-item"> <a class="nav-link" href="change_arm.php">Change Arm</a></li> -->
              </ul>
            </div>
          </li>
		  
		  
		   <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#page-layouts" aria-expanded="false" aria-controls="page-layouts">
              <i class="fab fa-trello menu-icon"></i>
              <span class="menu-title">Netgrity Staff Mgt</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="page-layouts">
              <ul class="nav flex-column sub-menu">
			   <li class="nav-item d-none d-lg-block"> <a class="nav-link" href="norminal.php">View Position</a></li>
                <li class="nav-item d-none d-lg-block"> <a class="nav-link" href="new_staff.php">Create New Staff</a></li>
				<li class="nav-item d-none d-lg-block"> <a class="nav-link" href="disableStaff.php">Disable Staff</a></li>
				   
                <li class="nav-item d-none d-lg-block"> <a class="nav-link" href="changeRole.php">Assign Position</a></li>
              </ul>
            </div>
          </li>
	<!-- 
		  <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#admsn" aria-expanded="false" aria-controls="page-layouts">
              <i class="fab fa-trello menu-icon"></i>
              <span class="menu-title">Admission</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="admsn">
			 <ul class="nav flex-column sub-menu">
              <li class="nav-item d-none d-lg-block"> <a class="nav-link" href="admisn_list.php">Admission List</a></li>
              <li class="nav-item d-none d-lg-block"> <a class="nav-link" href="new_admisn.php">New Admission</a></li>
			   <li class="nav-item d-none d-lg-block"> <a class="nav-link" href="all_admisn_list.php">All Admission List</a></li>
				 </ul>
            </div>
          </li> -->
		  
		<!--   
		   <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#update" aria-expanded="false" aria-controls="page-layouts">
              <i class="fab fa-trello menu-icon"></i>
              <span class="menu-title">Temp Menu</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="update">
              <ul class="nav flex-column sub-menu">
			    <li class="nav-item d-none d-lg-block"> <a class="nav-link" href="Temup_parent.php">Edit Parent</a></li>
				 <li class="nav-item"> <a class="nav-link" href="update_student.php">Update Student</a></li>
			
               
              </ul>
            </div>
          </li> -->
	
	
	
	
          
         
		
		  <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#role1" aria-expanded="false" aria-controls="page-layouts">
              <i class="fab fa-trello menu-icon"></i>
              <span class="menu-title">Zones</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="role1">
			 <ul class="nav flex-column sub-menu">
         
              <li class="nav-item d-none d-lg-block"> <a class="nav-link" href="new_class_structure.php">Create New Zones Area</a></li>
				 <li class="nav-item d-none d-lg-block"> <a class="nav-link" href="new_session.php">Zones Section</a></li>
				 </ul>
            </div>
          </li>
		  
		  
		
       <li class="nav-item">
	   <li class="nav-item">
	   </ul>
      </nav>
      