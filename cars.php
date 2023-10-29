<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $correo = $_POST["correo"];

    // Procesar la imagen si se subió
    if (isset($_FILES["imagen"])) {
        $nombreArchivo = $_FILES["imagen"]["name"];
        $rutaTemporal = $_FILES["imagen"]["tmp_name"];
        $destino = "carpeta_destino/" . $nombreArchivo;

        // Mover la imagen a la carpeta de destino
        move_uploaded_file($rutaTemporal, $destino);
    }

    // Configurar el mensaje del correo
    $mensaje = "Nombre: $nombre\n";
    $mensaje .= "Correo Electrónico: $correo\n";

    // Aquí puedes agregar más información al mensaje

    // Enviar el correo electrónico
    $destinatario = "anonimato076yt@gmail.com";  // Reemplaza con tu dirección de correo electrónico
    $asunto = "Nuevo formulario enviado";

    // Puedes personalizar la cabecera según tus necesidades
    $cabeceras = "From: $correo";

    // Enviar el correo
    mail($destinatario, $asunto, $mensaje, $cabeceras);
}
?>
