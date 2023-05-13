<?php

  session_start();
  if($_SESSION['login']==false or !(in_array($_SESSION['role'],array('admin'))))
  {
    header("location: ../index.php?loginError=1");
    exit;
  }	
?>
<?php
require("../Class.Patient.php");
if(!empty($_POST['submit'])&& $_POST['submit']=='delete')
	{
    $test =Patient::deletePatient($_POST['id']);
    if($test)
    {	
     Tools::printSuccess("One Record Inserted Successfully");
    }
    else
    {
      Tools::printError("Inserting Failed for some ERROR");
    }  
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AdminPage</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

<div class="container profile-page">
    <div class="row">
    
 <?php 




$query1=Patient::getAllPatients();

while($row=$query1->fetch())
{
    
?>
    <div class="col-xl-6 col-lg-7 col-md-12">
            <div class="card profile-header">
                <div class="body">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-12">
                            <div class="profile-image float-md-right"> <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt=""> </div>
                        </div>
                        <div class="col-lg-8 col-md-8 col-12">
                            <h4 class="m-t-0 m-b-0"><strong> <?php $row['name'] ?> </strong></h4>
                            <br><br><br>

                           <div>
                                <button class="btn btn-primary btn-round btn-simple">View User</button>
                                <form  action="/" method="post">
                                   <button class="btn btn-primary btn-round" type="submit" name="delete">Delete User</button>
                                </form>
                            </div>
                           
                        </div>                
                    </div>
                </div>                    
            </div>
        </div>
  <?php
    }
  ?>



        <div class="col-xl-6 col-lg-7 col-md-12">
            <div class="card profile-header">
                <div class="body">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-12">
                            <div class="profile-image float-md-right"> <img src="../img/addUser.png" alt=""> </div>
                        </div>
                        <div class="col-lg-8 col-md-8 col-12">
                            <h4 class="m-t-0 m-b-0"><strong></strong></h4>
                            <br><br><br><br>

                           <div>
                           <form  action="addUser.php" method="post">
                             <button class="btn btn-primary btn-round" type="submit" name="submit">Add User</button>
                            </form>
                            
                            </div>
                           
                        </div>                
                    </div>
                </div>                    
            </div>
        </div>

        
    </div>
   

</body>
</html>