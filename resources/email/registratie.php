<?php
    $message = <<<EOF
<h3>registratieverzoek van $_POST[naam]</h3><br />
$_POST[naam] heeft een registratieverzoek gestuurd<br />
<a href='http://$_SERVER[HTTP_HOST]/accepteren/$_POST[naam]'>accepteren</a>
<a href='http://$_SERVER[HTTP_HOST]/weigeren/$_POST[naam]'>weigeren</a>
EOF;
