<!-- Meny för prenumerant -->
<?php
$menu_items = [
  [
    "title" => "Alla nyhetsbrev",
    "url" => "/newsletters",
  ],
  [
    "title" => "Mina prenumerationer",
    "url" => "/subscriptions",
  ],
  [
    "title" => "Logga ut",
    "url" => "/logout",
  ],
];
foreach ($menu_items as $menu_item) {
  include "menu_link.php";
}


?>
