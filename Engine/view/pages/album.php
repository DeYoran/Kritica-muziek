<form action="/toevoegen/submit/album" method="POST">
    <table id="login">
        <tr>
            <td>naam:</td>
            <td><input name="naam" ></td>
        </tr>
        <tr>
            <td>verschenen:</td>
            <td><input name='date' type="date" ></td>
        </tr>
        <tr>
            <td>genre:</td>
            <td>
                <?php foreach($genrelist as $genrenaam){
                    echo"<input type='checkbox' name='genre[]' value='$genrenaam'>$genrenaam<br />";
                }?>
            </td>
        </tr>
        <tr>
            <td>albumartiest:</td>
            <td>
                <select name='artiest'>
                    <?php foreach($artiestlijst as $artiest){
                        echo"<option value='$artiest'>$artiest</option><br />";
                    }?>
                <select>
            </td>
        </tr>
        <tr>
            <td>
                aantal liedjes
            </td>
            <td>
                <input name="liedjes" type="number" />
            </td>
        </tr>
        <tr>
            <td>
                locatie
            </td>
            <td>
                <select name='locatie'>
                    <option value="computer">computer</option>
                    <option value="auto">auto</option>
                    <option value="woonkamer">woonkamer</option>
                    <option value="NAS">NAS</option>
                <select>
            </td>
        </tr>
        <tr>
            <td></td>
            <td><input  type="submit" /></td>
        </tr>
    </table>
</form>