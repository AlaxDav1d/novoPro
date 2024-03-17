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
</style>
<body>
     <div class="tudo">
     <h1>Bem Vindo </h1><p><?php echo $nome?></p>
     </div>

</body>
</html>