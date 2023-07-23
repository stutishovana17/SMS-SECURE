<?php
 $dbh=new PDO("mysql:host=localhost;dbname=secure sms","root","");
 $id=isset($_GET['id'])? $_GET['id']: " ";
 $stat = $dbh->prepare("select * from image where id=?");
 $stmt->bindparam(1,$id);
 $stmt->execute();
 $row = $stat->fetch();
 header('Content-Type:' .$row['mime']);
 echo $row['data'];
?>