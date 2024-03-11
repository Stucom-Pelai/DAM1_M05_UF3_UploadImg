<?php
/* lanzamos la consulta para traernos el nombre de la imagen, en nuestro caso 
el campo ruta_imagen se encuentra en la tabla usuarios */ 
$dbname = 'uf3_daw1';
try {
    $dsn = "mysql:host=localhost;dbname=$dbname";
    $password_db = '';
    $user_db = 'root';
    $dbh = new PDO($dsn, $user_db, $password_db);
} catch (PDOException $e){
    echo $e->getMessage();
}
$stmt = $dbh->prepare("SELECT * FROM usuarios");
// Especificamos el fetch mode antes de llamar a fetch()
$stmt->setFetchMode(PDO::FETCH_ASSOC);
// Ejecutamos
$stmt->execute();
// Mostramos los resultados
while ($row = $stmt->fetch()){
   $ruta_img = $row["ruta_imagen"];
}
$root = $_SERVER['DOCUMENT_ROOT'];
echo("<img style='width: 150px;' src='imgs\\$ruta_img'  alt='imagen de perfil'>");

?>