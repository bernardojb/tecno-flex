<?php

# --------------------------------------------------
# Require connection and CRUD
# --------------------------------------------------
require_once 'class.conn.php';
require_once 'class.crud.php';
# --------------------------------------------------
# Start PDO
# --------------------------------------------------
$pdo = ConnectionSEO::getInstance();
# --------------------------------------------------
# CRUD x Table relations
# --------------------------------------------------
$crud_ban       = CrudSEO::getInstance($pdo,'banners');
$crud_cat       = CrudSEO::getInstance($pdo,'categories');
$crud_subcat    = CrudSEO::getInstance($pdo,'subcategories');
$crud_prod      = CrudSEO::getInstance($pdo,'seo');
$crud_img       = CrudSEO::getInstance($pdo,'images');
$crud_usr       = CrudSEO::getInstance($pdo,'users');
$crud_log       = CrudSEO::getInstance($pdo,'logs');
$crud_art       = CrudSEO::getInstance($pdo,'articles');
$crud_news      = CrudSEO::getInstance($pdo,'news');
$crud_proj      = CrudSEO::getInstance($pdo,'projects');
$crud_gal       = CrudSEO::getInstance($pdo,'gallery');
$crud_videos    = CrudSEO::getInstance($pdo,'videos');
$crud_pdf       = CrudSEO::getInstance($pdo,'pdf');
$crud_news_pdf  = CrudSEO::getInstance($pdo,'news_pdf');
$crud_proj_pdf  = CrudSEO::getInstance($pdo,'proj_pdf');
# --------------------------------------------------