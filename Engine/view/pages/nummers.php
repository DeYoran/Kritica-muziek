<form action="/toevoegen/submit/liedjes" method="POST">
    <table id="login">
        <?php
            $i = 0;
            while($i < $liedjes){?>
        <tr>
            <td>naam</td>
            <td><input name='lied[<?=$i?>][naam]' type='text'><input type="hidden" name="albumnummer" value="<?=$albumnummer?>" /></td>
        </tr>
        <tr>
            <td>album</td>
            <td><input name='lied[<?=$i?>][album]' type='text' value='<?=$naam?>' disabled></td>
        </tr>
        <tr>
            <td>pad</td>
            <td><input name='lied[<?=$i?>][pad]' type='text'></td>
        </tr>
        <tr>
            <td>
                artiesten
            </td>
            <td>
            <?php
                echo "<input type='checkbox' name='lied[$i][artiesten][]' checked value='$albumartiest'>$albumartiest<br />";
                foreach ($artiesten as $artiest){
                    if($artiest != $albumartiest){
                        echo "<input type='checkbox' name='lied[$i][artiesten][]' value='$artiest'>$artiest<br />";
                    }
                }
            ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td>
                genres
            </td>
            <td>
            <?php
                foreach ($genres as $genre){
                        echo "<input type='checkbox' checked name='lied[$i][genres][]' value='$genre'>$genre<br />";
                }
                foreach ($allegenres as $genre){
                    if(!in_array($genre, $genres)){
                        echo "<input type='checkbox' name='lied[$i][genres][]' value='$genre'>$genre<br />";
                    }
                }
            ?>
            </td>
        </tr>
        <tr>
            <td><hr></td>
            <td><hr></td>
        </tr>
        
        <?php
               $i++;
            }
        ?>
        <tr>
            <td>&nbsp;</td>
            <td><input type="submit"></td>
        </tr>
    </table>
</form>