<php>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Gobierno de Puebla</title>
    
    <!-- Agregar los enlaces a los archivos CSS de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <!-- Estilos personalizados para los botones -->
    <style>
        body {
            background: url('img/GBP.jpeg') no-repeat center center fixed;
            background-size: cover;
        }
        #logo {
            position: absolute;
            top: 100px;
            left: 5px;
            height: 200px;
            width: 200px;
        }
        .btn-vino {
            

            width: 30%;

            height: 50%;

        }
        img{

            height: 800px;
            width: 1200px;
        }

    </style>
</head>
<body>

<!-- Logo del Gobierno de Puebla en la esquina superior izquierda -->
<img id="logo" src="img/logo2.png" alt="Logo Gobierno de Puebla">

<nav class="navbar navbar-dark bg-danger">
  <div class="container">
      <a class="navbar-brand" >Servicios de Grua</a>
      <ul class="navbar-nav">
          <li class="nav-item">
              <a class="nav-link" href="login.php">Inicio de sesion</a>
          </li>
         
      </ul>
  </div>
</nav>

<div class="container mt-5">
  <div class="row">
      <div class="col-12 text-center text-white">
          <h1>Bienvenido a Nuestros Servicios de Grua</h1>
          <p>Estamos aquí para ayudarte en situaciones de emergencia en la carretera.</p>
      </div>
      <div class="col-12 text-center text-white">
        <h1>Numero de contacto: xxx-xxx-xxxx</h1>
      </div>

      <div class="col-12 text-center text-white">
        <h1>Biografia del sitio web</h1>
        <p class="p-3 bg-danger bg-opacity-10 border border-danger border-start-0 rounded-end" >Esta informacion mostrara el funcionamiento del sitio web
            (la informacion mostrada es de una version beta del sitio, se actualizara conforme al desarrollo del mismo).
            
          
        </p>
        
      </div>
      <div class="col-12 text-center text-white"><h1>Inicio</h1>
      <p class="p-3 bg-danger bg-opacity-10 border border-danger border-start-0 rounded-end">
        El sitio web inicia aqui donde se obtendra informacion basica del sitio como el numero telefonico, Inicio de sesion y la Biografia del sitio. 
        <br>
            <img  src="img/inicio1.jpg" alt="Inicio">
    </p>
    </div>
    <div class="col-12 text-center text-white"><h1>Login</h1>
      <p class="p-3 bg-danger bg-opacity-10 border border-danger border-start-0 rounded-end">
        En este apartado se iniciara sesion con dos tipos de usuarios Cliente y Callcenter, tambien se tiene acceso al registro que solo sera exclusivamente para Clientes.
        <br>
            <img  src="img/login.jpg" alt="Login">
      </p>
      </div>
      <div class="col-12 text-center text-white"><h1>Registro</h1>
      <p class="p-3 bg-danger bg-opacity-10 border border-danger border-start-0 rounded-end">
        El registro como lo mensione antes es solo para Clientes ya 
        que aqui se almacenaran datos de todos nuestros Clientes para poderles dar un mejor servicio y mayor seguridad con sus datos.
        <br>
            <img  src="img/registro.jpg" alt="Registro">
      </p>
      </div>
      <div class="col-12 text-center text-white"><h1>Cliente</h1>
      <p class="p-3 bg-danger bg-opacity-10 border border-danger border-start-0 rounded-end">
        Del lado del Cliente se motrara el Historial , donde tendra todos los datos referentes a todos los servicios que pedido, esto incluye Region, 
        Municipio, Corralon, Colonia, Ubicacion y Costo.
        <br>
            <img  src="img/cliente.jpg" alt="Cliente">
      </p>
      </div>
      <div class="col-12 text-center text-white"><h1>Callcenter</h1>
      <p class="p-3 bg-danger bg-opacity-10 border border-danger border-start-0 rounded-end">
        Del lado del Callcenter se manejaran todos los datos referentes al insidente, Ubicacion, Municipio, Region, datos del Corralon y precio del traslado 
        <br>
            <img  src="img/call1.jpg" alt="Callcenter">
            <br>
            <br>
            <img  src="img/call2.jpg" alt="Callcenter">
      </p>
      </div>
      
  </div>
</div>


</body>
</html>

</php>