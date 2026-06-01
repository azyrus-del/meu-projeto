CREATE DATABASE IF NOT EXISTS Sistema;
USE Sistema;

CREATE TABLE IF NOT EXISTS clientes (
    id_cliente INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(50) UNIQUE,
    status VARCHAR(1) DEFAULT 'A'
);

CREATE TABLE IF NOT EXISTS produtos (
    id_produto INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    dsc_produto VARCHAR(50) NOT NULL,
    vlr_unit DECIMAL(10,2) NOT NULL,
    status VARCHAR(1) DEFAULT 'A'
);

CREATE TABLE IF NOT EXISTS vendas (
    id_venda INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    id_cliente INT NOT NULL,
    data_venda DATE NOT NULL,
    CONSTRAINT fk_cliente_venda FOREIGN KEY (id_cliente) REFERENCES  clientes(id_cliente)
);

CREATE TABLE IF NOT EXISTS itens_venda (
    id_item INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    id_venda INT NOT NULL,
    id_produto INT NOT NULL,
    qtd INT NOT NULL,
    vlr_item DECIMAL(10,2) NOT NULL,
    CONSTRAINT fk_venda_item FOREIGN KEY (id_venda) REFERENCES vendas(id_venda),
    CONSTRAINT fk_produto_item FOREIGN KEY (id_produto) REFERENCES produtos(id_produto)
);

DELIMITER //

CREATE TRIGGER trg_calcula_vlr_item_insert
BEFORE INSERT ON itens_venda
FOR EACH ROW
BEGIN
DECLARE preco_unitario DECIMAL (10,2);
SELECT vlr_unit INTO preco_unitario FROM produtos WHERE id_produto = NEW.id_produto;
    SET NEW.vlr_item = preco_unitario * NEW.qtd;
END; //

CREATE TRIGGER trg_calcula_vlr_item_update  
BEFORE UPDATE ON itens_venda
FOR EACH ROW
BEGIN 
    DECLARE preco_unitario DECIMAL (10,2);
    SELECT vlr_unit INTO preco_unitario FROM produtos WHERE id_produto =
NEW.id_produto;
    SET NEW.vlr_item = preco_unitario * NEW.qtd;
END; //

DELIMITER ;