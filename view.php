<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sistema de Cadastro de Usuário</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
	<style>
        .hidden {
            display: none;
        }

		.custom-container {
		  max-width: 650px;
		  margin: auto;
		}
    </style>
</head>
<body class="container mt-5 custom-container">

    <h2 class="mb-4 text-center"><i class="bi bi-people"></i> - Cadastro de Usuários</h2>
	<hr>
    
	<div class="row">
		<div class="col-6 form-group">
			<label for="tipo_pessoa">Selecione o Tipo de Pessoa:</label>
			<select class="form-control" id="tipo_pessoa" name="tipo_pessoa" onchange="filtraSelect(this.value)">
				<option value="selecione_pessoa">Selecione</option>
				<option value="pessoa_fisica">Pessoa Física</option>
				<option value="pessoa_juridica">Pessoa Jurídica</option>
			</select>
		</div>
		
		<div class="col-6 form-group">
			<label for="tipo_relacionamento">Selecione o Tipo de Relacionamento:</label>
			<select class="form-control" id="tipo_relacionamento" name="tipo_relacionamento" onchange="mostrarCampos(this.value)">
				<option value="selecione_relacionamento">Selecione</option>
				<option value="professor">Professor</option>
				<option value="fornecedor">Fornecedor</option>
				<option value="aluno">Aluno</option>
			</select>
		</div>			
	</div>

	<div class="row">
		<!-- Campos comuns a todos os tipos de pessoas -->
		<div class="col-10 form-group">
			<label for="nome">Nome:</label>
			<input type="text" class="form-control" id="nome" name="nome" required>
		</div>
		
		<div class="col-2 form-group">
			<label for="pessoa_ativo">Ativo:</label>
			<select class="form-control" id="pessoa_ativo" name="pessoa_ativo">
				<option value="sim">Sim</option>
				<option value="nao">Não</option>
			</select>
		</div>	
		
	</div>

	<div class="row">			
		<div class="col-8 form-group">
			<label for="email">E-mail:</label>
			<input type="text" class="form-control" id="email" name="email" required>
		</div>
		
		<div class="col-4 form-group">
			<label for="contato">Contato:</label>
			<input type="text" class="form-control" id="contato" name="contato" required>
		</div>
	</div>
	
	<div class="row">
		<div class="col-12 form-group">
			<label for="endereco">Endereço:</label>
			<input type="text" class="form-control" id="endereco" name="endereco" required>
		</div>
	</div>
	
	<!-- Campos específicos para Professor -->
	<div id="professor" class="hidden">
		<hr>
		<div class="row">
			<div class="col-4 form-group">
				<label for="data_nascimento_professor">Data de Nascimento:</label>
				<input type="date" class="form-control" id="data_nascimento_professor" name="data_nascimento_professor">
			</div>				
		
			<div class="col-4 form-group">
				<label for="cpf_cnpj_professor">CPF/CNPJ:</label>
				<input type="text" class="form-control" id="cpf_cnpj_professor" name="cpf_cnpj_professor">
			</div>	
			
			<div class="col-4 form-group">
				<label for="sexo_professor">Sexo:</label>
				<select class="form-control" id="sexo_professor" name="sexo_professor">
					<option value="selecione">Selecione</option>
					<option value="masculino">Masculino</option>
					<option value="feminino">Feminino</option>
				</select>
			</div>
		</div>
		
		<div class="row">
			<div class="col-4 form-group">
				<label for="registro_profissional">Registro Profissional:</label>
				<input type="text" class="form-control" id="registro_profissional" name="registro_profissional">
			</div>	
			
			<div class="col-8 form-group">
				<label for="area_especializacao">Área de Especialização:</label>
				<input type="text" class="form-control" id="area_especializacao" name="area_especializacao">
			</div>				
		</div>

		<div class="row">
			<div class="col-12 form-group">
				<label for="titulo_academico">Título Acadêmico:</label>
				<input type="text" class="form-control" id="titulo_academico" name="titulo_academico">
			</div>
		</div>
		
		<div class="row">
			<div class="col-3 form-group">
				<label for="horario">Horario:</label>
				<input type="time" class="form-control" id="horario" name="horario">
			</div>			

			<div class="col-9 form-group">
				<label for="disciplina">Disciplina:</label>
				<input type="text" class="form-control" id="disciplina" name="disciplina">
			</div>
		</div>
	</div>

	<!-- Campos específicos para Aluno -->
	<div id="aluno" class="hidden">
		<hr>
		<div class="row">
			<div class="col-4 form-group">
				<label for="data_nascimento_aluno">Data de Nascimento:</label>
				<input type="date" class="form-control" id="data_nascimento_aluno" name="data_nascimento_aluno">
			</div>	
		
			<div class="col-4 form-group">
				<label for="cpf_aluno">CPF:</label>
				<input type="text" class="form-control" id="cpf_aluno" name="cpf_aluno">
			</div>	
			
			<div class="col-4 form-group">
				<label for="sexo_aluno">Sexo:</label>
				<select class="form-control" id="sexo_aluno" name="sexo_aluno">
					<option value="selecione">Selecione</option>
					<option value="masculino">Masculino</option>
					<option value="feminino">Feminino</option>
				</select>
			</div>					
		</div>
		
		<div class="row">
			<div class="col-8 form-group">
				<label for="curso">Curso:</label>
				<input type="text" class="form-control" id="curso" name="curso">
			</div>	
			
			<div class="col-4 form-group">
				<label for="turno">Turno:</label>
				<select class="form-control" id="turno" name="turno">
					<option value="matutino">Matutino</option>
					<option value="vespertino">Vespertino</option>
				</select>
			</div>				
		</div>			
	</div>

	<!-- Campos específicos para Fornecedor -->
	<div id="fornecedor" class="hidden">
		<hr>			
		<div class="row">
			<div class="col-4 form-group">
				<label for="cnpj_fornecedor">CNPJ:</label>
				<input type="text" class="form-control" id="cnpj_fornecedor" name="cnpj_fornecedor">
			</div>				
		
			<div class="col-8 form-group">
				<label for="atividade">Atividade:</label>
				<input type="text" class="form-control" id="atividade" name="atividade">
			</div>
		</div>
		
		<div class="row">
			<div class="col-9 form-group">
				<label for="produto">Produto:</label>
				<input type="text" class="form-control" id="produto" name="produto">
			</div>				
		
			<div class="col-3 form-group">
				<label for="valor">Valor:</label>
				<input type="text" class="form-control" id="valor" name="valor" placeholder="R$ 0,00">
			</div>
		</div>
	</div>

	<hr>
	
	<div class="text-center">
		<button type="buttom" class="btn btn-primary" id="btnCadastrar">Cadastrar/Atualizar registro</button>
	</div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js"></script>

    <script>
		function filtraSelect() {
			var tipoPessoaDropdown = document.getElementById("tipo_pessoa");
			var tipoRelacionamentoDropdown = document.getElementById("tipo_relacionamento");

			// Obtém o valor selecionado no dropdown de tipo de pessoa
			var tipoPessoaSelecionado = tipoPessoaDropdown.value;

			// Torna todas as opções visíveis
			for (var i = 0; i < tipoRelacionamentoDropdown.options.length; i++) {
			  tipoRelacionamentoDropdown.options[i].style.display = "";
			}

			// Se pessoa física for selecionada, oculta a opção "fornecedor"
			if (tipoPessoaSelecionado === "pessoa_fisica") {
			  var fornecedorOption = tipoRelacionamentoDropdown.querySelector('option[value="fornecedor"]');
			  fornecedorOption.style.display = "none";
			}

			// Se pessoa jurídica for selecionada, oculta a opção "aluno"
			if (tipoPessoaSelecionado === "pessoa_juridica") {
			  var alunoOption = tipoRelacionamentoDropdown.querySelector('option[value="aluno"]');
			  alunoOption.style.display = "none";
			}
			
			// Limpa 
			tipoRelacionamentoDropdown.value = "selecione_relacionamento";
			mostrarCampos("selecione_relacionamento");
		}
		
		function mostrarCampos(tipoUsuario) {
            // Oculta todos os campos específicos
            document.querySelectorAll('.hidden').forEach(function(element) {
                element.style.display = 'none';
            });

            // Mostra os campos específicos do tipo selecionado
            document.getElementById(tipoUsuario).style.display = 'block';
        }
		
		$(document).ready(function() {
			$('#valor').maskMoney({ prefix: 'R$ ', allowNegative: false, thousands: '.', decimal: ',' });
		});		
		
		//Botão Cadastrar da tela de Nova Demanda
		$('#btnCadastrar').click(function(){
			//console.log('Botão Cadastrar funcionando');
			let formData = new FormData();
			formData.append("crudSQL", "insert");
			formData.append("tipo_pessoa", $('#tipo_pessoa').val());
			formData.append("tipo_relacionamento", $('#tipo_relacionamento').val());
			formData.append("pessoa_ativo", $('#pessoa_ativo').val());
			formData.append("email", $('#email').val());
			formData.append("contato", $('#contato').val());
			formData.append("endereco", $('#endereco').val());
			formData.append("data_nascimento_professor", $('#data_nascimento_professor').val());
			formData.append("cpf_cnpj_professor", $('#cpf_cnpj_professor').val());
			formData.append("sexo_professor", $('#sexo_professor').val());
			formData.append("registro_profissional", $('#registro_profissional').val());
			formData.append("area_especializacao", $('#area_especializacao').val());
			formData.append("titulo_academico", $('#titulo_academico').val());
			formData.append("horario", $('#horario').val());
			formData.append("disciplina", $('#disciplina').val());
			formData.append("data_nascimento_aluno", $('#data_nascimento_aluno').val());
			formData.append("cpf_aluno", $('#cpf_aluno').val());
			formData.append("sexo_aluno", $('#sexo_aluno').val());
			formData.append("curso", $('#curso').val());
			formData.append("turno", $('#turno').val());
			formData.append("cnpj_fornecedor", $('#cnpj_fornecedor').val());
			formData.append("atividade", $('#atividade').val());
			formData.append("produto", $('#produto').val());
			formData.append("valor", $('#valor').val());
			//formData.forEach(function(valor, chave) {
				//console.log(chave, valor);
			//});
			//console.log('chamada ajax');
			$.ajax({
				type: 'POST',
				cache: false,
				url: 'controller.php',
				data: formData,
				processData: false, // Evita que o jQuery processe os dados
				contentType: false, // Define o tipo de conteúdo como false            
				beforeSend: function() {},
				success: function(resultado) {
					console.log('Registro salvo com sucesso');
					console.log(resultado);
					if (resultado == 1){
						alert('Registro incluído com sucesso!');
					} else {
						alert('Registro já existente. Dados atualizados!');
					}
				},
				error: function(resultado) {
					console.log('Erro');
					console.log(resultado);
				}
			});
		});		
    </script>
</body>
</html>
