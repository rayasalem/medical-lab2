<?php

  session_start();
  if($_SESSION['login']==false or !(in_array($_SESSION['role'],array('admin'))))
  {
    header("location: ../index.php?loginError=1");
    exit;
  }	
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" >
  <link rel="stylesheet" href="user.css"
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <div class="container">
    <?php
	require("../Class.Patient.php");
  require("../Class.Test.php");

	if(!empty($_POST['submit'])&& $_POST['submit']=='save')
	{
		
		$test=Test::insetTest($_POST['id'],$_FILES['test']);
		
		if($test)
		{
			Tools::printSuccess("Updated Successfully <a href ='index.php'>Go back</a>");  		}
		else
		{
			Tools::printError("Updated Failed <a href ='index.php'>Go back</a>");
		}
		  
	}
?>
     <?php
	


	if(!empty($_POST['submit'])&& $_POST['submit']=='edit')
	{
		
		$test=Patient::updatePatient($_POST['id'],$_POST['name'],$_POST['password'],$_POST['email'],$_POST['phone'],$_POST['date']);
		
		if($test)
		{
			Tools::printSuccess("Updated Successfully <a href ='index.php'>Go back</a>");  		}
		else
		{
			Tools::printError("Updated Failed <a href ='index.php'>Go back</a>");
		}
		  
	}
	
	
	?>

    <div class="main-body">
    
          <!-- Breadcrumb -->
          <nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.html">Home</a></li>
              <li class="breadcrumb-item"><a href="javascript:void(0)">User</a></li>
              <li class="breadcrumb-item active" aria-current="page">User Profile</li>
            </ol>
          </nav>
          <!-- /Breadcrumb -->
    
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
                  </div>
                </div>
              </div>
            </div>
         
          
 <form  style='width:60%'enctype="multipart/form-data" action="" method="post" >
      <div class="col-md-8">
        <div class="card mb-3">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Full Name</h6>
              </div>
              <div class="col-sm-9 text-secondary">
              <input name="name" type="text" class="form-control" value="john">
              </div>
            </div>

            <hr>
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">ID Nunmber</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                <input name="id" type="number" class="form-control" value="5445456">
              </div>
            </div>
            
            
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Email</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                <input name="email" type="email"  class=form-control value="g,lfd@">
              </div>
            </div>

            <hr>
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Phone</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                <input name="phone" type="number" class="form-control" value="5445456">
              </div>
            </div>

            <hr>  
              <div class="row mb-3">
                <div class="col-sm-3">
                  <h6 class="mb-0">Passward</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <input name="password" type="password" class="form-control" value="**********">
                </div>
            </div>

            <hr>
            <div class="row mb-3">
              <div class="col-sm-3">
                <h6 class="mb-0">Date of Birth</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <input name="date" type="date" class="form-control" >
                </div>
            </div>

            <hr>
            <div class="row mb-3">
              <div class="col-sm-3">
                <h6 class="mb-0">Upload an image</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <input name="img" type="file" class="form-control" >
                </div>
              </div>
            </div>
            
            <hr>
            <div class="row">
              <div class="col-sm-12">
              <button type="submit" name="edit" class="btn btn-default btn-primary" >Edit</button>
              </div>
            </div>
          </div>
      </div>
 </form> 
 <form  style='width:60%'enctype="multipart/form-data" action="" method="post" >
      <div class="col-sm-6 mb-3">
            <div class="card h-100">
            <div class="card-body">
              <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">Medical Test</h6>
                <input name="test" type="file" class="file" >
                <button type="submit" name="save" class="btn btn-default btn-primary" >Save</button>
            </div>
          </div>
      </div>
 </form>

</div>

          
          </div>    
        </div>
       </div>



            </div>
          </div>

        </div>
    </div>

</body>
</html>