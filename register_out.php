<?php // include_once('../_includes/functions.inc.php');?>
<?php// include_once('../_action/vlogin.php');


$dispage="New Staff (Admin -HR)"?>
<!DOCTYPE html>
<html lang="en">

<head>
 <?php include_once('headcss.inc.php');?>
   <script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
  </script>
  <script>
  $( function() {
    $( "#datepicker2" ).datepicker();
  } );
  </script>
   <script>
function getCat(val) {
	$.ajax({
	type: "POST",
	url: "get_subcat.php",
	data:'country_id='+val,
	success: function(data){
		$("#subcat-list").html(data);
	}
	});
}

function selectCountry(val) {
$("#search-box").val(val);
$("#suggesstion-box").hide();
}
</script>
</head>

<body>
 <div class="container-scroller">
    <!-- partial:../partials/_navbar.html -->
<?php include_once('head.inc.php');?>  

  <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:../partials/_settings-panel.html -->
<?php include_once('rside.inc.php');?>   
   <!-- partial -->
      <!-- partial:../partials/_sidebar.html -->
     <?php include_once('ulside.inc.php');?>
	 <!-- partial -->
	 
	 <?php



if( isset($_POST['staffNo'])  && isset($_POST['phone'])  && isset($_POST['marital'])  && isset($_POST['fname'])  && isset($_POST['lname'])){
	


	 if (empty($_POST["email"])) {
			$errmsg = errmsg." Email: Required <br />";
			$errcode=112;
			
		  }
	
	
		  if ((!empty($_POST["email"])) && !filter_var(test_input($_POST['email']), FILTER_VALIDATE_EMAIL)) {
  $errmsg = $errmsg." Invalid email format<br />"; 
  $errcode=112;
}

		  
		  
		  
		if (empty($_POST["phone"])) {
			$errmsg = $errmsg." Phone Number: Required <br />";
			$errcode=112;
			
		  } else {
			  $phone = str_ireplace("-","",$_POST["phone"]);
			  
			
			  if(!is_numeric($phone) || strlen(test_input($phone))!=11){ $errcode=112; $errmsg = $errmsg." Phone Number must be numeric 11 digits<br />";} 
			  }
			  
	
			  
		 if (empty($_POST["staffNo"])) {
			$errmsg = $errmsg." Staff No: Required <br />";
			$errcode=112;
			
		  } 
		  
		  if ((!empty($_POST["uname"])) &&(!preg_match("/^[a-zA-Z0-9]*$/",test_input($_POST['uname'])))) {
  $errmsg = $errmsg." Only letters and numbers allowed in Username<br />"; $errcode=112;
}	  
		 if (empty($_POST["fname"])) {
			$errmsg = $errmsg." First Name: Required <br />";
			$errcode=112;
			
		  } 
		  
		  if ((!empty($_POST["fname"])) &&(!preg_match("/^[a-zA-Z ]*$/",test_input($_POST['fname'])))) {
  $errmsg = $errmsg." Only letters and white space allowed in First Name<br />"; $errcode=112;
}	  
		if (empty($_POST["lname"])) {
			$errmsg = $errmsg." Last Name: Required <br />";
			$errcode=112;
			
		  } 
		  
		  if ((!empty($_POST["lname"])) &&(!preg_match("/^[a-zA-Z ]*$/",test_input($_POST['lname'])))) {
  $errmsg = $errmsg." Only letters and white space allowed in Last Name<br />"; $errcode=112;
}	  
		  
			  
//check if group already exists
$twt="-1";

if(isset($_POST['staffNo'])){ $twt= test_input($_POST['staffNo']);}
mysqli_select_db($dbsmart, $database_dbstaff );
$query_sch = sprintf("SELECT `staffNo` FROM `bio` WHERE status<=2 AND `staffNo` LIKE '%s'", $twt);
$sch = mysqli_query($dbsmart, $query_sch) or die(mysqli_error($dbsmart));
$row_sch = mysqli_fetch_assoc($sch);
$totalRows_sch = mysqli_num_rows($sch);
	
if($totalRows_sch>0){$errcode=112; $errmsg.="Staff No: ".strtoupper(test_input($_POST['staffNo']))." already exist<br/>";}



if($errcode!=112){	



 mysqli_select_db($dbsmart, $database_dbbasic);
$query_lga2 = sprintf("SELECT * FROM state WHERE s_name = '" . $_POST['soo'] . "'");
$lga2= mysqli_query($dbsmart, $query_lga2) or die(mysqli_error($dbsmart));
$row_lga2 = mysqli_fetch_assoc($lga2);


mysqli_select_db($dbsmart, $database_dbbasic);
$query_lga = sprintf("SELECT * FROM local_gov WHERE lga_name = '" . $_POST['lga'] . "'");
$lga= mysqli_query($dbsmart, $query_lga) or die(mysqli_error($dbsmart));
$row_lga = mysqli_fetch_assoc($lga);

$doe=$_POST['doe'];
$ndoe=date("Y-m-d", strtotime($doe) );
$dob=$_POST['dob'];
$ndob=date("Y-m-d", strtotime($dob) );
	

$insertSQL = sprintf("INSERT INTO bio (dept, `fname`, `lname`, `oname`, `sex`, `dob`, `marital`, `lga`, `doe`, `soo`, `staffNo`, `maker`) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString(test_input($_POST['dept']), "int"),
					   GetSQLValueString(test_input($_POST['fname']), "text"),
					   GetSQLValueString(test_input($_POST['lname']), "text"),
					   GetSQLValueString(test_input($_POST['oname']), "text"),
					   GetSQLValueString(test_input($_POST['sex']), "text"),
					   GetSQLValueString(test_input($ndob), "date"),
						  GetSQLValueString(test_input($_POST['marital']), "text"),
						  GetSQLValueString(test_input($row_lga['lga_id']), "int"),
					   GetSQLValueString(test_input($ndoe), "date"),
					   GetSQLValueString(test_input($row_lga2['state_id']), "int"),
					   GetSQLValueString(test_input($_POST['staffNo']), "text"),
					 
					   GetSQLValueString($_SESSION['accID'], "int"));


mysqli_select_db($dbsmart, $database_dbstaff);


$Result1 = mysqli_query($dbsmart, $insertSQL) or die(mysqli_error($dbsmart));



$nphone=preg_replace('/\D+/', '', $phone);

$insertSQL = sprintf("INSERT INTO login (`phone`, `email`, `address`, `city`, `clga`, `wlocation`, `pwd`, `staffNo`) VALUES (%s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString(test_input($nphone), "text"),
					   GetSQLValueString(test_input($_POST['email']), "text"),
					   GetSQLValueString(test_input($_POST['address']), "text"),
					   GetSQLValueString(test_input($_POST['city']), "text"),
					   GetSQLValueString(test_input($_POST['clga']), "int"),
					   GetSQLValueString(test_input($_POST['wlocation']), "int"),
					    GetSQLValueString(md5(test_input($nphone)), "text"),
					   
					   GetSQLValueString(test_input($_POST['staffNo']), "text"));


mysqli_select_db($dbsmart, $database_dbsmart);


$Result1 = mysqli_query($dbsmart, $insertSQL) or die(mysqli_error($dbsmart));


	
$success=  $success."New Staff Created Successfully"; 

  //$succode=211; $sucmsg="New User ".strtoupper(test_input($_POST['fname']))." ".strtoupper(test_input($_POST['lname']))." created";

  $_POST=array();
 
 
}
}



?>


      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
        <div class="page-header">
            <h5 >
           Add New Staff
            </h5>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><?php echo $ur_role;?></a></li>
                <li class="breadcrumb-item active" aria-current="page">Staff Mgt</li>
              </ol>
            </nav>
          </div>
          
          <div class="row">
            <div class="col-8 grid-margin">
              <div class="card">
                <div class="card-body"  style="border: 2px solid white; border-radius: 10px;">
                  <form id="example-form1" action="" method="post" >
                    <div>
                      <!--<h3>  <i class="fa fa-user text-info ml-2"></i>  PERSONAL DETAILS</h3>-->
                       <section style="min-height:800px !important;">
                        <h6 ><span class="subh">BIO INFO</span></h6>
                       </br>
					   <?php if(isset($success)){ ?>
						
						<div class="alert alert-success" role="alert" style="font-size:15px;">
                    <i class="fa fa-check"></i>
                     <?php echo $success; ?>
                  </div>
					   
					   <?php }?>
					   
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group row">
                          <div class="col-sm-4">
                            <input type="text" class="form-control bottomline" id="cname" required name="fname" data-bind="firstName" placeholder="First Name" value="<?php echo test_input($_POST['fname']);?>"/>
                          </div>
                        
                          <div class="col-sm-4">
                            <input type="text" class="form-control bottomline" name="oname" data-bind="mName"  placeholder="Middle Name" value="<?php echo test_input($_POST['oname']);?>"/>
                          </div>
						  
						  <div class="col-sm-4">
                            <input type="text" class="form-control bottomline"  required  name="lname" data-bind="surName"  placeholder="Surname"value="<?php echo test_input($_POST['lname']);?>" />
                          </div>
                        </div>
                      </div>
					  </div>
					   <div class="row">
                      
					   <div class="col-md-6">
                        <div class="form-group row">
                          <!-- <label class="col-sm-3 col-form-label" >Marital Status</label> -->
						  <div class="col-sm-5">
                            <div class="form-check form-check-success" style="margin-top:15px">
                              <label class="form-check-label" style="color:#000; font-weight:510; ">
                                <input type="radio" class="form-check-input form-check-primary" name="sex" required  value="M" style="border-color:red;"  <?php  if($_POST['sex']=='M') { echo "checked='checked'";}?>>
                                Male
                              </label>
                            </div>
                          </div>
                          <div class="col-sm-4">
                            <div class="form-check form-check-danger" style="margin-top:15px;">
                              <label class="form-check-label" style="color:#000; font-weight:510; ">
                                <input type="radio" class="form-check-input form-check-warning" name="sex"  value="F"  <?php  if($_POST['sex']=='F') { echo "checked='checked''";}?>>
                                Female
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>
					    <div class="col-md-6">
                        <div class="form-group row">
                          <div class="col-sm-12">
                          <!-- <label class="">Date:</label>   -->
                        <input class="form-control bottomline" type="date" id="datepicker"  data-bind="DOB" placeholder="Date of Birth" required name="dob" value="<?php echo test_input($_POST['dob']);?>"/>
                          </div>
                        </div>
                      </div>
					 
                    </div>
                    <div class="row">
                      
                    
                     <div class="col-md-6">
                        <div class="form-group row">
                          <!-- <label class="col-sm-3 col-form-label" >Marital Status</label> -->
						  <div class="col-sm-5">
                            <div class="form-check form-check-success" style="margin-top:15px">
                              <label class="form-check-label" style="color:#000; font-weight:510; ">
                                <input type="radio" class="form-check-input form-check-primary" name="marital" required id="marital1" data-bind="MS" value="M" style="border-color:red;"  <?php  if($_POST['marital']=='M') { echo "checked='checked'";}?>>
                                Married
                              </label>
                            </div>
                          </div>
                          <div class="col-sm-4">
                            <div class="form-check form-check-danger" style="margin-top:15px;">
                              <label class="form-check-label" style="color:#000; font-weight:510; ">
                                <input type="radio" class="form-check-input form-check-warning" name="marital" data-bind="MS" id="marital2" value="S"  <?php  if($_POST['marital']=='S') { echo "checked='checked'";}?>>
                                Single
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>
					   
                    <div class="col-md-6">
                       
                      </div>
                    </div>
                 
                   
                    <div class="row">
					 
					  <div class="col-md-6">
                        <div class="form-group row">
                          <div class="col-sm-12">
                            <select class="form-control bottomline select2" required name="soo" id="cat-list" data-bind="SOO" onChange="getCat(this.value);">
							<option value="">--Select State of Origin--</option>
                            <?php mysqli_select_db($dbsmart, $database_dbbasic);
$query_bank = sprintf("SELECT * FROM `state` ORDER BY s_name ASC");
$bank= mysqli_query($dbsmart, $query_bank) or die(mysqli_error($dbsmart));
$row_bank = mysqli_fetch_assoc($bank);
$totalRows_bank = mysqli_num_rows($bank);

while ($row_bank = mysqli_fetch_assoc($bank)){?>

<option value="<?php echo $row_bank['s_name'];?>" <?php  if($_POST['soo']==$row_bank['s_name']) { echo "selected='selected'";}?>><?php echo $row_bank['s_name'];?></option>

<?php }?>
                            </select>
                          </div>
                        </div>
                      </div>
                    
					   
						  
                      <div class="col-md-6">
                        <div class="form-group row">
                          <div class="col-sm-12">
                            <select class="form-control bottomline" name="lga" data-bind="LGA" id="subcat-list" required="required">
							<option value="">--Select LGA--</option>
                              
                            </select>
                          </div>
                        </div>
                      </div>
                    </div>
					<br/><br/>
					<h6 ><span class="subh" style="margin-top:20px;">CONTACT INFO</span></h6>
					
					<br/>
					
					    <div class="row">
                      <div class="col-md-6">
                         <div class="form-group row">
					  <div class="col-sm-12">
					  <div class="input-group">
					  
                      <input type="email" class="form-control bottomline2" required="required" id="exampleInputEmail1" data-bind="EMAIL" placeholder="Type Email" name="email" value="<?php echo test_input($_POST['email']);?>">
					  </div>
					  </div>
                    </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
					  <div class="col-sm-12">
                      <input class="form-control bottomline2" data-inputmask="'alias': 'phoneng'" data-bind="PHONE" required="required" name="phone" placeholder="Mobile Phone" value="<?php echo test_input($_POST['phone']);?>"/>
					  </div>
                    </div>
                      </div>
                    </div>
                  
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group row">
                          <div class="col-sm-12">
                            <input type="text" class="form-control bottomline2" data-bind="ADD" required="required" placeholder="Residential Address (Street & No)" name="address" value="<?php echo test_input($_POST['address']);?>" />
                          </div>
                        </div>
                      </div>
					</div>
					 <div class="row">
					    <div class="col-md-6">
                        <div class="form-group row">
                          <div class="col-sm-12">
                            <input type="text" class="form-control bottomline2" required="required" placeholder="City" name="city" value="<?php echo test_input($_POST['city']);?>"/>
                          </div>
                        </div>
                      </div>
                   
                    
                        <div class="col-md-6">
                        <div class="form-group row">
                          <div class="col-sm-12">
                            <select class="form-control bottomline2" name="clga" required="required">
							<option value="">Select LGA </option>
                           <?php mysqli_select_db($dbsmart, $database_dbbasic);
$query_bank = sprintf("SELECT * FROM local_gov WHERE state_id =11 ");
$bank= mysqli_query($dbsmart, $query_bank) or die(mysqli_error($dbsmart));
$row_bank = mysqli_fetch_assoc($bank);
$totalRows_bank = mysqli_num_rows($bank);

while ($row_bank = mysqli_fetch_assoc($bank)){?>

<option value="<?php echo $row_bank['lga_id'];?>"><?php echo $row_bank['lga_name'];?></option>

<?php }?>
                            </select>
                          </div>
                        </div>
                      </div>
                     
                    </div>
                   
                  
                    <br/><br/>
                        <h6 ><span class="subh" style="margin-top:20px;">EMPLOYMENT DETAILS</span></h6>
						</br>
                          <div class="row">
                      <div class="col-md-4">
                        <div class="form-group row">
                          <div class="col-sm-12">
						   <label class="">Staff No:</label>
                            <input type="text" class="form-control bottomline3" required="required" data-bind="SN" name="staffNo" placeholder="E.g 52245" value="<?php echo test_input($_POST['staffNo']);?>"/>
                          </div>
                        </div>
                      </div>
					
                      <div class="col-md-4">
                        <div class="form-group row">
                          
                          <div class="col-sm-12">
						  <label class="">Date of Employment:</label>
                            <input class="form-control bottomline3" type="text" id="datepicker2" required name="doe" data-bind="DOE"  value="<?php echo test_input($_POST['doe']);?>"/>
                          </div>
                        </div>
                      </div>
					      <div class="col-md-4">
                       <div class="form-group row">
					   
                          
                          <div class="col-sm-12">
						  <label class="">Dept:</label>
                            <select class="form-control bottomline3" required name="dept" style="height:45px">
                              <option >Select Dept</option>
                              <?php mysqli_select_db($dbsmart, $database_dbbasic);
$query_bank2 = sprintf("SELECT * FROM `dept` WHERE status=1 ORDER BY name ASC");
$bank2= mysqli_query($dbsmart, $query_bank2) or die(mysqli_error($dbsmart));



while ($row_bank2 = mysqli_fetch_assoc($bank2)){?>

<option value="<?php echo $row_bank2['deptID'];?>"  <?php  if($_POST['dept']==$row_bank2['deptID']) { echo "selected='selected'";}?>><?php echo $row_bank2['name'];?></option>

<?php }?>
                            </select>
                          </div>
                        </div>
						</div>
						
					  
                    </div>
					  <div class="row">
					   <div class="col-md-4">
                     
						</div>
						
						<div class="col-md-4">
                       <div class="form-group row">
					   <input type="submit" name="button" value="SUBMIT" class="form-control btn btn-danger" />
                          
                      
                        </div>
						</div>
						
						<div class="col-md-4">
                      
						</div>
						
						
					   </div>
                      </section>
                  </div>
                  </form>
                </div>
              </div>
            </div>
			 <div class="col-4 " style="height:600px">
				<?php include_once('sideslide.inc.php');?>
			 </div>
		  </div>
          <!--vertical wizard-->
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <footer class="footer">
         <?php include_once('footer.inc.php');?>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <script src="../../js/jquery.min.js"></script>
  <script>
	// Declare a global object to store view data.
var viewData;

viewData = {};

$(function() {
    // Update the viewData object with the current field keys and values.
    function updateViewData(key, value) {
        viewData[key] = value;
    }

    // Register all bindable elements
    function detectBindableElements() {
        var bindableEls;

        bindableEls = $('[data-bind]');

        // Add event handlers to update viewData and trigger callback event.
        bindableEls.on('change', function() {
            var $this;
            
            $this = $(this);
            
            updateViewData($this.data('bind'), $this.val());

            $(document).trigger('updateDisplay');
        });

        // Add a reference to each bindable element in viewData.
        bindableEls.each(function() {
            updateViewData($(this));
        });
    }

    // Trigger this event to manually update the list of bindable elements, useful when dynamically loading form fields.
    $(document).on('updateBindableElements', detectBindableElements);

    detectBindableElements();
});

$(function() {
    // An example of how the viewData can be used by other functions.
    function updateDisplay() {
        var updateEls;

        updateEls = $('[data-update]');

        updateEls.each(function() {
            $(this).html(viewData[$(this).data('update')]);
        });
    }

    // Run updateDisplay on the callback.
    $(document).on('updateDisplay', updateDisplay);
});
  </script>
  <!-- plugins:js -->
    
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <script src="vendors/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
    <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="/misc.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/wizard.js"></script>
  <script src="js/form-validation.js"></script>
  <!-- End custom js for this page-->
  
  <script src="js/owl-carousel.js"></script>
</body>

</html>
