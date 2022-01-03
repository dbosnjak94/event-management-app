<?php

class View {

    protected $_template;

    public function __construct($file) {
        $this->_template = $file;
    }

    public function render($data) {
        if (!file_exists($this->_template)) {
            throw new Exception("Template file " . $this->_template . " doesn't exist.");
        }
        include PROJECT_ROOT . 'app/view/inc/header.php';
        include $this->_template;
        include PROJECT_ROOT . 'app/view/inc/footer.php';
    }

}

