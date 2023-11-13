USE [Cadastro_Usuario]
GO

SET ANSI_NULLS ON
GO

SET QUOTED_IDENTIFIER ON
GO

SET ANSI_PADDING ON
GO

CREATE TABLE [dbo].[cadastro_usuario](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[tipo_pessoa] [varchar](50) NULL,
	[tipo_relacionamento] [varchar](50) NULL,
	[pessoa_ativo] [varchar](50) NULL,
	[email] [varchar](50) NULL,
	[contato] [varchar](50) NULL,
	[endereco] [varchar](255) NULL,
	[data_nascimento_professor] [date] NULL,
	[cpf_cnpj_professor] [varchar](50) NULL,
	[sexo_professor] [varchar](50) NULL,
	[registro_profissional] [varchar](50) NULL,
	[area_especializacao] [varchar](50) NULL,
	[titulo_academico] [varchar](50) NULL,
	[horario] [time](7) NULL,
	[disciplina] [varchar](50) NULL,
	[data_nascimento_aluno] [date] NULL,
	[cpf_aluno] [varchar](50) NULL,
	[sexo_aluno] [varchar](50) NULL,
	[curso] [varchar](50) NULL,
	[turno] [varchar](50) NULL,
	[cnpj_fornecedor] [varchar](50) NULL,
	[atividade] [varchar](50) NULL,
	[produto] [varchar](50) NULL,
	[valor] [numeric](18, 2) NULL,
 CONSTRAINT [PK_cadastro_usuario] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO

SET ANSI_PADDING OFF
GO


