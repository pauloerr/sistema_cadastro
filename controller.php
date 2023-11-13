<?php
require_once 'model.php';
$comandosSQL = new ComandosSQL();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $crudSQL = $_POST['crudSQL'];

    if ($crudSQL == 'insert') {
        $tipo_pessoa = $_POST['tipo_pessoa'];
        $tipo_relacionamento = $_POST['tipo_relacionamento'];
        $pessoa_ativo = $_POST['pessoa_ativo'];
        $email = $_POST['email'];
        $contato = $_POST['contato'];
        $endereco = $_POST['endereco'];
        $data_nascimento_professor = $_POST['data_nascimento_professor'];
        $cpf_cnpj_professor = $_POST['cpf_cnpj_professor'];
        $sexo_professor = $_POST['sexo_professor'];
        $registro_profissional = $_POST['registro_profissional'];
        $area_especializacao = $_POST['area_especializacao'];
        $titulo_academico = $_POST['titulo_academico'];
        $horario = $_POST['horario'];
        $disciplina = $_POST['disciplina'];
        $data_nascimento_aluno = $_POST['data_nascimento_aluno'];
        $cpf_aluno = $_POST['cpf_aluno'];
		$sexo_aluno = $_POST['sexo_aluno'];
		$curso = $_POST['curso'];
		$turno = $_POST['turno'];
		$cnpj_fornecedor = $_POST['cnpj_fornecedor'];
		$atividade = $_POST['atividade'];
		$produto = $_POST['produto'];
		$valor = $_POST['valor'];
		if ($valor == ''){
			$valor = 0;
		}
		
		// Consulta se registro já existe
		$result = $comandosSQL->consultaSQL($tipo_pessoa,$tipo_relacionamento,$cpf_cnpj_professor,$cpf_aluno,$cnpj_fornecedor);	

		// Se registro não existir, executa comando de insert no SQL
		if ($result === 1){
			echo 1;
			$result = $comandosSQL->insereSQL($tipo_pessoa,$tipo_relacionamento,$pessoa_ativo,$email,$contato,$endereco,$data_nascimento_professor,$cpf_cnpj_professor,$sexo_professor,$registro_profissional,$area_especializacao,$titulo_academico,$horario,$disciplina,$data_nascimento_aluno,$cpf_aluno,$sexo_aluno,$curso,$turno,$cnpj_fornecedor,$atividade,$produto,$valor);
		} else {
			echo 2;
			$result = $comandosSQL->atualizaSQL($tipo_pessoa,$tipo_relacionamento,$pessoa_ativo,$email,$contato,$endereco,$data_nascimento_professor,$cpf_cnpj_professor,$sexo_professor,$registro_profissional,$area_especializacao,$titulo_academico,$horario,$disciplina,$data_nascimento_aluno,$cpf_aluno,$sexo_aluno,$curso,$turno,$cnpj_fornecedor,$atividade,$produto,$valor);
		}
    } 
	exit();
} 
?>