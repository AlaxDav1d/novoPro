<?php   
     Class Model{
          public $id = 0;
          public $db = null;

          public $nomeModel = null;
          public $senhaModel = null;
          public function __construct($conexaoBanco){
            $this ->db = $conexaoBanco;
          }
          public function logar(){
               $retorno = ['status' =>0,'dados'=>null];

               try{
                    $stmt = $this->db->prepare('SELECT id from usuario WHERE nome = :nomeUsuario');
                    $stmt->bindValue(':nomeUsuario',$this->nomeModel);
                    $stmt->execute();
                    $volta = $stmt->fetch();
                    $retorno['status'] = 1;
                    $retorno['dados'] = $volta;
               }catch(PDOException $e){
                    echo "Erro Ao Logar",$e->getMessage();
               }
               return $retorno;
          }
     }
?>