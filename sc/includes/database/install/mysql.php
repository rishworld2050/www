<?php //MySQL installation - tables definition
/*****************************************************************************
 *                                                                           *
 * Shop-Script FREE                                                          *
 * Copyright (c) 2005 WebAsyst LLC. All rights reserved.                     *
 *                                                                           *
 ****************************************************************************/

	db_query("DROP TABLE IF EXISTS ".ORDERS_TABLE.";") or die (db_error());
	db_query("DROP TABLE IF EXISTS ".ORDERED_CARTS_TABLE.";") or die (db_error());
	db_query("DROP TABLE IF EXISTS ".PRODUCTS_TABLE.";") or die (db_error());
	db_query("DROP TABLE IF EXISTS ".CATEGORIES_TABLE.";") or die (db_error());
	db_query("DROP TABLE IF EXISTS ".SPECIAL_OFFERS_TABLE.";") or die (db_error());

	db_query("CREATE TABLE ".ORDERS_TABLE." (orderID INT PRIMARY KEY AUTO_INCREMENT, order_time DATETIME, cust_firstname VARCHAR(30), cust_lastname VARCHAR(30), cust_email VARCHAR(30), cust_country VARCHAR(30), cust_zip VARCHAR(30), cust_state VARCHAR(30), cust_city VARCHAR(30), cust_address VARCHAR(30), cust_phone VARCHAR(30))") or die (db_error());
	db_query("CREATE TABLE ".ORDERED_CARTS_TABLE." (productID INT NOT NULL, orderID INT NOT NULL, name CHAR(255), Price FLOAT, Quantity INT, PRIMARY KEY (productID, orderID))") or die (db_error());
	db_query("CREATE TABLE ".PRODUCTS_TABLE." (productID INT PRIMARY KEY AUTO_INCREMENT, categoryID INT, name VARCHAR(255), description TEXT, customers_rating FLOAT NOT NULL, Price FLOAT, picture VARCHAR(30), in_stock INT, thumbnail VARCHAR(30), customer_votes INT NOT NULL, items_sold INT NOT NULL, big_picture VARCHAR(30), enabled INT NOT NULL, brief_description TEXT, list_price FLOAT, product_code CHAR(25))") or die (db_error());
	db_query("CREATE TABLE ".CATEGORIES_TABLE." (categoryID INT PRIMARY KEY AUTO_INCREMENT, name VARCHAR(255), parent INT, products_count INT, description TEXT, picture VARCHAR(30), products_count_admin INT)") or die (db_error());
	db_query("CREATE TABLE ".SPECIAL_OFFERS_TABLE." (offerID INT PRIMARY KEY AUTO_INCREMENT, productID INT, sort_order INT)") or die (db_error());

?>