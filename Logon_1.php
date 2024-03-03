<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>ERP DiSur</title>
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
<link rel="stylesheet" href="CSS/style_login.css">


</head>
<body>
<div class="wrapper">
<section id="contenedor">
  <form action="funciones\Sir_Verificar.php" method="post">

    <h1>Distribuidora DiSur</h1>

    <div class="inset">
      <p>
       <div class="input-box">
          
          <input type="text" placeholder="Usuario" name="User" id="User" required>
          <i class='bx bxs-user'></i>
        </div>
      </p>
      <p>
        <div class="input-box">
          
          <input type="password" placeholder="Contraseña" name="PWD" id="PWD" required>
          <i class='bx bxs-lock' ></i>
        </div>
      </p>
      <p>
        <div class="remember-forgot">
          <input type="checkbox" name="remember" id="remember">
          <label for="remember">Recordar por 14 días</label>
      </p>
      <p class="p-container">
        <a href="#">¿ Olvidó su contraseña?</a>
      </p>
      
      </div>
    
      <p>
      
      <div>
        <br>
          <img src="funciones/genera_codigo.php" alt="Código de verificación" id="img-codigo">
          &nbsp;
          <button type="button" class="boton" id="regenera" > 
          <i class='bx bx-recycle'></i>
          </button>
        </div>
      
      <div class="input-box">
          
          <input type="text" placeholder="Código de verificación" name="codigo" id="codigo" required>
          <i class='bx bxs-doughnut-chart'></i>

        </div>
      
        
      </p>

    </div>
    
      <input type="submit" class="btn" name="go" id="go" value="Iniciar sesión">
        <div class="register-link">
            <p>No tengo una cuenta <a href="#">Registrar</a></p>
        </div>
    
  </form>
</section>
</div>

<script>
    const imgCodigo = document.getElementById('img-codigo')
    const btnGenera = document.getElementById('regenera')
    btnGenera.addEventListener('click', generaCodigo, false)

    function generaCodigo(){
      let url = 'funciones/genera_codigo.php'

      fetch(url)
      .then(response => response.blob())
      .then(data => {
        if(data){
          imgCodigo.src = URL.createObjectURL(data)
        }
      })

    }

</script>

</body>
</html>