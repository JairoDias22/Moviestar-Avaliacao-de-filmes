# 🎬 Moviestar – Plataforma de Avaliação de Filmes

<p align="center">
<img src="imagens do readme/Moviestar.gif" width="600px" />
</p>

Moviestar é uma aplicação web desenvolvida com foco em permitir que usuários possam **avaliar, comentar e gerenciar filmes**, simulando uma plataforma semelhante a serviços populares de review.

---

## 🚀 Funcionalidades

* Cadastro e autenticação de usuários
* Edição de perfil
* Cadastro de filmes
* Avaliação e comentários
* Sistema de busca
* Dashboard do usuário
* Upload de imagens (filmes e usuários)

---

## 🛠️ Tecnologias Utilizadas

* PHP
* MySQL
* HTML5
* CSS3
* Bootstrap
* XAMPP

---
## 📂 Estrutura do Projeto

```
Moviestar_projeto
├── css/
├── dao/
├── img/
├── models/
├── templates/
├── imagens do readme/
├── auth.php
├── auth_process.php
├── dashboard.php
├── db.php
├── editmovie.php
├── editprofile.php
├── globals.php
├── index.php
├── indexx.php
├── logout.php
├── movie.php
├── movie_process.php
├── newmovie.php
├── profile.php
├── review_process.php
├── search.php
├── README.md
└── user_process.php
```

## 🗄️ Banco de Dados

O sistema utiliza um banco de dados MySQL composto por três tabelas principais:

* users → armazena os dados dos usuários
* movies → armazena os filmes cadastrados
* reviews → armazena as avaliações

---


## 📌 Script SQL

```sql
CREATE TABLE users (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    lastname VARCHAR(100),
    email VARCHAR(200),
    password VARCHAR(200),
    image VARCHAR(200),
    token VARCHAR(200),
    bio TEXT
);

CREATE TABLE movies (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100),
    description TEXT,
    image VARCHAR(200),
    trailer VARCHAR(150),
    category VARCHAR(50),
    length VARCHAR(50),
    users_id INT(11) UNSIGNED,
    FOREIGN KEY(users_id) REFERENCES users(id)
);

CREATE TABLE reviews (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    rating INT,
    review TEXT,
    users_id INT(11) UNSIGNED,
    movies_id INT(11) UNSIGNED,
    FOREIGN KEY (users_id) REFERENCES users(id),
    FOREIGN KEY (movies_id) REFERENCES movies(id)
);
```
---

## 🔗 Relacionamentos

* Um usuário pode cadastrar vários filmes
* Um usuário pode fazer várias avaliações
* Um filme pode receber várias avaliações

---

## ⚙️ Como Executar o Projeto

1. Clone o repositório:
   git clone https://github.com/JairoDias22/Moviestar-Avaliacao-de-filmes.git

2. Coloque o projeto na pasta htdocs do XAMPP

3. Crie o banco de dados e execute o script SQL acima

4. Configure o arquivo db.php

5. Inicie Apache e MySQL no XAMPP

6. Acesse no navegador:
   http://localhost/Moviestar

---

## 📸 Sobre o Projeto

Este projeto foi desenvolvido com foco em prática de desenvolvimento web, abordando organização de código, estruturação em PHP, integração com banco de dados e versionamento.

---

## 📌 Melhorias Futuras

* Implementação de arquitetura MVC completa
* Sistema de autenticação mais seguro
* Melhor responsividade
* Otimização de imagens
* Integração com APIs externas

---

## 👨‍💻 Autor

Jairo Dias

João Marcos

---

## 📄 Licença

Este projeto é apenas para fins educacionais.


---


