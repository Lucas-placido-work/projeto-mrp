<?php
require_once(__DIR__ . '/../config/db.php');

class ComponenteModel {
    private $conn;

    public function __construct() {
        $this->conn = getDbConnection();
    }

    private function buscarComponente($produto, $nome_componente) {
        $query = "SELECT id, quantidade FROM componentes WHERE produto = ? AND nome_componente = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ss", $produto, $nome_componente);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function cadastrarComponente($produto, $nome_componente, $quantidade) {
        $componente_existente = $this->buscarComponente($produto, $nome_componente);
        if ($componente_existente) {
            $nova_quantidade = $componente_existente['quantidade'] + $quantidade;
            $query = "UPDATE componentes SET quantidade = ? WHERE id = ?";
            $stmt = $this->conn->prepare($query);
            $stmt->bind_param("ii", $nova_quantidade, $componente_existente['id']);
            if ($stmt->execute()) {
                $stmt->close();
                $this->conn->close();
                return true;
            } else {
                $stmt->close();
                $this->conn->close();
                return false;
            }
        }

        $query = "INSERT INTO componentes (produto, nome_componente, quantidade) 
        VALUES (?, ?, ?)";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ssi", $produto, $nome_componente, $quantidade);
        
        if ($stmt->execute()) {
            $stmt->close();
            $this->conn->close();
            return true;
        } else {
            $stmt->close();
            $this->conn->close();
            return false;
        }
    }

    public function listarComponentes() {
        $query = "SELECT produto, nome_componente, quantidade, id FROM componentes ORDER BY produto, nome_componente";
        $stmt = $this->conn->prepare($query);
        if ($stmt->execute()) {
            $result = $stmt->get_result();
            $dados = array();
            while ($row = $result->fetch_assoc()) {
                $dados[] = array(
                    'id' => $row['id'],
                    'produto' => $row['produto'],
                    'nome_componente' => $row['nome_componente'],
                    'quantidade' => $row['quantidade']
                );
            }
            $stmt->close();
            $this->conn->close();
            return $dados;
        } else {
            $stmt->close();
            $this->conn->close();
            return null;
        }
    }

    public function listarComponentesPorProduto($produto) {
        $query = "SELECT nome_componente, quantidade FROM componentes WHERE produto = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("s", $produto);
        if ($stmt->execute()) {
            $result = $stmt->get_result();
            $dados = array();
            while ($row = $result->fetch_assoc()) {
                $dados[] = array(
                    'produto' => $produto,
                    'nome_componente' => $row['nome_componente'],
                    'quantidade' => $row['quantidade']
                );
            }
            $stmt->close();
            $this->conn->close();
            return $dados;
        } else {
            $stmt->close();
            $this->conn->close();
            return null;
        }
    }

    public function editarComponente($id, $quantidade) {
        $query = "UPDATE componentes SET 
                quantidade = ? 
                WHERE id = ?";

        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ii", $quantidade, $id);

        if ($stmt->execute()) {
            $stmt->close();
            $this->conn->close();
            return true;
        } else {
            $stmt->close();
            $this->conn->close();
            return false;
        }
    }

    public function removerComponente($id){
        $query = "DELETE FROM componentes WHERE id = ?";

        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('i',$id);

        if ($stmt->execute()) {
            $stmt->close();
            $this->conn->close();
            return true;
        } else {
            $stmt->close();
            $this->conn->close();
            return false;
        }
    }
}
?>
