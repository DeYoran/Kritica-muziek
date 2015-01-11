<?php
    $naam = $artiest->getNaam();
    $oms = $artiest->getOmschrijving();
    $begin = $artiest->getBegindatum();
    if(isset($begin)){
        $begin = $begin->format('Y-m-d');
    }
    $eind = $artiest->getEindDatum();
    if(isset($eind)){
        $eind = $eind->format('Y-m-d');
    }
    $genres = $artiest->getAllGenres();
    $genrenamen = array();
    foreach ($genres as $genre){
        $genrenamen[] = $genre->getNaam();
    }
?>
<form action="/edit/submit/artiest" method="POST">
    <table id="login">
        <tr>
            <td>naam:</td>
            <td><input disabled value="<?=$naam?>" ><input type="hidden" value="<?=$naam?>" name="naam" ></td>
        </tr>
        <tr>
            <td>omschrijving:</td>
            <td><input value="<?=$oms?>" name="omschrijving" ></td>
        </tr>
        <tr>
            <td>begonnen:</td>
            <td><input value="<?=$begin?>" name='start' type="date" ></td>
        </tr>
        <tr>
            <td>gestopt:</td>
            <td><input value="<?=$eind?>" name='end' type="date" ></td>
        </tr>
        <tr>
            <td>genre(s):</td>
            <td>
                <?php foreach($genrelist as $genrenaam){
                    echo"<input type='checkbox' name='genre[]'";
                    if(in_array($genrenaam, $genrenamen)){
                        echo 'checked';
                    }
                    echo " value='$genrenaam'>$genrenaam<br />";
                }?>
            </td>
        </tr>
        <tr>
            <td></td>
            <td><input  type="submit" /></td>
        </tr>
    </table>
</form>