# Aula 13 - Atividade Prática

---

## Membros do Grupo

| Nome Completo         |    RA      |
|-----------------------|------------|
| Nayara Dellamura      |   115374   |
| Matheus Opuscolo      |   114449   |

---

## Descrição do Projeto

Sistema para gerenciamento e venda de produtos de uma lanchonete.  

Funcionalidades principais:  
- Login de administrador  
- Cadastro, edição, exclusão e listagem de produtos  
- Registro e visualização de vendas  
- Gráficos de vendas por produto  

---

## Estrutura de Arquivos

- `/app/controllers/` - Controladores PHP  
- `/app/dao/` - Acesso a dados (DAO)  
- `/app/models/` - Modelos do sistema  
- `/app/views/` - Arquivos de visualização (HTML/PHP)  
- `/public/css/` - Arquivos CSS  
- `/public/img/` - Imagens e ícones  

---

## Scripts SQL

- `info-lanches.sql` - Script para criar o banco de dados e tabelas necessárias  
- Estrutura das principais tabelas:  
  - `produtos` (id, nome, descricao, preco, quantidade, categoria, imagem)  
  - `vendas` (id, produto_id, quantidade, data_venda)  

---

## Como usar o sistema em localhost

### Requisitos

- PHP 7.x ou superior  
- Servidor Apache (pode usar WAMP, XAMPP ou similar)  
- MySQL/MariaDB  

### Passos

1. Clone ou copie o projeto para a pasta do servidor local, por exemplo:  
   `https://github.com/nayaradellamura/Lanchonete`  
   `C:\wamp64\www\info-lanches` (WAMP)`

2. Importe o banco de dados:  
   - Abra o phpMyAdmin 
   - Crie um banco de dados chamado `info_lanches`
   - Importe o arquivo `info-lanches.sql` para criar as tabelas e dados iniciais  

3. Abra o navegador e acesse o sistema:  
   `http://localhost/info-lanches/index.php`  

4. Faça login com as credenciais do administrador:  
   - Usuário: admin  
   - Senha: 123456  

5. Navegue pelas opções:  
   - Cadastrar, editar e excluir produtos  
   - Realizar vendas  
   - Visualizar gráfico de vendas  

---
