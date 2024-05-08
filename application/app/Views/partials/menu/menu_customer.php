<!-- Meny för kunder -->
<?php
$menu_items = [
  [
    "title" => "Mina prenumeranter",
    "url" => "/subscribers",
  ],
  [
    "title" => "Mitt nyhetsbrev",
    "url" => "/my-newsletter",
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
