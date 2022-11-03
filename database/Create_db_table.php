<?php

class Create_db_table {
    //create table for product
    protected $product_sql = "CREATE TABLE IF NOT EXISTS products(product_id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    brand VARCHAR(100) DEFAULT NULL,
    Pname VARCHAR(256) NOT NULL,
    prize INT DEFAULT 10,
    img VARCHAR(256) DEFAULT NULL,
    item_reg BOOLEAN DEFAULT true,
    ";
}