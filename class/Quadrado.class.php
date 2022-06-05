<?php
    require_once("../conf/Conexao.php");

    class Quadrado{
        private $idQuadrado;
        private $lado;
        private $cor;
        private $idTabuleiro;
        public function __construct($id, $lado, $cor, $tabuleiro){
            $this->setIdQuadrado($id);
            $this->setLado($lado);
            $this->setCor($cor);
            $this->setIdTabuleiro($tabuleiro);
        } 

        public function setIdQuadrado($id){
            $this->idQuadrado = $id;
        }
        public function setLado($lado){
            if($lado > 0)
                $this->lado = $lado;
            else
                throw new Exception("Valor do lado inválido: $lado");
        }
        public function setCor($cor){
            if($cor <> "")
                $this->cor = $cor;
            else
                throw new Exception("Cor inválida: $cor");
        }
        public function setIdTabuleiro($tabuleiro){
            if($tabuleiro <> 0)
                $this->idTabuleiro = $tabuleiro;
            else
                throw new Exception("Tabuleiro inválido: $tabuleiro");
        }

        public function getIdQuadrado(){ return $this->idQuadrado; }
        public function getLado(){ return $this->lado; }
        public function getCor(){ return $this->cor; }
        public function getIdTabuleiro(){ return $this->idTabuleiro; }

        public function insere(){
            $conexao = Conexao::getInstance();
            $sql = "INSERT INTO quadrado (lado, cor, tabuleiro_idtabuleiro) VALUES(:lado, :cor, :tabuleiro)";
            $comando = $conexao->prepare($sql);
            $comando->bindValue(":lado", $this->getLado());
            $comando->bindValue(":cor", $this->getCor());
            $comando->bindValue(":tabuleiro", $this->getIdTabuleiro());
            if($comando->execute())
                return $conexao->lastInsertId();
            else{
                return 0;
                $comando->debugDumpParams();
            }
        }
        public function listar($tipo, $info){
            $conexao = Conexao::getInstance();
            $sql = "SELECT * FROM quadrado";
            if($tipo > 0 && $info <> ""){
                switch($tipo){
                    case(1): $sql .= " WHERE idquadrado = :info"; break;
                    case(2): $sql .= " WHERE lado LIKE :info"; $info .= "%"; break;
                    case(3): $sql .= " WHERE cor LIKE :info"; $info = "%".$info."%"; break;
                    case(4): $sql .= " WHERE tabuleiro_idtabuleiro = :info"; break;
                }
            }
            $comando = $conexao->prepare($sql);
            if($tipo > 0 && $info <> "")
                $comando->bindValue(":info", $info);
            $comando->execute();
            return $comando->fetchAll();
        }
        public function editar(){
            $conexao = Conexao::getInstance();
            $sql = "UPDATE quadrado
                    SET lado = :lado, cor = :cor, tabuleiro_idtabuleiro = :tabuleiro
                    WHERE idquadrado = :id";
            $comando = $conexao->prepare($sql);
            $comando->bindValue(":lado", $this->getLado());
            $comando->bindValue(":cor", $this->getCor());
            $comando->bindValue(":tabuleiro", $this->getIdTabuleiro());
            $comando->bindValue(":id", $this->getIdQuadrado());
            if($comando->execute())
                return $conexao->lastInsertId();
            else{
                return 0;
                $comando->debugDumpParams();
            }
        }
        public function excluir(){
            $conexao = Conexao::getInstance();
            $sql = "DELETE FROM quadrado WHERE idquadrado = :id";
            $comando = $conexao->prepare($sql);
            $comando->bindParam(":id", $this->getIdQuadrado());
            if($comando->execute())
                return $conexao->lastInsertId();
            else{
                return 0;
                $comando->debugDumpParams();
            }
        }

        public function area(){
            return pow($this->getLado(), 2);
        }
        public function perimetro(){
            return $this->getLado() * 4;
        }

        public function __toString(){
            return "<a href='quadrado.php'>Voltar à página de quadrados</a> | [Quadrado ".$this->getIdQuadrado()."] <br>".
                    "<br>".
                    "Lado: ".$this->getLado()." <br>".
                    "Área: ".$this->area()." <br>".
                    "Perímetro: ".$this->perimetro()." <br>".
                    "<br>";
        }
        public function desenha(){
            return $this->__toString().
                    "<div style='
                        width: ".$this->getLado()."em;
                        height: ".$this->getLado()."em;
                        background: ".$this->getCor().";
                    '></div>";
        }
    }
?>