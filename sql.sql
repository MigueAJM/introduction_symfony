CREATE DATABASE IF NOT EXISTS test;
use DATABASE test;

CREATE TABLE  IF NOT EXISTS products(
    id_product SERIAL,
    name VARCHAR(100),
    active BOOLEAN DEFAULT true,
    CONSTRAINT pk_id_product PRIMARY KEY(id_product)
);

INSERT INTO products VALUES
(1,'Jersey America',true),
(2,'Jersey Barcelona',true),
(3,'Jersey Chelsea',true),
(4,'Jersey Bayern',true),
(5,'Jersey cHIVAS',true),
(6,'Jersey Pumas',true),
(7,'Jersey Cruz azul',true);