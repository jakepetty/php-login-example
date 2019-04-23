<?php
class Flash
{
    public function redirect($_url = null)
    {
        $parts = explode('/', $_SERVER['PHP_SELF']);
        unset($parts[count($parts) - 1]);
        $root = implode('/', $parts);
        header("location: " . $root . $_url);
        exit();
    }

    public function set($_msg, $_class = 'danger')
    {
        $_SESSION['Flash']['class'] = $_class;
        $_SESSION["Flash"]["message"] = $_msg;
    }

    public function display()
    {
        if (isset($_SESSION["Flash"]["message"])) {
            echo sprintf('<div class="alert alert-%s alert-dismissible fade show" role="alert">%s<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>', $_SESSION["Flash"]["class"], $_SESSION["Flash"]["message"]);
            $this->clear();
        }
    }
    private function clear()
    {
        unset($_SESSION["Flash"]);
    }
}
