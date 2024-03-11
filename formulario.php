<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="styles/style.css" rel="stylesheet" type="text/css">
    <script src="scripts/myscript.js"></script> 
    <title>Formulario Ejemplo</title>
</head>
<body>
<header>
	<h1>Contact us</h1>
</header>

<div id="form">

<div class="fish" id="fish"></div>
<div class="fish" id="fish2"></div>

<form id="waterform" method="post" enctype="multipart/form-data" action="resultadoForm.php">

<div class="formgroup" id="name-form">
    <label for="name">Username</label>
    <input type="text" id="name" name="name" />
</div>

<div class="formgroup" id="email-form">
    <label for="email">Your e-mail*</label>
    <input type="email" id="email" name="email" />
</div>

<div class="formgroup" id="message-form">
    <label for="message">Your message</label>
    <textarea id="message" name="message"></textarea>
</div>
<div class="formgroup" id="message-form">
    <label for="imagen">Imagen:</label> 
    <input id="imagen" name="imagen" size="30" type="file">
</div>

	<input type="submit" value="Send your message!" />
    <img style='width: 150px;' src='imgs\IMG-20180606-WA0002.jpg'  alt='imagen de perfil'>
</form>
</div>
</body>
</html>

