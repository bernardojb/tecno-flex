<?php

# --------------------------------------------------
header("Content-Type: text/html; charset=utf-8", true);
# --------------------------------------------------
# Page protection
# --------------------------------------------------
require_once '../lib/class.check.php';
# --------------------------------------------------
# Includes
# --------------------------------------------------
require_once '../lib/cfg.global.php';
# --------------------------------------------------
# Variables
# --------------------------------------------------
$cat_id = $_POST['cat_id'];
# --------------------------------------------------
# SQL
# --------------------------------------------------
$sql         = "SELECT * FROM subcategories WHERE cat_id = ?";
$arrayParam  = array($cat_id);
$data_subcat = $crud_subcat->getSQLGeneric($sql, $arrayParam, true);
# ----------------------------------------
foreach($data_subcat as $subcat_info)
{
  echo '<option value="'.$subcat_info->subcat_id.'">#'.$subcat_info->subcat_id.' - '.$subcat_info->subcat_title.'</option>';
}