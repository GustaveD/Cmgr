<?php
echo '
<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Titre de la page</title>
  <script src="script.js"></script>
</head>
<body>
<div>
<video id="video" width="640" height="480" autoplay></video>
</div>
<div>
<button onclick="takepick()" id="snap">Snap Photo</button>
</div>
<div>
	<input type="button" onclick="uploadEx()" value="Upload" />
</div>
<form method="post" accept-charset="utf-8" name="form1">
	<input name="hidden_data" id="hidden_data" type="hidden"/>
	</form>
<div>
<canvas id="canvas" width="640" height="480"></canvas>
</div>
</body>
</html>';

?>
