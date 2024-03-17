<?php   
     Class Model{
          public $id = 0;
          public $db = null;

          public $nomeModel = null;
          public $senhaModel = null;
          public $userModel = null;
          public function __construct($conexaoBanco){
            $this ->db = $conexaoBanco;
          }
          public function logar(){
               $retorno = ['status' =>0,'dados'=>null];
               
               try{
                    $stmt = $this->db->prepare(`SELECT id from usuario WHERE nome = :nomeUsuario AND senha = :senha`);
                    $stmt->bindValue(':nomeUsuario',$this->nomeModel);
                    $stmt->bindValue(':senha',$this->senhaModel);
                    $stmt->execute();
                    $volta = $stmt->fetch();
                    $retorno['status'] = 1;
                    $retorno['dados'] = $volta;
               }catch(PDOException $e){
                    echo "Erro Ao Logar",$e->getMessage();
               }
               return $retorno;
          }
          public function criarLogin(){
               $retorno = ['status' =>0,'dados' => null];

               try{
                    $stmt = $this->db->prepare('INSERT INTO usuario(nome,senha,nivel) VALUES (:nome,:senha,:nivel)');
                    $stmt->bindValue(':nome',$this->nomeModel);
                    $stmt->bindValue(':senha',$this->senhaModel);
                    $stmt->bindValue(':nivel',$this->userModel);
                    $stmt->execute();
                    $retorno['status'] = 1;
               }catch(PDOException $e){
                    echo "Erro ao criar Usuario",$e->getMessage();
               }
               return $retorno;
          }
     }
?>