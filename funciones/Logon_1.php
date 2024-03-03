<!DOCTYPE html>
<html>
<head>
<title>ERP DiSur</title>


<link rel="stylesheet" href="CSS/css_login.css">

</head>
<body>

<form action="funciones\Sir_Verificar.php" method="post">
  <h1>Distribuidora DiSur</h1>
  <div class="inset">
  <p>
    <label for="User">USUARIO</label>
    <input type="text" name="User" id="User">
  </p>
  <p>
    <label for="PWD">CONTRASEÑA</label>
    <input type="password" name="PWD" id="PWD">
  </p>
  <p>
    <input type="checkbox" name="remember" id="remember">
    <label for="remember">Recordar por 14 días</label>
  </p>

  <p>
    <label for="codigo">Código de verificación</label>
    <input type="password" name="codigo" id="codigo">
  </p>

  </div>
  <p class="p-container">
    <span>¿ Olvidó su contraseña?</span>
    <input type="submit" name="go" id="go" value="Iniciar sesión">
  </p>
</form>
</body>
</html>