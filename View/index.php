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
          background-color: rebeccapurple;
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
          font-size: 3vh;
          color: rgb(74, 219, 219);
          text-shadow: 1px 1px black;
          margin: 1vh 5vh;
          border-radius: 10px;
          display: flex;
          flex-direction: column;
          border: 1px black solid;
          box-shadow: 1px 1px 10px black;
          padding: 3%;
     }
     .centro p{
          color: rgb(74, 219, 219);
          font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
     }
     .entradas{
          height: 1%;
          width: 60%;
          background-color: rgb(4, 101, 69);
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
     .newUser{
          display: flex;
          flex-direction: column;
          align-items: center;
     }
     .newUser input{
          padding: 2%;
          margin: 2%;
     }
     .some{
          height: 0;
          transition: 350ms;
          opacity: 0;
     }
     .aparece{
          height: 100%;
          transition: 350ms;
          opacity: 1;
     }
     a{
          color: rebeccapurple;
          cursor: pointer;
          font-size: 33.87px;
          font-weight: bolder;
          text-shadow: 2px 1px  black;
     }
     select{
          margin: 2vh;
          width: 62%;
          padding: 1vh;
          border-radius: 10px;
          border: 1px solid black;
     }
</style>
<body>
     <div class="inicio">
          <h1>TITULO BEM GRANDE</h1>
     </div>
     <div class="centro">
          <h2>Centro do Site</h2>
          <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Itaque eum adipisci asperiores magnam, praesentium eius porro dolor quis error incidunt beatae aut officia doloribus facere placeat nesciunt corporis ipsam vitae.</p>
     </div>
     <div class="entradas" id="centro">
          <h2>Campo de Login</h2>
          <p>Insira seu nome:</p>
          <input type="text" id="nomeTxt">
          <p>insira sua senha:</p>
          <input type="text" id="senhaTxt">
          <button id="enviar">enviar</button>
          <a id="novoUsuario">Criar novo usuario </a>
          <div class="newUser aparece"  id="newUser">
               <label for="name">Insira um nome</label>
               <input type="text" id="nameTxt">
               <label for="name">Insira uma senha</label>
               <input type="text" id="passTxt">
               <label for="usuario">Selecione um nivel de usuario</label>
               <select name="tipoUser" id="userTxt">
                    <option value="Usuario">Usuario</option>
                    <option value="Adm">Adm</option>
               </select>
               <a id="user">testar</a>
          </div>
     </div>
</body>

<script src="./js/some.js"></script>
<script src="./js/jquery-3.7.1.js" type="text/javascript"></script>
<script>
     
     $("#enviar").on("click",async function(e){
          e.preventDefault();
          const nome = $("#nomeTxt").val();
          const senha = $("#senhaTxt").val();
          const config = {
               method:'post',
               headers:{
                    'Accept': 'application/json',
                    'Content-Type' : 'application/json'
               },
               body:JSON.stringify({
                    nome:nome,
                    senha: senha
               })
          }
          const request = await fetch('../Controller/loginUsuario.php',config);
          const resposta =await request.json();
          const dados = resposta.dados;
          console.log(dados);
          if(dados == false){
               alert('O Login ou a Senha estão incorretos');
          }
          else{
               alert("USUARIO ENCONTRADO"),window.location.href=`../View/telaInicial.php?nome=${nome}`; 
          }
     });
     $("#user").on('click',async function(e){
          const nome = $("#nameTxt").val();
          const senha = $("#passTxt").val();
          var valor = $('#userTxt').val();
          
          const config = {
               method:'post',
               headers:{
                    'Accept': 'application/json',
                    'Content-Type' : 'application/json'
               },
               body:JSON.stringify({
                    nome:nome,
                    senha:senha,
                    nivel:valor
               })
          }
          const request  = await fetch("../Controller/novoUsuario.php",config);
          const resposta = await request.json();
          const dados1 = resposta.status;
          alert(dados1);
               if(dados1 != 1){
                    alert('FALHA AO CRIAR USUARIO');
               }
               else{
                    if(valor == 'Usuario'){
                         alert('Usuario criado com sucesso'),window.location.href = `../View/telaInicial.php?nome=${nome}`;
                    }else{
                         alert('Usuario criado com sucesso'),window.location.href = `../View/telaInicialAdm.php?nome=${nome}`;
                    }
               }

     })
     $('#novoUsuario').on('click',function(){
          some();   
     })

</script>
</html>

