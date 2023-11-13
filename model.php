<?php

class ConexaoPDO {
    private $pdo;

    public function __construct() {
        $serverName = ''; //Nome do servidor
        $databaseName = ''; //Nome do banco de dados
        $username = '';
        $password = '';

        try {
            $this->pdo = new PDO("sqlsrv:Server=$serverName;Database=$databaseName", $username, $password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Erro na conexão com o banco de dados: " . $e->getMessage());
        }
    }

    public function getPDO() {
        return $this->pdo;
    }
}

class ComandosSQL {
    private $pdo;

    public function __construct() {
        $conexaoPDO = new ConexaoPDO();
        $this->pdo = $conexaoPDO->getPDO();
    }

    public function consultaSQL($tipo_pessoa,$tipo_relacionamento,$cpf_cnpj_professor,$cpf_aluno,$cnpj_fornecedor) {
        try {
            $sql = "SELECT id FROM [Cadastro_Usuario].[dbo].[cadastro_usuario] 
						WHERE tipo_pessoa = '$tipo_pessoa' AND tipo_relacionamento = '$tipo_relacionamento' AND cpf_cnpj_professor = '$cpf_cnpj_professor' AND cpf_aluno = '$cpf_aluno' AND cnpj_fornecedor = '$cnpj_fornecedor'";
            $stmt = $this->pdo->query($sql);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
			if ($result === false) {
				return 1;
			} else {
				return 2;
			}
        } catch (PDOException $e) {
            return false;
        }
    }   
    
    public function insereSQL($tipo_pessoa,$tipo_relacionamento,$pessoa_ativo,$email,$contato,$endereco,$data_nascimento_professor,$cpf_cnpj_professor,$sexo_professor,$registro_profissional,$area_especializacao,$titulo_academico,$horario,$disciplina,$data_nascimento_aluno,$cpf_aluno,$sexo_aluno,$curso,$turno,$cnpj_fornecedor,$atividade,$produto,$valor) {
        try {
            $sql = "INSERT INTO [Cadastro_Usuario].[dbo].[cadastro_usuario] (tipo_pessoa,tipo_relacionamento,pessoa_ativo,email,contato,endereco,data_nascimento_professor,cpf_cnpj_professor,sexo_professor,registro_profissional,area_especializacao,titulo_academico,horario,disciplina,data_nascimento_aluno,cpf_aluno,sexo_aluno,curso,turno,cnpj_fornecedor,atividade,produto,valor)
                        VALUES ('$tipo_pessoa','$tipo_relacionamento','$pessoa_ativo','$email','$contato','$endereco','$data_nascimento_professor','$cpf_cnpj_professor','$sexo_professor','$registro_profissional','$area_especializacao','$titulo_academico','$horario','$disciplina','$data_nascimento_aluno','$cpf_aluno','$sexo_aluno','$curso','$turno','$cnpj_fornecedor','$atividade','$produto','$valor')";
            $stmt = $this->pdo->exec($sql);
            $id = $this->pdo->lastInsertId();
            return $id;
        } catch (PDOException $e) {
            return false;
        }
    } 

    public function atualizaSQL($tipo_pessoa,$tipo_relacionamento,$pessoa_ativo,$email,$contato,$endereco,$data_nascimento_professor,$cpf_cnpj_professor,$sexo_professor,$registro_profissional,$area_especializacao,$titulo_academico,$horario,$disciplina,$data_nascimento_aluno,$cpf_aluno,$sexo_aluno,$curso,$turno,$cnpj_fornecedor,$atividade,$produto,$valor) {
        try {
            $sql = "UPDATE [Cadastro_Usuario].[dbo].[cadastro_usuario] SET pessoa_ativo = '$pessoa_ativo',email = '$email',contato = '$contato',endereco = '$endereco',data_nascimento_professor = '$data_nascimento_professor',sexo_professor = '$sexo_professor',registro_profissional = '$registro_profissional',area_especializacao = '$area_especializacao',titulo_academico = '$titulo_academico',horario = '$horario',disciplina = '$disciplina',data_nascimento_aluno = '$data_nascimento_aluno',sexo_aluno = '$sexo_aluno',curso = '$curso',turno = '$turno',atividade = '$atividade',produto = '$produto',valor = '$valor'                     
						WHERE tipo_pessoa = '$tipo_pessoa' AND tipo_relacionamento = '$tipo_relacionamento' AND cpf_cnpj_professor = '$cpf_cnpj_professor' AND cpf_aluno = '$cpf_aluno' AND cnpj_fornecedor = '$cnpj_fornecedor'";
			$stmt = $this->pdo->prepare($sql);
			$stmt->execute();
        return true;			
        } catch (PDOException $e) {
            return false;
        }
    } 	
}

?>