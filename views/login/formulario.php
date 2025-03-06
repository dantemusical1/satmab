<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../node_modules/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="../../node_modules/bootstrap-icons/font/bootstrap-icons.css">
    <title></title>
</head>
<body>
    
</body>
</html>
    <?php if (isset($error)) { ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php } ?>
    <div class="container">
        <div class="row justify-content-center pt-1 mt-5">
            <div class="col-md-5 formulario">
                <div class="card">
                    <div class="card-header">
                        <h5 class="text-center card-title">Inicio de sesión</h5>
                    </div>
                
                    <div class="card-body pt-5">
                        <!-- Aquí empieza el formulario -->
                        <form action="controller/login.php" method="post">
                            <div class="mb-3">
                                <div class="form-group">
                                    <label for="txtusuario">Usuario del sistema <i class="bi bi-person-circle"></i></label>
                                    <input class="form-control" type="text" name="txtusuario" id="txtusuario" placeholder="Cédula" aria-label="default input example" oninput="validateInput()" autocomplete="off">
                                    <div id="feedback" class="invalid-feedback">        
                                        La cédula debe tener entre 6 y 11 caracteres y solo puede contener números.
                                    </div>
                                    <div id="valid-feedback" class="valid-feedback">
                                        ¡Todo bien!
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Clave <i class="bi bi-key-fill"></i></label>
                                    <input type="password" class="form-control" name="txtpassword" id="exampleInputPassword1" placeholder="Clave" oninput="validatePasswordInput()" autocomplete="off">
                                    <div id="password-feedback" class="invalid-feedback">
                                        La clave debe tener al menos 5 caracteres.
                                    </div>
                                    <div id="password-valid-feedback" class="valid-feedback">
                                        ¡Todo bien!
                                    </div>
                                    <input type="checkbox" id="showPassword" onclick="togglePasswordVisibility()"> Mostrar contraseña
                                </div>
                            </div>

                            <div class="mb-3">
                                <select class="form-select" aria-label="Default select example" name="rol">
                                    <option selected disabled>Seleccione una opción</option>
                                    <option value="admin">Administrador</option>
                                    <option value="user">Usuario</option>
                                    <option value="tecnico">Técnico</option>
                                </select>
                            </div>

                            <div class="form-group mx-4 pt-4 pb-4">
                                <button type="submit" class="btn btn-primary form-control" value="Enviar" name="btnloginx"> Iniciar sesión </button>	
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>