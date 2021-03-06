<?php
require_once("../Domain/User.php");
require_once("../Domain/UserRole.php");
require_once("../Domain/Service.php");
require_once("../Domain/Company.php");
require_once("../Domain/ServiceType.php");
session_start();
// Function that check if  a Service is expired compared to actual date, and then send a mail.
if(!isset($_SESSION["user"])){//si session  es nullo
  header("Location:../index.php");
}else{
require_once("../Controller/AdminViewController.php");
date_default_timezone_set('America/Costa_Rica'); 
$actualDate=date('Y-m-d ');
$dateTime=new DateTime($actualDate);
$company=$_SESSION["user"]-> getUserCompany();
$emailMessageGreeting='Saludos señor(a): '.$_SESSION["user"]->getUserName().' '.$_SESSION["user"]->getUserLastName().
' representante de la compañía: '.$company->getCompanyName()."\n";
$emailMessageBody='';
foreach($serviceList  as $service){
  $date2= $service['expire_date'];
  $dateTime2=new DateTime($date2);
  if($date2>$actualDate){
  $interval=$dateTime->diff($dateTime2);
  if($interval->days<=10){
    $emailMessageBody.= 'El servicio: '.$service['type_of_service'].':'.$service['description'].' termina en la fecha:'.
    $service['expire_date']."\n".'Por favor tengalo en cuenta. Saludos'."\n";
  }
  }
}
$emailBody=$emailMessageGreeting."\n".$emailMessageBody;
$receptor=$_SESSION["user"]-> getUserMail();
$issue='Recordatorio de servicio próximo a vencer';
$headers="MIME-Version: 1.0\r\n";
$headers.="Content-type: text/html; charset=iso-8859-1\r\n";
$headers.="From: Administrador sistema < ajosuesosa@hotmail.com >\r\n";
$isSent=mail($receptor,$issue,$emailBody,$headers);




}

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet"href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">             
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>   
<script  src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="../Assets/tables.css">

</head>

<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">App</a>
    </div>
    <ul class="nav navbar-nav">

    <ul class="nav navbar-nav navbar-right">
      <li><a href="#"><span class="glyphicon glyphicon-user"></span>
      <?php $nombreUsuario=('Administrador: '.$_SESSION["user"]->getUserName().' '.$_SESSION["user"]->getUserLastName());
       echo $nombreUsuario ?></a></li></a></li>
      <li><a href="/ClientServiceControl/Controller/logout.php"><span class="glyphicon glyphicon-log-in"></span> Salir</a></li>
    </ul>
  </div>
</nav>
<h4> Fecha del servidor: <?php date_default_timezone_set('America/Costa_Rica'); $date = date('m/d/Y h:i', time()); echo $date     ?> </h4>
<h1> Todos los servicios registrados: </h1>

<table id="servicesTable" >
  <tr>
    <th>Id de servicio</th>
    <th>Tipo Servicio</th>
    <th>Fecha de vencimiento</th>
    <th>Descripci&oacute;n del servicio</th>
    <th>Estado</th>


  </tr>
  <?php
       $estado='';
       foreach($serviceList  as $service):
        date_default_timezone_set('America/Costa_Rica'); 
        $actualDate=date('Y-m-d ');
        if($service['expire_date']<$actualDate){
         $estado='Expirado';
        }else{
          $estado='Activo';
        }
       
       ?> 
      <tr>
      <td id="idUsuario" name="idUsuario"><?php echo $service['service_id']  ?></td>
      <td><?php echo $service['type_of_service']  ?></td>
      <td><?php echo $service['expire_date']  ?></td>
      <td><?php echo $service['description']  ?></td>
      <td><?php echo $estado ?></td>
      </tr>
      <?php
      endforeach;
      ?>
</table>
</body>
</html>