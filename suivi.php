<?php
 if(isset($_POST['suivi'])){
   if(empty($_POST['username'])) die("<h1>information non valide</h1>") ;
   if(empty($_POST['pwd'])) die("<h1>information non valide</h1>") ;

    $myconn = mysqli_connect("localhost","root",""); 
    if($myconn==false) die("Connexion impossible");
    $selectdb = mysqli_select_db($myconn,"gestion_vote"); 
    if($selectdb==false) die("Database inaccessible");

 $username = $_POST['username'] ; 
 $pwd = $_POST['pwd'] ;

 $req = " select * from electeur e, condidat cd, compte c where c.username = '$username' and
 c.mot_pass = '$pwd' and c.username = cd.username and cd.cin = e.cin " ;
 $res = mysqli_query($myconn,$req) ;
 $nb = mysqli_num_rows($res) ;
 if($nb > 0) die("<h1>Carte en cours de préparation </h1>") ;
 else {
    echo "<h1>Condidat ne fait pas la demande ou Il n'as pas le droit pour créer la carte d'election ou Il n'a pas un compte</h1>" ;
 }
   mysqli_free_result($res) ;
   mysqli_close($myconn) ;   
}
?>