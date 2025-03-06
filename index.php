<?php
include('config/conexion.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.css">
    <title>Principal</title>
</head>
<body>
<?php
include('menu.php');
?>

<?php
function obtenerPrecioDolar($monitor = null, $pagina = null) {
    $url = "https://pydolarve.org/api/v1/dollar?";

    if ($monitor) {
        $url .= "monitor=" . urlencode($monitor);
    } elseif ($pagina) {
        $url .= "page=" . urlencode($pagina);
    } else {
        return "Debes especificar un monitor o una página.";
    }

    $respuesta = file_get_contents($url);

    if ($respuesta === FALSE) {
        return "Error al obtener datos de la API.";
    }

    $datos = json_decode($respuesta, true);

    if ($datos && isset($datos['price'])) {
        return $datos['price'];
    } else {
        return "Precio no encontrado en la respuesta de la API.";
    }
}

// Ejemplo de uso:
$precioEnParalelo = obtenerPrecioDolar("enparalelovzla");
$precioBCV = obtenerPrecioDolar(null, "bcv");

echo "Precio EnParaleloVzla: " . $precioEnParalelo . "<br>";
//echo "Precio BCV: " . $precioBCV;
?>

<?php
/*
$curl = curl_init();
  curl_setopt_array($curl, [
  CURLOPT_URL => "https://ve.dolarapi.com/v1/dolares/oficial",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}*/
?>



<?php
$curl = curl_init();
curl_setopt_array($curl, [
    CURLOPT_URL => "https://ve.dolarapi.com/v1/dolares/oficial",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
    echo "cURL Error #:" . $err;
} else {
    $data = json_decode($response, true);

    if ($data && isset($data['promedio'])) {
        echo $data['promedio']; 
    } else {
        echo "Precio no encontrado en la respuesta.";
    }
}
?>

<a href="reporte.php" class="btn btn-primary">excel</a>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            </div>
    </div>

    <div class="row">
        <div class="div">
            <h1>Reporte de Ventas</h1>
            <strong>Precio del dólar</strong>
        </div>
        <div class="col-6">
            <div class="card" style="width: 18rem;">
                <img src="assets/img/moto.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Pago de impuesto por moto</h5>
                    <p class="card-text">Un texto de ejemplo rápido para colocal cerca del título de la tarjeta y componer la mayor parte del contenido de la tarjeta.</p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Un elemento</li>
                    <li class="list-group-item">Un segundo elemento</li>
                    <li class="list-group-item">Un tercer elemento</li>
                </ul>
                <div class="card-body">
                    <a href="#" class="card-link">Enlace de tarjeta</a>
                    <a href="#" class="card-link">Otro enlace</a>
                </div>
            </div>
        </div>


    </div>
    <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>
    <script src="node_modules/@popperjs/core/dist/umd/popper.js"></script>
</body>
</html>