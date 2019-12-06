<!-- CREATE TABLE  `produto` (
 `id` INT( 11 ) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
 `nome` VARCHAR( 255 ) NULL ,
 `descricao` VARCHAR( 255 ) NULL ,
 `preco` DECIMAL( 15, 2 ) NULL
) ENGINE = INNODB; -->
<?php

class DBConect
{
    private $conexao;
    private $MYSQL_USUARIO = 'root';
    private $MYSQL_SENHA = 'sa1234';
    private $MYSQL_IP = 'localhost';
    private $MYSQL_DATABASE = 'projetophp';

    public function getDadosConexao()
    {
        return array($this->MYSQL_USUARIO, $this->MYSQL_SENHA, $this->MYSQL_IP, $this->MYSQL_DATABASE);
    }

    /**
     * @author Leonardo Thomaz
     * @since 05/04/2019
     *
     * Método utilizado para efetuar conexão com banco de dados.
     */
    public function Conectar()
    {
        global $Sess;
        if (true) {
            // Conecta no Banco de Dados
            $this->conexao = @mysqli_connect($this->MYSQL_IP, $this->MYSQL_USUARIO, $this->MYSQL_SENHA, $this->MYSQL_DATABASE);
            @mysqli_set_charset($this->conexao, 'utf8');
            if (!$this->conexao) {
                $Sess->logado_sys = false;
                return sprintf("Erro ao Conectar ao Banco de Dados. %s", @mysqli_connect_error());
            }
            return "Conectado ao banco de dados com sucesso.";

        }
    }

    /**
     * @author Leonardo Thomaz
     * @since 05/04/2019
     *
     * Método utilizado para deslogar.
     */
    public function Desconectar()
    {
        @mysqli_close($this->conexao);
    }

    public function getConexao()
    {
        return $this->conexao;
    }
}