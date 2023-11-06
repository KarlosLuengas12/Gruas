<php>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cambio de contraseña</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <style>
            body {
                background: url('img/GBP.jpeg') no-repeat center center fixed;
                background-size: cover;
                background-repeat: no-repeat;
            }
    
            .login-container {
                background-color: rgba(128, 0, 0, 0.8);
                border-radius: 10px;
                padding: 20px;
                margin-top: 50px;
            }
    
            #logo {
                height: 200px;
                width: 200px;
                position: absolute;
            }
            .btn-vino {
                
    
                width: 100%;
    
                height: 20%;
    
            }
        </style>
    </head>
    <body>
    <nav class="navbar navbar-dark bg-danger">
  <div class="container">
      <a class="navbar-brand" >Servicios de Grua</a>
      <ul class="navbar-nav">
          <li class="nav-item">
              <a class="nav-link" href="index.php">Inicio</a>
          </li>
         
    

      </ul>
  </div>

</nav>
<img id="logo" src="img/logo2.png" alt="Logo Gobierno de Puebla">
    <div class="container">
    
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <div class="login-container">
                  
                    <h3 class="text-white">Cambio de contraseña</h3>
                    <form class="text-white">

                        <div class="mb-3">
                            <label for="correo" class="form-label">Correo Electrónico</label>
                            <input type="email" class="form-control" id="correo" name="correo" required>
                        </div>
                        <div class="mb-3">
                            <label for="contrasena" class="form-label">Contraseña</label>
                            <input type="password" class="form-control" id="contrasena" name="contrasena" required>
                        </div>
                        <div class="mb-3">
                            <label for="nueva-contrasena" class="form-label">nueva Contraseña</label>
                            <input type="password" class="form-control" id="nueva-contrasena" name="nueva-contrasena" required>
                        </div>
                        <button  type="submit" class="btn btn-vino btn-lg text-white">Cambiar</button>
                        <a href="login.php" class="btn btn-link">Inicio de sesion</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    
    </body>
    </html>
    
    </php>