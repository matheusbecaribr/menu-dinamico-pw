CREATE DATABASE atividade_menu_dinamico;
USE atividade_menu_dinamico;

CREATE TABLE usuario(
    id INT PRIMARY KEY AUTO_INCREMENT,
    login VARCHAR(100),
    name VARCHAR(100),
    email VARCHAR(100),
    password VARCHAR(100),
    nivel INT
);

CREATE TABLE cliente(
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100),
    email VARCHAR(100),
    password VARCHAR(100)
);

CREATE TABLE produto(
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100),
    description VARCHAR(100),
    price DOUBLE(10,2)
);

INSERT INTO usuario VALUES (null, '@tester', 'Teste', 'teste@example', 'teste', 2);
INSERT INTO usuario VALUES (null, '@admin', 'Admin', 'admin@admin', 'admin', 1);