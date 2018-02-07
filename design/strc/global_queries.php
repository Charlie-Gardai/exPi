<?php
/* -------------------- PAGE MANAGEMENT ---------------------*/
$page;
if (isset($_GET['page']) AND $_GET['page'] != null) {
  $page = escape_string($_GET['page']);
} else {
  $page = 'accueil';
}

$que_page = $db->query('SELECT id,
                               title,
                               class,
                               first_nav_title AS first_title,
                               first_nav_class AS first_class,
                               second_nav_title AS second_title,
                               second_nav_class AS second_class
                          FROM pages
                            WHERE class = \'' . $page . '\'');

$data_page = $que_page->fetchAll(PDO::FETCH_ASSOC);
$que_page->closeCursor();
$data_page = $data_page[0];

$page_inf = new Page;
$page_inf->init(
  $data_page['id'],
  $data_page['title'],
  $data_page['class']
);
$page_inf->push_section($data_page['first_title'], $data_page['first_class']);
$page_inf->push_section($data_page['second_title'], $data_page['second_class']);
?>