<div style="text-align: center; padding-top: 15vh;">

<p>Qr do seu Ingresso:<p>
<br>
<br>
<br>

<?php

$qr = $_POST['QR'];

echo "<img style='width:200px; height:200px;' src='https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=$qr' alt='QR Code' />";

?>

<br>
<br>
<br>
<br>
<br>


<button onclick="window.location.href='ingr.php'">Voltar</button>

</div>
