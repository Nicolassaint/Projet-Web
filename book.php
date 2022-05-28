<?php
    $mysqli = new mysqli('localhost', 'root', '', 'projetweb');
    $database = "projetweb";
    $db_handle = mysqli_connect('localhost', 'root', '');
    $db_found = mysqli_select_db($db_handle, $database);
    session_start();
    

if(isset($_GET['date'])){

    $mail=$_SESSION['mail'];
    $mail_e=$_SESSION['adresse_mail'];

    $date = $_GET['date'];
    $stmt = $mysqli->prepare("select * from rdv where jour = ? and mail_prof='$mail'");
    $stmt->bind_param('s', $date);
    $bookings = array();
    if($stmt->execute()){
        $result = $stmt->get_result();
        if($result->num_rows>0){
            while($row = $result->fetch_assoc()){
                $bookings[] = $row['heure'];
            }
            
            $stmt->close();
        }
    }
}

if(isset($_POST['submit'])){

    $mail=$_SESSION['mail'];
    $mail_e=$_SESSION['adresse_mail'];

    $sql = "SELECT * from rdv";
    $result = mysqli_query($mysqli, $sql);
 
    $stmt = $mysqli->prepare("select * from rdv where jour= ? and heure= ? and mail_prof='$mail'");
    
    $timeslot = $_POST['timeslot'];
    $stmt->bind_param('ss', $date, $timeslot);
    $bookings = array();
    if($stmt->execute()){
        $result = $stmt->get_result();
        if($result->num_rows>0){
            $msg = "<div class='alert alert-danger'>Booked already</div>";
            }else{
                $stmt = $mysqli->prepare("INSERT INTO rdv (mail_etudiant, mail_prof, jour, heure) VALUES (?,?,?,?)");
    $stmt->bind_param('ssss', $mail_e, $mail, $date, $timeslot);
    $stmt->execute();
    $msg = "<div class='alert alert-success'>Booking Successfull</div>";
    $bookings[]=$timeslot;
    $stmt->close();
    $mysqli->close();

        }
    }
}
$duration = 15;
$cleanup = 0;
$start = "09:00";
$end = "17:00";
$jour=$_GET['jour'];
$mail_p=$_SESSION['adresse_mail'];
$type=$_SESSION['profession'];


        if($jour=="monday" || $jour=="wednesday" || $jour=="friday"){
            if($type=="enseignant"){
            $duration = 30;
            $cleanup = 0;
            $start = "13:00";
            $end = "17:00"; 
            }else{
            $duration = 30;
            $cleanup = 0;
            $start = "10:00";
            $end = "14:00";
            }
        }elseif($jour=="tuesday" || $jour=="thursday"){
            if($type=="enseignant"){
            $duration = 30;
            $cleanup = 0;
            $start = "08:30";
            $end = "11:00"; 
            }else{
            $duration = 30;
            $cleanup = 0;
            $start = "14:00";
            $end = "17:30";
            }
        }else{
            $duration = 15;
            $cleanup = 0;
            $start = "09:00";
            $end = "17:00";
        }
        




function timeslots($duration, $cleanup, $start, $end){
    $start = new DateTime($start);
    $end = new DateTime($end);
    $interval = new DateInterval("PT".$duration."M");
    $cleanupInterval = new DateInterval("PT".$cleanup."M");
    $slots = array();
    
    for($intStart = $start; $intStart<$end; $intStart->add($interval)->add($cleanupInterval)){
        $endPeriod = clone $intStart;
        $endPeriod->add($interval);
        if($endPeriod>$end){
            break;
        }
        
        $slots[] = $intStart->format("H:i:s");//." - ". $endPeriod->format("H:iA");
        
    }
    
    return $slots;
}

?>
<!doctype html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title></title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/main.css">
  </head>

  <body>
    <div class="container">
        <h1 class="text-center">Book for Date: <?php echo date('m/d/Y', strtotime($_GET['date'])); ?></h1><hr>
        <div class="row">
            <div class="col-md-12">
                <?php echo(isset($msg))?$msg:""; ?>
            </div>
                <?php 
                      $timeslots = timeslots($duration, $cleanup, $start, $end);
                        foreach($timeslots as $ts){
                    ?>
                        <div class="col-md-2">
                            <div class="form-group">
                            <?php
                             if(in_array($ts, $bookings))
                             { ?>
                             <button class="btn btn-danger book"><?php echo $ts; ?></button>
                             <?php
                              }
                              else
                              { ?>
                             <button class="btn btn-success book" data-timeslot="<?php echo $ts; ?>"><?php echo $ts; ?></button>
                             <?php }  ?>  
                            </div>
                        </div>
                    <?php  } ?>
        </div>
    </div>
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Booking for: <span><?php echo $date;?></span></h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form action="" method="post">
                               <div class="form-group">
                                    <label for="">Time Slot</label>
                                    <input readonly type="text" class="form-control" id="timeslot" name="timeslot">
                                </div>
                                <div class="form-group">
                                    <label for="">Name</label>
                                    <p><?php echo $_SESSION['name'] ?>
                                </div>
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <p><?php echo $mail_e ?></p>
                                </div>
                                <div class="form-group pull-right">
                                    <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                
            </div>

        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script>
        
        $(".book").click(function(){
        var timeslot = $(this).attr('data-timeslot');
        $("#slot").html(timeslot);
        $("#timeslot").val(timeslot);
        $("#myModal").modal("show");
    })
    </script>
    

</body>

</html>