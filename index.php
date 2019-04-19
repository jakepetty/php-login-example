<?php
require_once("components/header.php");
include_once(sprintf("pages/%s.php", (isset($_GET['page']) ? $_GET['page'] : 'home')));
require_once("components/footer.php");
