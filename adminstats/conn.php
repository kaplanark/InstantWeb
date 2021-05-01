<?php

### DB AYARLARINA GÖRE DÜZENLENEBİLİNİR ###

// DB BAĞLANMA
$db_host = "localhost";
$db_name = "blog_admin_db";
$db_user = "root";
$db_pw = "";


// DB TABLO
$GLOBALS['hits_table_name'] = "page_hits";
$GLOBALS['info_table_name'] = "visitor_info";

### BİTİR ###

// DB BAĞLAN
try {
	$GLOBALS['db'] = new PDO("mysql:host=".$db_host.";dbname=".$db_name, $db_user, $db_pw, array(PDO::ATTR_PERSISTENT => false, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, PDO::ATTR_EMULATE_PREPARES => false));
}
catch(PDOException $e) {
    echo $e->getMessage();
}

?>
