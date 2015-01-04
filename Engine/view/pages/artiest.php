<form action="/toevoegen/submit/artiest" method="POST">
    <table id="login">
        <tr>
            <td>naam:</td>
            <td><input name="naam" ></td>
        </tr>
        <tr>
            <td>omschrijving:</td>
            <td><input name="omschrijving" ></td>
        </tr>
        <tr>
            <td>begonnen:</td>
            <td><input name='start' type="date" ></td>
        </tr>
        <tr>
            <td>gestopt:</td>
            <td><input name='end' type="date" ></td>
        </tr>
        <tr>
            <td>genre(s):</td>
            <td>
                <?php foreach($genrelist as $genrenaam){
                    echo"<input type='checkbox' name='genre[]' value='$genrenaam'>$genrenaam<br />";
                }?>
            </td>
        </tr>
        <tr>
            <td></td>
            <td><input  type="submit" /></td>
        </tr>
    </table>
</form>