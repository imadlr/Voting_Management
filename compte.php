<?php
 if(isset($_POST['valider'])){
   if(empty($_POST['username'])) die("information non valide");
   if(empty($_POST['pwd'])) die("information non valide");
   if(empty($_POST['pwdc'])) die("information non valide");

    $myconn = mysqli_connect("localhost","root",""); 
    if($myconn==false) die("Connexion impossible");
    $selectdb = mysqli_select_db($myconn,"gestion_vote"); 
    if($selectdb==false) die("Database inaccessible");

 $username = $_POST['username'] ; 
 $pass = $_POST['pwd'] ;
 $cpass = $_POST['pwdc'] ;
 if(strcmp($pass,$cpass)!=0) die("<h1>mot de pass n'est pas identique</h1>") ;
 $req = " select * from compte where username = '$username' " ;
 $res = mysqli_query($myconn,$req) ;
 $nb = mysqli_num_rows($res) ;
 if($nb > 0) die("<h1>Condidat déja existe</h1>") ;
 else {
    $req = "insert into compte(username, mot_pass) values('$username', '$pass')" ;
    mysqli_query($myconn,$req) ;
    echo "<h1>compte creé !</h1>" ;
 }
   mysqli_free_result($res) ;
   mysqli_close($myconn) ;   
}
?>