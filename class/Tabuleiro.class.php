<?php
    require_once("conf/Conexao.php");

    class Tabuleiro{
        private $idTabuleiro;
        private $lado;
        public function __construct($id, $lado){
            $this->setIdTabuleiro($id);
            $this->setLado($lado);
        }

        public function setIdTabuleiro($id){
            $this->idTabuleiro = $id;
        }
        public function setLado($lado){
            if($lado > 0)
                $this->lado = $lado;
            else
                throw new Exception("Valor do lado inválido: $lado");
        }

        public function getIdTabuleiro(){ return $this->idTabuleiro; }
        public function getLado(){ return $this->lado; }

        public function listar($tipo, $info){
            $conexao = Conexao::getInstance();
            $sql = "SELECT * FROM tabuleiro";
            if($tipo > 0){
                switch($tipo){
                    case(1): $sql .= " WHERE idtabuleiro = :info"; break;
                    case(2): $sql .= " WHERE lado = :info"; $info .= "%"; break;
                }
            }
            $comando = $conexao->prepare($sql);
            if($tipo > 0)
                $comando->bindValue(":info", $info, PDO::PARAM_INT);
            $comando->execute();
            return $comando->fetchAll();
        }
    }
?>