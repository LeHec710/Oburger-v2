<?php
class View {
    private $_file;
    private $_title;

    public function __construct($action) {
        $this->_file = 'views/view'.$action.'.php';   
    }

    public function generate($data) {
        $content = $this->generateFile($this->_file, $data);
        $data += array("content" => $content);
        $view = $this->generateFile('views/template.php', $data);
        echo $view;
    }

    public function generateFile($file, $data) {
        if(file_exists($file)) {
            extract($data);
            ob_start();
            require $file;
            return ob_get_clean();
        } else {
            throw new Exception("Fichier ".$file." introuvable");
        }
    }
}
?>