<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Teste de Popup Externo</title>
</head>
<style>
     *{
          box-sizing: border-box;
          padding: 0;
          margin: 0;
     }
     body{
          display: flex;
          flex-direction: column;
          gap: 8vh;
          background-color: rgb(222, 236, 249);
          align-items: center;
          justify-content: center;
     }
     .inicio{
          background-color: antiquewhite;
          height: 10vh;
          display: flex;
          align-items: center;
          justify-content: center;
          border: 1px black solid;
          box-shadow: 1px 1px 10px black;
          padding: 3%;
     }
     .centro{
          background-color: bisque;
          height: 20vh;
          display: flex;
          justify-content: center;
          align-items: center;
          font-size: 6vh;
          color: rgb(222, 236, 249);
          text-shadow: 1px 1px black;
          margin: 1vh 5vh;
          border-radius: 10px;
          display: flex;
          flex-direction: column;
          gap: 2vh;
          border: 1px black solid;
          box-shadow: 1px 1px 10px black;
          padding: 3%;
     }
     .entradas{
          height: 1%;
          width: 60%;
          background-color: aquamarine;
          display: flex;
          flex-direction: column;
          align-items: center;
          font-size: 3vh;
          gap: 1vh;
          text-transform: capitalize;
          border-radius: 20px;
          padding: 3%;
          text-shadow: 3px 1px 10px green;
          border: 1px black solid;
          box-shadow: 1px 1px 10px black;
     }
     input{
          padding: 1%;
          border: 1px solid black;
          border-radius: 10px;
          margin: 1%;
     }
     button{
          height: 3vh;
          width: 20%;
          box-shadow: -1px -1px 10px black;
     }
</style>
<body>
     <div class="inicio">
          <h1>TITULO BEM GRANDE</h1>
     </div>
     <div class="centro">
          <h2>Centro do Site</h2>
     </div>
     <div class="entradas">
          <h2>Campo de Login</h2>
          <p>Insira seu nome:</p>
          <input type="text" id="nomeTxt">
          <p>insira sua senha:</p>
          <input type="text" id="senhaTxt">
          <button id="enviar">enviar</button>
          <a href="../"></a>
         
     </div>
</body>
<script src="./js/jquery-3.7.1.js" type="text/javascript"></script>
<script>
     $("#enviar").on("click",async function(e){
          e.preventDefault();
          const nomeCompleto = $('#nomeTxt').val();
          const config = {
               method:'post',
               headers:{
                    'Accept': 'application/json',
                    'Content-Type' : 'application/json'
               },
               body:JSON.stringify({
                    nome:nomeCompleto
               })
          }
          const request = await fetch('../Controller/loginUsuario.php',config);
          const resposta =await request.json();
          const dados =resposta.dados;
          if(dados == false){
               alert('LOGIN NÃO ENCONTRADO');
          }
          else{
               alert("USUARIO ENCONTRADO"),window.location.href='../View/telaInicial.php'; 
          }
     });

</script>
</html>

