<?php include_once 'header.php'; 
require '../helpers/init_conn_db.php';?>

<link rel="stylesheet" href="../assets/css/admin.css">
<link href="https://fonts.googleapis.com/css2?family=Assistant:wght@200;300&family=Poiret+One&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Cinzel&display=swap" rel="stylesheet">
<style>
  body {
    /* background-color: #B0E2FF; */
    background-color: #efefef;
  }
  td {
    /* font-family: 'Assistant', sans-serif !important; */
    font-size: 18px !important;
  }
  p {
  font-size: 35px;
  font-weight: 100;
  font-family: 'product sans';  
  }  

  .main-section{
	width:100%;
	margin:0 auto;
	text-align: center;
	padding: 0px 5px;
}
.dashbord{
	width:23%;
	display: inline-block;
	background-color:#34495E;
	color:#fff;
	margin-top: 50px; 
}
.icon-section i{
	font-size: 30px;
	padding:10px;
	border:1px solid #fff;
	border-radius:50%;
	margin-top:-25px;
	margin-bottom: 10px;
	background-color:#34495E;
}
.icon-section p{
	margin:0px;
	font-size: 20px;
	padding-bottom: 10px;
}
.detail-section{
	background-color: #2F4254;
	padding: 5px 0px;
}
.dashbord .detail-section:hover{
	background-color: #5a5a5a;
	cursor: pointer;
}
.detail-section a{
	color:#fff;
	text-decoration: none;
}
.dashbord-green .icon-section,.dashbord-green .icon-section i{
	background-color: #16A085;
}
.dashbord-green .detail-section{
	background-color: #149077;
}

.dashbord-blue .icon-section,.dashbord-blue .icon-section i{
	background-color: #2980B9;
}
.dashbord-blue .detail-section{
	background-color:#2573A6;
}
.dashbord-red .icon-section,.dashbord-red .icon-section i{
	background-color:#E74C3C;
}
.dashbord-red .detail-section{
	background-color:#CF4436;
}

.form-group-filter{
    display: flex;
    width: 100%;
  }
  .form-group-filter .btn-primary{
    height: 100%;
  }

  .form-group-filter label{
    width: 100%;
    padding: 2px;
    margin: auto;
    margin-top: 6px;
    box-sizing: border-box;
  }

  .form-group-filter input{
    margin-right: 5px;
    margin-left: 5px;
  }

  .form-group-filter label{
    color: #34495E;
    font-weight: 600;
  }
  @media (max-width:850px){

    #dropdown-filter{
      width: 40%;
    }

    .form-group-filter{
      display: block;
      width: 100%;
    }
    .form-group-filter .btn-primary {
      height: 98%;
      width: 88%;
      text-align: center;
      font-size: 11px;
      margin-bottom: 4px;
    }
    .form-group-filter label{
      width: 100%;
      margin: auto;
      box-sizing: border-box;
    }

    .form-group-filter input{
      margin-top: 5px;
      margin-right: 5px;
      width: 87%;
      font-size: 13px;
    }

    .form-group-filter label{
      color: #34495E;
      font-weight: 600;
    }
}
  
</style>
    <main>
        <?php if(isset($_SESSION['adminId'])) { ?>
          <div class="container">

            <div class="main-section">
              <div class="dashbord">
                <div class="icon-section">
                  <i class="fa fa-users" aria-hidden="true"></i><br>
                 Total Pasajeros
                  <p><?php include 'psngrcnt.php';?></p>
                </div>
               
              </div>
              <div class="dashbord dashbord-green">
                <div class="icon-section">
                  <i class="fa fa-money" aria-hidden="true"></i><br>
                  Cantidad
                  <p>$ <?php include 'amtcnt.php';?></p>
                </div>
               
              </div>
              <div class="dashbord dashbord-red">
                <div class="icon-section">
                  <i class="fa fa-plane" aria-hidden="true"></i><br>
                 Vuelos
                  <p><?php include 'flightscnt.php';?></p>
                </div>
               
              </div>     
              
              <div class="dashbord dashbord-blue">
                <div class="icon-section">
                  <i class="fa fa-plane fa-rotate-180" aria-hidden="true"></i><br>
                 Aerolíneas Disponibles
                  <p><?php include 'airlcnt.php';?></p>
                </div>
               
              </div>  
              
            </div>

          <div class="card mt-4" id="flight">
      <div class="card-body">
          <div class="dropdown" style="float: right;">
            <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-filter"></i>
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="#flight">Vuelos de Hoy</a>
              <a class="dropdown-item" href="#issue">Retrasos Vuelos de Hoy</a>
              <a class="dropdown-item" href="#dep">Partida Vuelos de Hoy</a>
              <a class="dropdown-item" href="#arr">Llegada Vuelos de Hoy</a>
            </div>
          </div>
          <div  class="dropdown" id="dropdown-filter" style="float: right;">
            <form method="post" action="">
              <div class="form-group-filter">
                <label for="searchDate">Buscar por Fecha:</label>
                <input type="date" class="form-control" name="searchDate" id="searchDate">
                <input type="submit" class="btn btn-primary" value="Search | All Flights" style="background-color: #34495E; border: 1px solid #34495E">
              </div>
            </form>
          </div> 
        <p class="text-secondary">Vuelos de Hoy</p>
        <table class="table-sm table table-hover">
          <thead class="thead-dark">
            <tr>
              <th scope="col">#</th>
              <th scope="col">LLegada</th>
              <th scope="col">Partida</th>
              <th scope="col">Destino</th>
              <th scope="col">Fuente</th>
              <th scope="col">Aerolínea</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>              
              <?php
                $searchDate = "";
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                  $searchDate = $_POST["searchDate"];
                  if (!empty($searchDate)) {
                    $sql = "SELECT * FROM Flight WHERE DATE(departure) = ?";
                    $stmt = mysqli_stmt_init($conn);
                    mysqli_stmt_prepare($stmt, $sql);
                    mysqli_stmt_bind_param($stmt, "s", $searchDate);
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
                  } else {
                    $sql = "SELECT * FROM Flight";
                    $stmt = mysqli_stmt_init($conn);
                    mysqli_stmt_prepare($stmt, $sql);
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
                  }
                } else {
                  $sql = "SELECT * FROM Flight";
                  $stmt = mysqli_stmt_init($conn);
                  mysqli_stmt_prepare($stmt, $sql);
                  mysqli_stmt_execute($stmt);
                  $result = mysqli_stmt_get_result($stmt);
                }
                while ($row = mysqli_fetch_assoc($result)) {
                  if($row['status']== '') {
                    echo '     
                <td scope="row">
                  <a href="pass_list.php?flight_id='.$row['flight_id'].'" style="text-decoration:underline;">
                  '.$row['flight_id'].' </a> </td>
                <td>'.$row['arrivale'].'</td>
                <td>'.$row['departure'].'</td>
                <td>'.$row['Destination'].'</td>
                <td>'.$row['source'].'</td>
                <td>'.$row['airline'].'</td> 
                <th class="options">
                  <div class="dropdown">
                    <button class="btn btn-info dropdown-toggle" type="button" 
                      id="dropdownMenuButton" data-toggle="dropdown" 
                        aria-haspopup="true" aria-expanded="false">
                      
                      <i class="fa fa-ellipsis-v"></i> </td>
                    </button>  
                    <div class="dropdown-menu">
                      <form class="px-4 py-3"  action="../includes/admin/admin.inc.php" method="post">
                        <input type="hidden" type="number" name="flight_id" 
                          value='.$row['flight_id'].'>
                        <div class="form-group">
                          <label for="exampleDropdownFormEmail1">Enter time in min.                              
                          </label>
                          <input type="number" class="form-control" name="issue" 
                            placeholder="Eg. 120">
                        </div>  
                        <button type="submit" name="issue_but" 
                          class="btn btn-danger btn-sm">Submit issue</button>
                        <div class="dropdown-divider"></div>
                        <button type="submit" name="dep_but" 
                          class="btn btn-primary btn-sm">Departed</button>
                      </form>
                    </div>
                  </div>  
                </th>                
              </tr> ' ; }} ?>
          </tbody>
        </table>        
      
      </div>
    </div>

    <div class="card" id="issue">
      <div class="card-body">
          <div class="dropdown" style="float: right;">
            <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-filter"></i>
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="#flight">Vuelos de Hoy</a>
              <a class="dropdown-item" href="#issue">Retrasos Vuelos de Hoy</a>
              <a class="dropdown-item" href="#dep">Partida Vuelos de Hoy</a>
              <a class="dropdown-item" href="#arr">Llegada Vuelos de Hoy</a>
            </div>
          </div>        
        <p class="text-secondary">Retrasos en los Vuelos de Hoy</p>
        <table class="table-sm table table-hover">
        <thead class="thead-dark">
            <tr>
              <th scope="col">#</th>
              <th scope="col">Llegada</th>
              <th scope="col">Partida</th>
              <th scope="col">Destino</th>
              <th scope="col">Fuente</th>
              <th scope="col">Aerolínea</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
              <tr>
              <?php
                $curr_date = (string)date('y-m-d');
                $curr_date = '20'.$curr_date;
                $sql = "SELECT * FROM Flight WHERE DATE(departure)=?";
                $stmt = mysqli_stmt_init($conn);
                mysqli_stmt_prepare($stmt,$sql);
                mysqli_stmt_bind_param($stmt,'s',$curr_date);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                while ($row = mysqli_fetch_assoc($result)) {
                  if($row['status']=='issue') {
                    echo '              
                <td scope="row">
                  <a href="pass_list.php?flight_id='.$row['flight_id'].'">
                  '.$row['flight_id'].' </a> </td>
                <td>'.$row['arrivale'].'</td>
                <td>'.$row['departure'].'</td>
                <td>'.$row['Destination'].'</td>
                <td>'.$row['source'].'</td>
                <td>'.$row['airline'].'</td> 
                <th class="options">
                  <div class="dropdown">
                    <button class="btn btn-info dropdown-toggle" type="button" 
                      id="dropdownMenuButton" data-toggle="dropdown" 
                        aria-haspopup="true" aria-expanded="false">
                      
                      <i class="fa fa-ellipsis-v"></i> </td>
                    </button>  
                    <div class="dropdown-menu">
                      <form class="px-4 py-3"  action="../includes/admin/admin.inc.php" method="post">
                        <input type="hidden" type="number" name="flight_id" 
                          value='.$row['flight_id'].'>  
                        <button type="submit" name="issue_soved_but" 
                          class="btn btn-danger btn-sm">Issue Solved!</button>
                      </form>
                    </div>
                  </div>  
                </th>                
              </tr> ' ; }} ?>
          </tbody>
        </table>        
      
      </div>
    </div> 

    <div class="card" id="dep">
      <div class="card-body">
          <div class="dropdown" style="float: right;">
            <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-filter"></i>
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="#flight">Vuelos de Hoy</a>
              <a class="dropdown-item" href="#issue">Retrasos en los Vuelos</a>
              <a class="dropdown-item" href="#dep">Partida de los Vuelos Hoy</a>
              <a class="dropdown-item" href="#arr">Llegada de los Vuelos Hoy</a>
            </div>
          </div>        
        <p class=" text-secondary">Partida de los Vuelos Hoy</p>
        <table class="table-sm table table-hover">
        <thead class="thead-dark">
            <tr>
              <th scope="col">#</th>
              <th scope="col">Llegada</th>
              <th scope="col">Partida</th>
              <th scope="col">Destino</th>
              <th scope="col">Fuente</th>
              <th scope="col">Aerolínea</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
              <tr>
              <?php
                $curr_date = (string)date('y-m-d');
                $curr_date = '20'.$curr_date;
                $sql = "SELECT * FROM Flight WHERE DATE(departure)=?";
                $stmt = mysqli_stmt_init($conn);
                mysqli_stmt_prepare($stmt,$sql);
                mysqli_stmt_bind_param($stmt,'s',$curr_date);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                while ($row = mysqli_fetch_assoc($result)) {
                  if($row['status']=='dep') {
                    echo '              
                <td scope="row">
                  <a href="pass_list.php?flight_id='.$row['flight_id'].'">
                  '.$row['flight_id'].' </a> </td>
                <td>'.$row['arrivale'].'</td>
                <td>'.$row['departure'].'</td>
                <td>'.$row['Destination'].'</td>
                <td>'.$row['source'].'</td>
                <td>'.$row['airline'].'</td> 
                <th class="options">
                  <div class="dropdown">
                    <button class="btn btn-info dropdown-toggle" type="button" 
                      id="dropdownMenuButton" data-toggle="dropdown" 
                        aria-haspopup="true" aria-expanded="false">
                      
                      <i class="fa fa-ellipsis-v"></i> </td>
                    </button>  
                    <div class="dropdown-menu">
                      <form class="px-4 py-3"  action="../includes/admin/admin.inc.php" method="post">
                        <input type="hidden" type="number" name="flight_id" 
                          value='.$row['flight_id'].'>  
                        <button type="submit" name="arr_but" 
                          class="btn btn-danger">Arrived</button>
                      </form>
                    </div>
                  </div>  
                </th>                
              </tr> ' ; }} ?>
          </tbody>
        </table>        
      
      </div>
    </div>       

    <div class="card mb-4" id="arr">
      <div class="card-body">
        <div class="dropdown" style="float: right;">
            <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-filter"></i>
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="#flight">Vuelos de Hoy</a>
              <a class="dropdown-item" href="#issue">Retrasos en los Vuelos</a>
              <a class="dropdown-item" href="#dep">Partida Vuelos de Hoy</a>
              <a class="dropdown-item" href="#arr">Llegada Vuelos de Hoy</a>
            </div>
          </div>        
        <p class=" text-secondary">Llegada Vuelos de Hoy</p>
        <table class="table-sm table table-hover">
        <thead class="thead-dark">
            <tr>
              <th scope="col">#</th>
              <th scope="col">Llegada</th>
              <th scope="col">Partida</th>
              <th scope="col">Destino</th>
              <th scope="col">Fuente</th>
              <th scope="col">Aerolínea</th>
            </tr>
          </thead>
          <tbody>
              <tr>
              <?php
                $curr_date = (string)date('y-m-d');
                $curr_date = '20'.$curr_date;
                $sql = "SELECT * FROM Flight WHERE DATE(departure)=?";
                $stmt = mysqli_stmt_init($conn);
                mysqli_stmt_prepare($stmt,$sql);
                mysqli_stmt_bind_param($stmt,'s',$curr_date);
                mysqli_stmt_execute($stmt);
                  $result = mysqli_stmt_get_result($stmt);
                  while ($row = mysqli_fetch_assoc($result)) {
                  if($row['status']=='arr') {
                    echo '              
                <td scope="row">
                  <a href="pass_list.php?flight_id='.$row['flight_id'].'">
                  '.$row['flight_id'].' </a> </td>
                <td>'.$row['arrivale'].'</td>
                <td>'.$row['departure'].'</td>
                <td>'.$row['Destination'].'</td>
                <td>'.$row['source'].'</td>
                <td>'.$row['airline'].'</td>                
              </tr> ' ; }} ?>
          </tbody>
        </table>        
      
      </div>
    </div>      
  </div>
<?php } ?>
    </main>
    <?php include_once 'footer.php'; ?>
