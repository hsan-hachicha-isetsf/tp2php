<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
    session_start();

$tab_mat=[];
//delete matière

//Nouveau emploi
if(isset($_GET['action']) && $_GET['action']==="videremploi"){
    unset($_SESSION['tab_mat']);
    header("location:emploi.php");
}
if(isset($_GET['action'])&& $_GET['action']=="deletemat"){
    unset($_SESSION['tab_mat'][$_GET['jour']][$_GET['heure']]);
    }
 
if(isset($_SESSION['tab_mat']))
{
    $tab_mat=$_SESSION['tab_mat'];
}
    $heures=['08-09','09-10','10-11','11-12','12-13','13-14','14-15','15-16','16-17'];
    $jours=['lundi','mardi','mercredi','jeudi','vendredi','samedi'];
?>



<?php



if(isset($_POST['send'])){
    $jour=$_POST['jour'];
    $heure=$_POST['heure'];
    $matiere=$_POST['matiere'];
    $tab_mat["$jour"]["$heure"]=$matiere;
    $_SESSION['tab_mat']=$tab_mat;
}

?>


<form action="emploi.php" method="post">
    <label for="jours">Jours</label>
    <select name="jour" id="jour" required>
        <option>--Choisir jours--</option>
      <?php
        foreach ($jours as $jour ) {
            echo "<option>$jour</option>";
        }
      ?>
    </select>
    <label for="heure">Heure</label>
    <select name="heure" id="heure" required>
        <option>--choisir Heure--</option>
        <?php
        foreach ($heures as $heure ) {
            echo "<option>$heure</option>";
        }
      ?>
    </select>
    <label for="matiere">Matière</label>
<input type="text" name="matiere" required>
<button type="submit" name="send">Ajouter</button>
<button type="button" onclick="window.print()">imprimer emploi</button>
<button type="button" onclick="window.location.href='emploi.php?action=videremploi'">Nouveau emploi</button>

</form>
  
<?php    
echo "<h1>Emploi du temps</h1>";
echo "<small>".date("d/m/Y H:i:s")."</small>";
    echo "<table border ='1'><tr><td></td>";
        
        foreach ($heures as $heure ) {
            echo "<td>$heure</td>";
        }
 echo "</tr>";
 
 foreach ($jours as $jour) {
echo "<tr>
    <td>$jour</td>";

    foreach ($heures as $heure) {
        echo "<td>";
        if(isset($tab_mat["$jour"]["$heure"])){
                echo $tab_mat[$jour][$heure];
                echo "<a href='emploi.php?jour=$jour&heure=$heure&action=deletemat'><button>X</button></a>";
        }
        echo "</td>";
    }
echo "</tr>";

 }
echo "</table>";
?>
</body>
</html>