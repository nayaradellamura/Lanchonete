
CREATE DATABASE IF NOT EXISTS info_lanches;
USE info_lanches;

CREATE TABLE admin (
    id INT PRIMARY KEY AUTO_INCREMENT,
    usuario VARCHAR(50) NOT NULL,
    senha VARCHAR(255) NOT NULL
);

INSERT INTO admin (usuario, senha) VALUES ('admin', SHA2('123456', 256));

CREATE TABLE produtos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100),
    descricao TEXT,
    preco DECIMAL(10,2),
    quantidade INT,
    imagem VARCHAR(255),
    categoria VARCHAR(100)
);

CREATE TABLE vendas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    produto_id INT,
    quantidade INT,
    valor_total DECIMAL(10,2),
    data_venda DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (produto_id) REFERENCES produtos(id)
);

INSERT INTO produtos (nome, descricao, preco, quantidade, imagem, categoria) VALUES
('X-Burguer', 'Hamburguer simples', 12.00, 30, 'xburguer.jpg', 'Lanche'),
('Batata Frita', 'Porção média', 8.00, 50, 'batata.jpg', 'Acompanhamento'),
('Refrigerante', 'Coca-cola lata', 5.00, 40, 'coca.jpg', 'Bebida');

INSERT INTO vendas (produto_id, quantidade, valor_total) VALUES
(1, 2, 24.00),
(2, 1, 8.00),
(3, 3, 15.00);
