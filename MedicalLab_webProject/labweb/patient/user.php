
<?php 	
	if ( !empty($_POST['submit'])&& $_POST['submit']=='logout')
	session_start();
  unset($_SESSION['login']);
  session_destroy();
  header("Location: index.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" >
  <link rel="stylesheet" href="../css/user.css"
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
<?php
  
  session_start();
  if($_SESSION['login']==false or !(in_array($_SESSION['role'],array('patient'))))
  {
    header("location: ../index.php?loginError=1");
    exit;
  }	
?>
  <div class="container">
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
                    <img src="<?php echo "img/". $_SESSION['id'].".png"?>  alt="Admin" class="rounded-circle" width="150">
                
                  </div>
                </div>
              </div>
              <div class="card mt-3">
                <ul class="list-group list-group-flush">
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <form action="logout.php" method="post"></form>
                  <button type="submit" name="logout" class="btn btn-default btn-primary" >Logout</button>
                   </form>
                </li>
                  
             
                </ul>
              </div>
            </div>
            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Full Name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php $_SESSION['name']?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">ID Nunmber</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php $_SESSION['id']?>
                    </div>
                  </div>
                  
                  
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php $_SESSION['email']?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Phone</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php $_SESSION['phone']?>
                    </div>
                  </div>
      
                  <hr>
                        <div class="row mb-3">
                          <div class="col-sm-3">
                            <h6 class="mb-0">Date of Birth</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                            <?php $_SESSION['date']?>
                            </div>
                            </div>
                       </div>
                
                  <div class="row">
                    <div class="col-sm-12">
                    </div>
                  </div>
                </div>
              </div>
            

            <?php 
               $query1=Test::getAllTests($_SESSION['id']);
                while($row=$query1->fetch())
              {
              ?>   
     
          <div class="col-sm-6 mb-3">
            <div class="card h-100">
                <div class="card-body">
                  <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">Medical Test</h6>
                   //echo 'img/name'?>
                  <br>
                  <button type="submit" name="download" class="btn btn-default btn-primary" >Download</button>
                </div>
              </div>
            </div>
        </div>
        <?php
           }
           ?>

      
       </div>

        </div>
    </div>

</body>
</html>