USE [LOJA]
GO

CREATE TABLE [dbo].[Cliente](
	[clienteId] [int] IDENTITY(1,1) NOT NULL,
	[nome] [varchar](50) NULL,
	[email] [varchar](50) NULL,
	[cpf] [bigint] NULL,
	[investimento] [decimal](19,4) NULL,
 CONSTRAINT [PK_Cliente] PRIMARY KEY CLUSTERED 
(
	[clienteId] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO