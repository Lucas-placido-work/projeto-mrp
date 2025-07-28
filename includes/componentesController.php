<?php
  require_once 'componentesModel.php';

  class componentesController{
    public function create($data){
      $produto = $data['produto'] ?? null;
      $componente = $data['nome_componente'] ?? null;
      $quantidade = $data['quantidade'] ?? null;

      $quantidade = intval($quantidade);

      if($produto && $componente){
        $componentes = new ComponenteModel;
        if($componentes->cadastrarComponente($produto, $componente, $quantidade)){
          $retorno = json_encode("Componente cadastrado com sucesso!"); 
          echo $retorno;
        }
        else{
          $retorno = json_encode("Falha ao tentar cadastrar componente!"); 
          echo $retorno;
        }
      }
      else{  
        $retorno = json_encode("Produto, componente e quantidade não podem estar vazios!"); 
        echo $retorno;
      }
    }
    
    public function read(){
      $componentes = new ComponenteModel;
      $stmt = $componentes->listarComponentes();
      return json_encode($stmt);
    }

    public function update($data){
      $id = isset($data['id']) ? $data['id'] : null;
      if(!$id){
        echo "Falha ao tentar atualizar";
        return false;
      }
      $quantidade = isset($data['quantidade']) ? $data['quantidade'] : null;
      $componetes = new ComponenteModel();
      if($quantidade){
        if($componetes->editarComponente($id,$quantidade)){
          $retorno = json_encode("componente editado com sucesso!"); 
          echo $retorno;
        }
        else{
          $retorno = json_encode("Falha ao tentar editar componente!"); 
          echo $retorno;
        }
      }
    }

    public function delete($id){
      $componenteModel = new ComponenteModel();
      if($componenteModel->removerComponente($id)){
        $retorno = json_encode("Componente removido com sucesso!"); 
        echo $retorno;
      }
      else{
        $retorno = json_encode("Falhou ao tentar remover componente!"); 
        echo $retorno;
      }
    }
      
    public function fetch($data){
      $produto = $data['produto'] ?? null;
      if(!$produto){
        return json_encode("Produto não pode estar vazio!");
      }
      $componenteModel = new ComponenteModel();
      $result = $componenteModel->listarComponentesPorProduto($produto);
      if($result){
        return json_encode($result);
      } else {
        return json_encode("Nenhum componente encontrado para o produto especificado.");
      }
    }
  }
?>
