<?php
    $naam = $genre->getNaam();
    $oms = $genre->getOmschrijving();
?>
<form action="/edit/submit/genre" method="POST">
    <table id="login">
        <tr>
            <td>naam:</td>
            <td><input disabled value="<?=$naam?>"><input type="hidden" value="<?=$naam?>" name="naam" ></td>
        </tr>
        <tr>
            <td>omschrijving:</td>
            <td><input value="<?=$oms?>" name="omschrijving" ></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" /></td>
        </tr>
    </table>
</form>