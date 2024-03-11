<?php

//PARTE 1: SUBIR LA IMAGEN AL SERVIDOR WEB. NO SE ESTÁ SUBIENDO A LA BBDD. 
// Recibo los datos de la imagen
$dbname = 'uf3_daw1';
$nombre_img = $_FILES['imagen']['name'];
$user = $_POST['name'];
$tipo = $_FILES['imagen']['type'];
$tamano = $_FILES['imagen']['size'];
//Si existe imagen y tiene un tamaño correcto
if (!empty($nombre_img) && ($tamano <= 2000000)) 
{    

//indicamos los formatos que permitimos subir a nuestro servidor
if ( ($_FILES["imagen"]["type"] == "image/jpeg")
|| ($_FILES["imagen"]["type"] == "image/jpg")
|| ($_FILES["imagen"]["type"] == "image/png"))
{
    // Ruta donde se guardarán las imágenes que subamos
    $directorio = $_SERVER['DOCUMENT_ROOT'].'\PruebasCodigo\UF4\imgs\.';
    // Muevo la imagen desde el directorio temporal a nuestra ruta indicada anteriormente
    move_uploaded_file($_FILES['imagen']['tmp_name'],$directorio.$nombre_img);
} 
else 
    {
        //si no cumple con el formato
        echo "No se puede subir una imagen con ese formato ";
    }
} 
else 
{
//si existe la variable pero se pasa del tamaño permitido
if($nombre_img == !NULL) echo "La imagen es demasiado grande "; 
}


//PARTE 2: SUBIR LA IMAGEN A LA BBDD, A TRAVÉS DE LA RUTA.
/* en pasos anteriores deberíamos tener una conexión abierta a nuestra base de 
datos para ejecutar nuestra sentencia SQL */

/* con la siguiente sentencia le asignamos a nuestro campo de la tabla ruta_imagen 
el nombre de nuestra imagen */

try {
    $dsn = "mysql:host=localhost;dbname=$dbname";
    $password_db = '';
    $user_db = 'root';
    $dbh = new PDO($dsn, $user_db, $password_db);
} catch (PDOException $e){
    echo $e->getMessage();
}
//Como hacer una operación con PDO. (Forma 1)
// $stmt = $dbh->prepare("UPDATE usuarios SET ruta_imagen = ? WHERE idusuario = ?");
// $stmt->bindParam(1, $nombre_img);
// $stmt->bindParam(2, $user);

//Como hacer una operación con PDO. (Forma 2)
echo $user;
echo $nombre_img;
$stmt = $dbh->prepare("UPDATE usuarios SET ruta_imagen = :nombre_img WHERE idusuario = :nombre_user");
$stmt->bindValue(':nombre_img', $nombre_img);
$stmt->bindValue(':nombre_user', $user);

$stmt->execute();

/* volvemos a la página principal para cargar la imagen que hemos subido */
header("Location: paginaperfil.php");

?>