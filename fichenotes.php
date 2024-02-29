<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

    function affichage($tab){
        echo "<pre>";       
        print_r($tab);
        echo "</pre>";
    }
    $matieres=["java"=>[14,15],"html"=>[13,18],"php"=>[17,15]];
    $etudiants=[
        "ali"=>["java"=>[14,5],"html"=>[13,15],"php"=>[17,14]],
        "salah"=>["java"=>[12,13],"html"=>[10,14.5],"php"=>[13,4]],
        "sami"=>["java"=>[10,15],"html"=>[13.5,18],"php"=>[15,19]]
        ];
$tab5=["java","html","js","css","angular","nodejs"];

//affichage($matieres);
//affichage($etudiants);
echo "<table border='1'>";
for($i=0;$i<sizeof($tab5);$i++){
    echo "<tr><td>$tab5[$i]</td></tr>";
}
echo "</table>";

$tab6=["java"=>[14,15,8],"html"=>[12.5,15,11],"js"=>[19.25,13,17],"css"=>[12,17,15],"angular"=>[8,14,13],"nodejs"=>[12,10,12]];
echo "<table border ='1'>
<tr>
<th>Nom matière</th>
<th>Note 1</th>
<th>Note 2</th>
<th>Note 3</th>
<th>Moyenne</th>
</tr>";
foreach ($tab6 as $matiere => $notes) {
    $moy=0;
    $som=0;
    echo "<tr>
            <td>$matiere</td>";
            foreach ($notes as $note) {
                echo "<td>$note</td>";
                $som+=$note;
            }
           $moy=round($som/count($notes),2);

        echo "<td>$moy</td></tr>";
}


echo "</table>";



?>
</body>
</html>