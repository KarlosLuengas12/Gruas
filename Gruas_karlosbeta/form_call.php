<?php
session_start();

if (!isset($_SESSION['usuario_id']) || empty($_SESSION['usuario_id'])) {
    // Si el usuario no ha iniciado sesión, redirige de vuelta al login
    header('Location: login.php');
    exit();
}
else {
    $usuario_id = $_SESSION['usuario_id'];

    // Inicializa un mensaje vacío
    $mensaje = '';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Recuperar los valores del formulario
        $lugarRecoleccion = $_POST['lugarRecoleccion'];
        $localidad = $_POST['localidad'];
        $municipio = $_POST['municipio'];
        $folio = $_POST['folio'];
        $codigoPostal = $_POST['codigoPostal'];
        $region = $_POST['region'];
        $almacen = $_POST['almacen'];
        $contactos = $_POST['contactos'];
        $telefono = $_POST['telefono'];
        $ubicacion = $_POST['ubicacion'];
        $email_cliente = $_POST['email_cliente'];

        // Conexión a la base de datos (ajusta estos valores según tu configuración)
        $host = "localhost";
        $usu = "root";
        $contrasena = "";
        $base_de_datos = "gruask";

        $conexion = new mysqli($host, $usu, $contrasena, $base_de_datos);

        // Verificar la conexión
        if ($conexion->connect_error) {
            die("Error de conexión: " . $conexion->connect_error);
        }
        // Consulta SQL para obtener el IDUsuario si el campo email es igual a $email_cliente
        $sql1 = "SELECT IDUsuario FROM usuarios WHERE email =  '$email_cliente'";
        $resultado = $conexion->query($sql1);
        if ($resultado->num_rows > 0) {
            // Encontró un usuario con el correo electrónico proporcionado
            $fila = $resultado->fetch_assoc();
            $IDUsuario = $fila["IDUsuario"];
        } else {
            // No se encontró ningún usuario con el correo electrónico proporcionado
            $mensaje = array('texto' => 'Email no registrado.', 'clase' => 'alert-danger');
        }


        // Consulta SQL para insertar los datos en la tabla
        $sql = "INSERT INTO recoleccion (Lugar_de_Recoleccion, Colonia, Municipio, Folio, Codigo_Postal, Region, Corralon, Contactos, Telefono, Ubicacion, IDUsuario_fk)
            VALUES (?,?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("sssssssssss", $lugarRecoleccion, $localidad, $municipio, $folio, $codigoPostal, $region, $almacen, $contactos, $telefono, $ubicacion, $IDUsuario);

        if ($stmt->execute()) {

            $mensaje = array('texto' => 'Datos insertados con exito.', 'clase' => 'alert-success');
        } else {
            $mensaje = array('texto' => 'Error al insertar los datos.', 'clase' => 'alert-danger');
        }

        $stmt->close();
        $conexion->close();
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Formulario </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <style>
        body {
            background: url('img/GBP.jpeg') no-repeat center center fixed;
            background-size: cover;
            background-repeat: no-repeat;
        }

        form {
            background-color: rgba(128, 0, 0, 0.8);
            border-radius: 10px;
            padding: 20px;
            margin-top: 50px;
        }

        button {
            width: 100%;
            height: 5%;
        }
        #buttons button {
          width: 30%;
          margin: 5px;
          padding: 10px;
          font-size: 16px;
          background-color: #ccc;
          color: black;
          border: none;
          cursor: pointer;
    }   

        #logo {
          position: absolute;
            top: 100px;
            left: 5px;
            height: 200px;
            width: 200px;
        }
        #map {
      height: 400px;
      width: 100%;
    }
    #distanceLabel {
      background-color: transparent; 
      padding: 10px;
      position: absolute;
      top: 236px; 
      left: 142px;
      border: 1px solid #ccc;
      z-index: 1;
    }
   
    #result {
      text-align: center;
      margin-top: 20px;
    }
    .button-container {
      text-align: center;
      margin-top: 20px;
    }
    @media (max-width: 768px) {
      /* Estilos para pantallas pequeñas */
    }
    @media (min-width: 769px) and (max-width: 1024px) {
      /* Estilos para pantallas medianas */
    }
    @media (min-width: 1025px) {
      /* Estilos para pantallas grandes */
    }

    </style>
</head>

<body>

  <img id="logo" src="img/logo2.png" alt="Logo Gobierno de Puebla">
<nav class="navbar navbar-dark bg-danger">
  <div class="container">
      <a class="navbar-brand" >Servicios de Grua</a>
      <ul class="navbar-nav">
        <a href="form_call.php"  class="nav-link">Formulario Grua</a>
        <a href="list_c.php"  class="nav-link">Lista de corralones</a>
        <a href="registro_corr.php"  class="nav-link">Registro de corralones</a>

      </ul>
  </div>
</nav>
    <div class="container bg-danger bg-opacity-75 p-3">
        <h2 class="text-white">Formulario de Autollenado</h2>

        <form class="text-white" method="post" action="">
            <h1>Geolocalizacion</h1>
            <h1> </h1>
            <br>
            <br>
            <div id="map"></div>
            <div class="text-black" id="distanceLabel">Distancia: <span id="distanceValue">--</span></div>
            <br>
            <div class="row">
              
                <div class="col-md-6">
                    <h3 class="text-white">Puntos de Recolección</h3>
                    <div class="mb-3">
                        <label for="lugarRecoleccion" class="form-label text-white">Lugar de Recolección</label>
                        <input type="text" class="form-control" id="lugarRecoleccion" name="lugarRecoleccion" required>
                    </div>
                    <div class="mb-3">
                        <label for="localidad1" class="form-label text-white">Localidad o Colonia</label>
                        <input type="text" class="form-control" id="localidad1" name="localidad1" required>
                    </div>
                    <div class="mb-3">
                        <label for="municipio1" class="form-label text-white">Municipio</label>
                        <input type="text" class="form-control" id="municipio1" name="municipio1" required>
                    </div>
                    <div class="mb-3">
                        <label for="folio" class="form-label text-white">Folio</label>
                        <input type="text" class="form-control" id="folio" name="folio" required>
                    </div>
                    <div class="mb-3">
                        <label for="codigoPostal1" class="form-label text-white">Código Postal</label>
                        <input type="text" class="form-control" id="codigoPostal1" name="codigoPostal1" required>
                    </div>
                    <div class="mb-3">
                        <label for="contactos1" class="form-label text-white">Contactos</label>
                        <input type="text" class="form-control" id="contactos1" name="contactos1" required>
                    </div>
                </div>

                <div class="col-md-6">
                    <h3 class="text-white">Asignación de Almacén</h3>
                    <div class="mb-3">
                        <label for="region" class="form-label text-white">Región</label>
                        <input type="text" class="form-control" id="region" name="region" required>
                    </div>
                    <div class="mb-3">
                        <label for="almacen" class="form-label text-white">Corralon</label>
                        <input type="text" class="form-control" id="almacen" name="almacen" required>
                    </div>
                    <div class="mb-3">
                        <label for="municipio" class="form-label text-white">Municipio</label>
                        <input type="text" class="form-control" id="municipio" name="municipio" required>
                    </div>
                    <div class="mb-3">
                        <label for="telefono" class="form-label text-white">Teléfono</label>
                        <input type="text" class="form-control" id="telefono" name="telefono" required>
                    </div>
                    <div class="mb-3">
                        <label for="ubicacion" class="form-label text-white">Ubicación</label>
                        <input type="text" class="form-control" id="ubicacion" name="ubicacion" required>
                    </div>
                    <div class="mb-3">
                        <label for="localidad" class="form-label text-white">Localidad o Colonia</label>
                        <input type="text" class="form-control" id="localidad" name="localidad" required>
                    </div>
                    <div class="mb-3">
                        <label for="codigoPostal" class="form-label text-white">Código Postal</label>
                        <input type="text" class="form-control" id="codigoPostal" name="codigoPostal" required>
                    </div>
                    <div class="mb-3">
                        <label for="contactos" class="form-label text-white">Contactos</label>
                        <input type="text" class="form-control" id="contactos" name="contactos" required>
                    </div>
                </div>
            </div>
            
            <div class="mb-3">
                <label for="email_cliente" class="form-label text-white">Correo electronico del cliente</label>
                <input type="email" class="form-control" id="email_cliente" name="email_cliente" required>
            </div>
            <h3>Seleccione el tipo de grua</h3>

            <div id="buttons">
              <button onclick="calculateCost(1000)" id="gruaA">Grúa A -$1000</button>
              <button onclick="calculateCost(500)" id="gruaB">Grúa B - $500</button>
              <button onclick="calculateCost(100)" id="gruaC">Grúa C - $100</button>
            </div>
            <div id="result">
              <strong>Costo Total:</strong> $<span id="totalCost">--</span>
            </div>          
            <button type="submit" class="btn btn-vino btn-lg text-white text-white">Enviar</button>
            
        </form>
        
        <script>
    var map;
    var directionsService;
    var directionsDisplay;
    var geocoder;
    var distanceLabel = document.getElementById('distanceValue');
    var lugarRecoleccion = document.getElementById('lugarRecoleccion');
    var ubicacionInput = document.getElementById('ubicacion');
    var localidadInput = document.getElementById('localidad');
    var municipioInput = document.getElementById('municipio');
    var codigoPostalInput = document.getElementById('codigoPostal');
    //puntos de recoleccion
    var municipio1Input = document.getElementById('municipio1');
    var localidad1Input = document.getElementById('localidad1');
    var codigoPostal1Input = document.getElementById('codigoPostal1');
    var almacenInput = document.getElementById('almacen')
    var closestMarker; 
    var totalCostLabel = document.getElementById('totalCost');

    // Función para inicializar el mapa
    function initMap() {
      // Coordenadas de Puebla
      var puebla = { lat: 19.0414, lng: -98.2063 };

      // Crear un mapa centrado en Puebla
      map = new google.maps.Map(document.getElementById('map'), {
        zoom: 12,
        center: puebla
      });

      directionsService = new google.maps.DirectionsService();
      directionsDisplay = new google.maps.DirectionsRenderer();
      directionsDisplay.setMap(map);
      geocoder = new google.maps.Geocoder();

      // Array de ubicaciones con sus coordenadas
      var locations = [
        { 
        name: 'Corralon 1',
        lat: 19.0447,
        lng: -98.1979,
        address: 'Av 2 Ote , Centro histórico de Puebla',
        localidad: 'Puebla',
        municipio: 'Pue.',
        codigoPostal: '72000'
    },
    {
      name: 'Corralon 2',
      lat:19.0345,
      lng:-98.2108,
      address:'Av. 33 Pte. 702',
      localidad: 'Chulavista',
      municipio: 'Pue.',
      codigoPostal: '72420'
    },
    {
      name: 'Corralon 3',
      lat:19.0620,
      lng:-98.3050,
      address:'Calle 2 Nte. 6, Centro',
      localidad: 'Centro',
      municipio: 'Cholula',
      codigoPostal: '72760'
    },
    {
      name: 'Corralon 4',
      lat:19.0458,
      lng:-98.1972,
      address:'Av. 4 Ote. 6',
      localidad: 'Centro histórico de Puebla',
      municipio: 'Pue.',
      codigoPostal: '72500'
    },
    {
      name: 'Corralon 5',
      lat:19.0505,
      lng:-98.1857,
      address:'Calz. de los Fuertes 6, Rincón del Bosque',
      localidad: 'Rincon del bosque',
      municipio: 'Pue.',
      codigoPostal: '72290'
    },
    {
      name: 'Corralon 6',
      lat:19.0400,
      lng:-98.2200,
      address:'Av. 31 Pte. 2114',
      localidad: 'Los Volcanes',
      municipio: 'Pue',
      codigoPostal: '72410'
    },
    {
      name: 'Corralon 7',
      lat:19.0300,
      lng:-98.2000,
      address:'Av. Manuel Espinosa Yglesias 620',
      localidad: 'Ladrillera de Benítez',
      municipio: 'Pue.',
      codigoPostal: '72530'
    },
    {
      name: 'Corralon 8',
      lat:19.0550,
      lng:-98.2075,
      address:'Av 12 Pte 1522',
      localidad: 'San Miguelito',
      municipio: 'Puebla',
      codigoPostal: '72000'
    },
    {
      name: 'Corralon 9',
      lat:19.0650,
      lng:-98.2200,
      address:'Calle 37 Nte 1035',
      localidad: 'Villa Posadas',
      municipio: 'Pue',
      codigoPostal: '72060'
    },
    {
      name: 'Corralon 10',
      lat:19.0700,
      lng:-98.1900,
      address:'Calle 52 poniente 701B',
      localidad: 'Guadalupe Victoria,',
      municipio: 'Pue',
      codigoPostal: '72230'
    },
      ];

      // Agregar marcadores para cada ubicación
      var markers = locations.map(function(location) {
        var marker = new google.maps.Marker({
          position: { lat: location.lat, lng: location.lng },
          map: map,
          title: location.name
        });
        return marker;
      });

      // Agregar un evento de clic al mapa
      google.maps.event.addListener(map, 'click', function(event) {
        closestMarker = findClosestMarker(event.latLng, markers);
        if (closestMarker) {
            calculateAndDisplayRoute(event.latLng, closestMarker.getPosition());
            reverseGeocode(event.latLng);
        }
      });

      // Función para encontrar el marcador más cercano
      function findClosestMarker(clickedLatLng, markerArray) {
        var closestMarker = null;
        var closestDistance = Number.MAX_VALUE;

        markerArray.forEach(function(marker) {
          var markerLatLng = marker.getPosition();
          var distance = google.maps.geometry.spherical.computeDistanceBetween(clickedLatLng, markerLatLng);

          if (distance < closestDistance) {
            closestDistance = distance;
            closestMarker = marker;
          }
        });

        return closestMarker;
      }

      // Función para calcular y mostrar la ruta
      function calculateAndDisplayRoute(origin, destination) {
        var request = {
          origin: origin,
          destination: destination,
          travelMode: 'DRIVING'
        };
        directionsService.route(request, function(response, status) {
          if (status === 'OK') {
            directionsDisplay.setDirections(response);
            var distance = response.routes[0].legs[0].distance.text;
            distanceLabel.textContent = distance;
            lug = getMarkerAddress(closestMarker.getTitle());
          }
        });
      }

        
        function getMarkerAddress(markerTitle) {
          var location = locations.find(function(location) {
            return location.name === markerTitle;
          });

          if (location) {
            ubicacionInput.value = location.address;
            localidadInput.value = location.localidad;
            municipioInput.value = location.municipio;
            codigoPostalInput.value = location.codigoPostal;
            return location.address;
          } else {
            return location ? location.address : 'Dirección no encontrada';
          }
        }

      function reverseGeocode(location, marker) {
  geocoder.geocode({ 'location': location }, function(results, status) {
    if (status === 'OK' && results[0]) {
      var place = results[0];

      var codigoPostalInput = document.getElementById('codigoPostal');
      var codigoPostal1Input = document.getElementById('codigoPostal1');

      place.address_components.forEach(function(component) {
        if (component.types.includes('locality')) {
          localidad1Input.value = component.long_name;
        }
        if (component.types.includes('postal_code')) {
          //codigoPostalInput.value = component.long_name;
          codigoPostal1Input.value = place.address_components.find(function(component) {
            return component.types.includes('postal_code');
          }).long_name;
        }
        if (component.types.includes('sublocality')) {
          //municipioInput.value = component.long_name;
          municipio1Input.value = place.address_components.find(function(component) {
            return component.types.includes('sublocality');
          }).long_name;
        }
      });
      lugarRecoleccion.value = place.formatted_address;
      ubicacion1Input.value = place.formatted_address;
      localidad1Input.value = place.name;
      codigoPostal1Input.value = place.name;
    }
  });
}

  function calculateCost(gruaPrice) {
      var distance = parseFloat(distanceLabel.textContent);
      var costoTotal = 87 * distance * gruaPrice;
      totalCostLabel.textContent = costoTotal.toFixed(2);
    }
  }
  </script>
  <!-- Incluir la API de Google Maps con tu clave -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAAn8CzW6tHD-lPlO8SjK0ks46r3udQwgQ&callback=initMap" async defer></script>
        <?php
        if ($mensaje) {
            echo '<div class="alert ' . $mensaje['clase'] . '" role="alert">' . $mensaje['texto'] . '</div>';
        }
        ?>
        <form method="post" action="destsess.php">
            <input type="submit" class="btn btn-danger  " name="cerrar_sesion" value="Cerrar Sesión">
        </form>
    </div>
</body>

</html>
