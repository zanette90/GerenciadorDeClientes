# Teste Prático de Desenvolvimento - Cadastro de Cliente

## Objetivo

Desenvolver uma aplicação utilizando **Laravel** e **Bootstrap** para cadastro de clientes, aplicando boas práticas de desenvolvimento e organização do código.

---

## Requisitos do Projeto

### 1. Cadastro de Cliente

A aplicação deve permitir o cadastro de clientes com os seguintes campos obrigatórios:

- **Nome**
- **CPF ou CNPJ**
- **Endereço completo** (Rua, Número, Bairro, Cidade, Estado, CEP)
- **Telefone**
- **E-mail**

A aplicação deve utilizar a **API ViaCEP** para buscar automaticamente os dados de endereço ao informar o **CEP**.

### 2. Autenticação

A aplicação deve implementar o sistema de login e senha utilizando o sistema de autenticação padrão do Laravel. **Não é necessário criar um cadastro de usuários**, apenas utilizar o sistema de login já existente no Laravel.

### 3. Padrões do Laravel

A aplicação deve seguir o padrão **Model-View-Controller (MVC)** do Laravel, separando claramente a lógica de negócio (Model), as views (exibição) e os controladores (Controllers).

### 4. Interface

A interface da aplicação deve ser estilizada utilizando **Bootstrap** para garantir um layout simples e responsivo.

CRITÉRIOS DE AVALIAÇÃO  
• Organização e estrutura do código 
• Uso correto dos recursos do Laravel  
• Implementação do consumo da API ViaCEP  
• Interface responsiva e bem estruturada com Bootstrap  
• Documentação clara no README.md  
Boa sorte! 🚀 


## Como Executar o Projeto

Para executar este projeto localmente, siga as etapas abaixo:

### 1. Pré-requisitos

- Instale o **PHP** (versão 8 ou superior).
- Instale o **Composer**.
- Instale o **Laravel** utilizando o Composer.

## Como instalar e executar o projeto:

1. Instalar o **PHP** versão 8.
2. Instalar o **Composer**.
3. Instalar o **Laravel** com o Composer.
4. Baixar o projeto para a pasta de sua preferência.
5. Abrir o CMD na pasta onde o projeto foi baixado e digitar:
   php artisan serve

Endpoints Disponíveis
1. /cadastro
Método: POST

Descrição: Permite o cadastro de novos clientes. O formulário inclui campos para nome, CPF/CNPJ, endereço, telefone e e-mail. O endereço é preenchido automaticamente ao inserir o CEP, utilizando a API ViaCEP.

2. /clientes
Método: GET

Descrição: Lista todos os clientes cadastrados na aplicação



