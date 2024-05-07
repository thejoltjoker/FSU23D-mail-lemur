<!-- Meny for utloggad -->
<?php
$menu_items = [
  [
    "title" => "Alla nyhetsbrev",
    "url" => "/newsletters",
  ],
  [
    "title" => "Logga in",
    "url" => "/login",
  ],
  [
    "title" => "Skapa konto",
    "url" => "/signup",
  ],
];
foreach ($menu_items as $menu_item) {
  include "menu_link.php";
}


?>
