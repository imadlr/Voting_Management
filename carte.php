<?php
 if(isset($_POST['envoyer'])){
   if(empty($_POST['nom'])) die("information non valide");
   if(empty($_POST['prenom'])) die("information non valide");
   if(empty($_POST['cin'])) die("information non valide");
   if(empty($_POST['region'])) die("information non valide");
   if(empty($_POST['localite'])) die("information non valide");
   if(empty($_POST['lieu_naiss'])) die("information non valide");
   if(empty($_POST['date_naiss'])) die("information non valide");
   if(empty($_POST['username'])) die("information non valide");

    $myconn = mysqli_connect("localhost","root",""); 
    if($myconn==false) die("Connexion impossible");
    $selectdb = mysqli_select_db($myconn,"gestion_vote"); 
    if($selectdb==false) die("Database inaccessible");

 $nom = $_POST['nom'] ;
 $prenom = $_POST['prenom'] ;
 $cin = $_POST['cin'] ;
 $region = $_POST['region'] ;
 $localite = $_POST['localite'] ;
 $lieu_naiss = $_POST['lieu_naiss'] ;
 $date_naiss = $_POST['date_naiss'] ;
 $username = $_POST['username'] ;
 $req = " select * from condidat where username = '$username' " ;
 $res = mysqli_query($myconn,$req) ;
 $nb = mysqli_num_rows($res) ;
 if($nb > 0) echo "<h1>Condidat déja Existe</h1>" ;
  else {
    $req = "insert into condidat(nom, prenom, cin, region, localite, lieu_naiss, date_naiss,username) values('$nom', '$prenom', '$cin', '$region', '$localite', '$lieu_naiss','$date_naiss', '$username')" ;
    mysqli_query($myconn,$req) ;
   $date = getdate();
   $y1 = $date['year'] ;
   $y2 = substr($date_naiss,0,4) ;
   $y = (int) $y1 - (int) $y2 ;
    if($y > 18) {
      $req = "insert into electeur(nom, prenom, cin) values('$nom', '$prenom', '$cin')" ;
      mysqli_query($myconn,$req) ;
   }
    echo "<h1>Demande Envoyé!</h1>" ;
 
      }
   mysqli_free_result($res) ;
   mysqli_close($myconn) ;   
}
?>