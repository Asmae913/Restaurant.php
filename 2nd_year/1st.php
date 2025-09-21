<?php
$host='localhost';
$password='';
$user='root';
$charset='utf8mb4';
$dbname='php1';
$txt="mysql:host=$host;dbname=$dbname;charset=$charset";
$pdo=new PDO($txt,$user,$password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$table1="CREATE TABLE IF NOT EXISTS TB1(ID INT)";
$pdo->exec($table1);
$insert1="INSERT INTO TB1(ID) VALUES(:id)";
$ins1=$pdo->prepare($insert1);
$ins1->execute([
    ':id'=>308
]);
$select1="SELECT * FROM TB1 WHERE ID>=?";
$sel1=$pdo->prepare($select1);
$sel1->execute([200]);
foreach ($sel1->fetchAll(PDO::FETCH_ASSOC) as $key) {
    echo $key['ID'].'<br>';
}
$update1="UPDATE TB1 SET ID=:ID1 WHERE ID>=:ID2";
$up1=$pdo->prepare($update1);
$up1->execute([
    ':ID1'=>540,
    ':ID2'=>560
]);
$delete1="DELETE FROM TB1 WHERE ID<=:ID1";
$del1=$pdo->prepare($delete1);
$del1->execute([
    ':ID1'=>200
]);
$drop1="DROP TABLE T0";
$pdo->exec($drop1);
$alter1="ALTER TABLE TB1 CHANGE ID PRICES FLOAT";
$pdo->exec($alter1);
?>