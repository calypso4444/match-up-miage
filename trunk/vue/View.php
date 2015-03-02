<?php

/**
 * Description of View
 *
 * @author Quang Kiet
 */
class View {
    
    public function render($nomPage, $vars) {
        include_once 'vue/template/head.php';
        include_once 'vue/template/header.php';
        include_once 'vue/template/nav.php';
        include_once 'vue/Page/'. $nomPage . '.php';
        include_once 'vue/template/footer.php';
    }
    
}

?>
