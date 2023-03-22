<?php
$navItems = [
  [
    "name" => "Mark Zuckerberg",
    'url' => "index.php"
  ],
  [
    "name" => "Elon Musk",
    'url' => "elon.php"
  ],
  [
    "name" => "Steve Jobs",
    'url' => "steve.php"
  ],
  [
    "name" => "Jack Ma",
    'url' => "jack.php"
  ],
  [
  "name" => "List goat",
  'url' => "list-goat.php"
],
[
  "name" => "new goat",
  'url' => "new-goat.php"
],

]

?>

<nav class="<?= $bg ?> text-white md:flex justify-between px-20 py-4 text-xl">
  <a href="index.php" class="uppercase font-bold text-3xl">Goat.</a>
  <div class="space-x-6">
    <?php
    foreach ($navItems as $navitem) { ?>
      <a href="<?= $navitem["url"] ?>"><?= $navitem["name"] ?></a>
    <?php } ?>
  </div>
</nav>