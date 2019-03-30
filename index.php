<?php
require_once("components/header.php");
?>

<div class="container mt-5">
    <?php include_once(sprintf("pages/%s.php", (isset($_GET['page']) ? $_GET['page'] : 'home'))); ?>
</div>
<?php
require_once("components/footer.php");
