<?php
    $naam = $album->getNaam();
    $id = $album->getAlbumNummer();
    $verschenen = $album->getVerschijningsdatum()->format('Y-m-d');
    $genres = $album->getAllGenres();
    $artiesten = $album->getAllArtiesten();
    $liedjes = count($album->getLiedjes());
    $lokatie = $album->getLokatie();
    foreach ($genres as $genre){
        $genrenamen[] = $genre->getNaam();
    }
    foreach ($artiesten as $artiest){
        $artiestnamen[] = $artiest->getNaam();
    }
?>
<form action="/edit/submit/album" method="POST">
    <table id="login">
        <input type="hidden" value="<?=$id?>" name="albumnummer">
        <tr>
            <td>naam:</td>
            <td><input value="<?=$naam?>" name="naam" ></td>
        </tr>
        <tr>
            <td>verschenen:</td>
            <td><input value="<?=$verschenen?>" name='date' type="date" ></td>
        </tr>
        <tr>
            <td>genre:</td>
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
            <td>albumartiest:</td>
            <td>
                <select name='artiest'>
                    <?php foreach($artiestlijst as $artiest){
                        echo"<option ";
                        if($artiestnamen[0]==$artiest){
                            echo"selected ";
                        }
                        echo"value='$artiest'>$artiest</option><br />";
                    }?>
                <select>
            </td>
        </tr>
        <tr>
            <td>
                aantal liedjes
            </td>
            <td>
                <input disabled value="<?=$liedjes?>" name="liedjes" type="number" />
            </td>
        </tr>
        <tr>
            <td>
                locatie
            </td>
            <td>
                <select name='locatie'>
                    <option 
                        <?php
                            if($lokatie == 'computer'){
                                echo "selected";
                            }
                        ?>
                        value="computer">computer</option>
                    <option
                        <?php
                            if($lokatie == 'Auto'){
                                echo "selected";
                            }
                        ?>
                         value="auto">auto</option>
                    <option
                        <?php
                            if($lokatie == 'woonkamer'){
                                echo "selected";
                            }
                        ?>
                         value="woonkamer">woonkamer</option>
                    <option
                        <?php
                            if($lokatie == 'NAS'){
                                echo "selected";
                            }
                        ?>
                         value="NAS">NAS</option>
                <select>
            </td>
        </tr>
        <tr>
            <td></td>
            <td><input  type="submit" /></td>
        </tr>
    </table>
</form>