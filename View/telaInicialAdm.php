<?php
    $nome = $_GET['nome'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
</head>
<style>
     *{
          box-sizing: border-box;
          padding: 0;
          margin: 0;
     }
     .tudo{
          background-color: black;
          display: flex;
          height: 50vh;
          gap: 8px;
          align-items: center;
          justify-content: center;

     }
     .tudo h1{
          color: aquamarine;
          font-size: 30px;
     }
     .tudo p{
          color: red;
          font-size: 30px;
     }
     button{
          text-align: center;
          height: 10vh;
          width: 10vh;
          margin-left: 50vh;
     }
     .usuarios{
          display: flex;
          align-items: center;
          justify-content: center;
          flex-direction: column;
     }
     .usuarios p{
          font-size: 5vh;
          color: red;
          font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
     }
</style>
<body>
     <div class="tudo">
          <h1>Bem Vindo </h1><p><?php echo $nome?></p>
     </div>
     <div class="usuarios">
     <h2>Lista de Usuarios</h2>
     <p id="listar"></p>
     <button onclick="listarUsuario()">testar</button>
     </div>

</body>
</html>
<script src="./js/jquery-3.7.1.js" type="text/javascript"></script>
<script>
     const valorNulo = 0;
     const list =document.getElementById('listar');
     const config = {
               method:'post',
               headers:{
                    'Accept': 'application/json',
                    'Content-Type' : 'application/json'
               },
               body:JSON.stringify({
                    nulo:valorNulo
               })
          }
     async function listarUsuario(){
          const request = await fetch('../Controller/listarUsuario.php',config);
          const resposta =await request.json();
          const retorno = resposta.dados;
          const nomes = retorno.map(usuario => usuario.nome);
          list.innerHTML = nomes;
     }
</script>