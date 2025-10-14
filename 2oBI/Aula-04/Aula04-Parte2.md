# Sistema CRUD em PHP com MySQL

> **Disciplina:** Linguagem e Técnicas de Programação    
> **Tema:** Sistema CRUD em PHP com MySQL  
> **Professor:** José Carlos Flores  
> **Curso:** Engenharia de Software  
> **Objetivo:** Desenvolvimento de uma aplicação exemplo completa(CRUD) em PHP
---

Este projeto implementa um sistema CRUD (Create, Read, Update, Delete) básico utilizando PHP e MySQL, com foco na separação de responsabilidades (MVC simplificado) e uso de CSS externo para estilização. É projetado para ser executado em um ambiente XAMPP.

## Sumário
1. [Visão Geral](#1-visão-geral)
2. [Funcionalidades](#2-funcionalidades)
3. [Requisitos](#3-requisitos)
4. [Configuração do Ambiente (XAMPP)](#4-configuração-do-ambiente-xampp)
5. [Configuração do Banco de Dados](#5-configuração-do-banco-de-dados)
6. [Estrutura do Projeto](#6-estrutura-do-projeto)
7. [Como Usar](#7-como-usar)
8. [Desenvolvimento](#8-desenvolvimento)

## 1. Visão Geral
O objetivo deste projeto é demonstrar a criação de um sistema CRUD completo em PHP, conectando-se a um banco de dados MySQL. A aplicação gerencia duas entidades: **Categorias** e **Produtos**, onde Produtos possuem um relacionamento com Categorias. A arquitetura é modular, com arquivos PHP separados para configuração, modelos (interação com o banco de dados), controladores (lógica de negócios) e visões (interface do usuário), além de um arquivo CSS externo para estilização.

## 2. Funcionalidades
- **Categorias:**
    - Criar novas categorias.
    - Visualizar uma lista de todas as categorias.
    - Editar categorias existentes.
    - Deletar categorias.
- **Produtos:**
    - Criar novos produtos, associando-os a uma categoria existente.
    - Visualizar uma lista de todos os produtos, incluindo o nome da categoria.
    - Editar produtos existentes.
    - Deletar produtos.

## 3. Requisitos
Para executar esta aplicação, você precisará de:
- **Servidor Web:** Apache (geralmente incluído no XAMPP).
- **PHP:** Versão 7.4 ou superior.
- **Banco de Dados:** MySQL (geralmente incluído no XAMPP).
- **XAMPP:** Ambiente de desenvolvimento integrado para Windows, macOS e Linux.

## 4. Configuração do Ambiente (XAMPP)
1. **Instale o XAMPP:** Se você ainda não tem o XAMPP instalado, faça o download e instale-o a partir do site oficial: [https://www.apachefriends.org/pt_br/index.html](https://www.apachefriends.org/pt_br/index.html).
2. **Inicie o Apache e MySQL:** Abra o painel de controle do XAMPP e inicie os módulos `Apache` e `MySQL`.
3. **Copie o Projeto:** Copie a pasta `crud_php` (que contém todos os arquivos do projeto) para o diretório `htdocs` da sua instalação XAMPP (ex: `C:\xampp\htdocs\` no Windows ou `/Applications/XAMPP/htdocs/` no macOS).

## 5. Configuração do Banco de Dados
1. **Acesse o phpMyAdmin:** Abra seu navegador e vá para `http://localhost/phpmyadmin`.
2. **Crie o Banco de Dados:**
    - Clique na aba `SQL`.
    - Copie e cole o conteúdo do arquivo `database.sql` (localizado na raiz do projeto `crud_php/database.sql`) na caixa de texto.
    - Clique em `Executar`.
    - Isso criará o banco de dados `crud_db` e as tabelas `categorias` e `produtos` com alguns dados de exemplo.

### Conteúdo de `database.sql`:
```sql
CREATE DATABASE IF NOT EXISTS `crud_db`;

USE `crud_db`;

CREATE TABLE IF NOT EXISTS `categorias` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `nome` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `produtos` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `nome` VARCHAR(255) NOT NULL,
    `descricao` TEXT,
    `preco` DECIMAL(10, 2) NOT NULL,
    `categoria_id` INT(11) NOT NULL,
    PRIMARY KEY (`id`),
    FOREIGN KEY (`categoria_id`) REFERENCES `categorias`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Inserir dados de exemplo na tabela categorias
INSERT INTO `categorias` (`nome`) VALUES
(\'Eletrônicos\'),
(\'Livros\'),
(\'Vestuário\');

-- Inserir dados de exemplo na tabela produtos
INSERT INTO `produtos` (`nome`, `descricao`, `preco`, `categoria_id`) VALUES
(\'Smartphone X\', \'Um smartphone de última geração com câmera de alta resolução.\', 1200.00, 1),
(\'O Senhor dos Anéis\', \'Trilogia épica de fantasia de J.R.R. Tolkien.\', 85.50, 2),
(\'Camiseta Básica\', \'Camiseta de algodão 100% na cor preta.\', 35.90, 3),
(\'Notebook Gamer\', \'Notebook potente para jogos e tarefas exigentes.\', 4500.00, 1),
(\'A Revolução dos Bichos\', \'Uma fábula satírica de George Orwell.\', 29.99, 2);
```

## 6. Estrutura do Projeto
A aplicação segue uma estrutura modular para melhor organização:

```
crud_php/
├── config/
│   └── database.php         # Configurações de conexão com o banco de dados
├── controllers/
│   ├── CategoriaController.php  # Lógica de controle para categorias
│   └── ProdutoController.php    # Lógica de controle para produtos
├── models/
│   ├── Categoria.php        # Modelo para a tabela categorias
│   └── Produto.php          # Modelo para a tabela produtos
├── views/
│   ├── categorias/
│   │   ├── index_cat.php        # Listagem de categorias
│   │   ├── create_cat.php       # Formulário para criar categoria
│   │   └── edit_cat.php         # Formulário para editar categoria
│   ├── produtos/
│   │   ├── index_prod.php        # Listagem de produtos
│   │   ├── create_prod.php       # Formulário para criar produto
│   │   └── edit_prod.php         # Formulário para editar produto
│   └── includes/
│       ├── header.php       # Cabeçalho comum a todas as páginas
│       └── footer.php       # Rodapé comum a todas as páginas
├── public/
│   ├── css/
│   │   └── style.css        # Arquivo CSS externo
│   ├── index.php            # Ponto de entrada da aplicação (roteamento simples)
│   └── .htaccess            # Para reescrita de URL
└── README.md                # Documentação geral do projeto
```

- **`config/database.php`**: Contém as credenciais e a lógica para estabelecer a conexão com o banco de dados MySQL.
- **`controllers/`**: Contém a lógica de negócios e o controle do fluxo da aplicação. Cada arquivo de controller é responsável por uma entidade (e.g., `CategoriaController.php` para categorias).
- **`models/`**: Contém as classes que representam as tabelas do banco de dados e a lógica para interagir com elas (CRUD).
- **`views/`**: Contém os arquivos HTML/PHP responsáveis pela apresentação dos dados ao usuário. Separados por entidade e tipo de operação (listagem, criação, edição).
- **`public/css/style.css`**: Arquivo de estilos CSS para toda a aplicação.
- **`public/index.php`**: O arquivo principal que gerencia as requisições e as direciona para os controllers apropriados, utilizando um roteamento simples baseado em parâmetros GET.
- **`public/.htaccess`**: Configura a reescrita de URLs amigáveis, direcionando todas as requisições para `public/index.php`.

## 7. Como Usar
Após configurar o XAMPP e o banco de dados conforme as seções anteriores:
1. Abra seu navegador.
2. Acesse a aplicação através do URL: `http://localhost/crud_php/public/`
3. Você será redirecionado para a página de listagem de produtos.
4. Use os links de navegação para alternar entre as listagens de Produtos e Categorias.
5. Em cada seção, você encontrará botões para `Criar`, `Editar` e `Deletar` registros.

## 8. Desenvolvimento
### Conexão com o Banco de Dados
A conexão é gerenciada pela classe `Database` em `config/database.php`. As credenciais são configuradas para o ambiente padrão do XAMPP (`root` sem senha).

### Modelos (Models)
As classes `Categoria` e `Produto` (em `models/`) encapsulam a lógica de acesso e manipulação de dados para suas respectivas tabelas. Elas contêm métodos para operações CRUD (`read`, `create`, `readOne`, `update`, `delete`).

### Controladores (Controllers)
Os controladores `CategoriaController` e `ProdutoController` (em `controllers/`) atuam como intermediários entre os modelos e as visões. Eles recebem as requisições, interagem com os modelos para obter ou manipular dados e, em seguida, preparam os dados para serem exibidos pelas visões.

### Visões (Views)
As visões (em `views/`) são responsáveis por renderizar a interface do usuário. Elas incluem arquivos para listagem (`index.php`), criação (`create.php`) e edição (`edit.php`) de categorias e produtos. Os arquivos `header.php` e `footer.php` são incluídos em todas as páginas para manter a consistência do layout.

### Roteamento
O arquivo `public/index.php` atua como um roteador simples, analisando os parâmetros `page` e `action` da URL para incluir o controlador e a visão corretos. O arquivo `.htaccess` na pasta `public` garante que todas as requisições sejam direcionadas para `index.php`, permitindo URLs mais limpas.

### Estilização
O arquivo `public/css/style.css` contém todos os estilos CSS para a aplicação, garantindo uma aparência consistente e separando a apresentação da lógica do PHP.

---

## 👤 GitHub

[![Foto de Perfil](https://github.com/floresjcd.png?size=50)](https://github.com/floresjcd) 
**[@floresjcd](https://github.com/floresjcd)**
