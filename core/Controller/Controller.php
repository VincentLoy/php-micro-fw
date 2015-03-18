<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 14/03/2015
 * Time: 16:20
 */

namespace Core\Controller;

/**
 * Class Controller
 * @package Core\Controller
 * Class Controller generique servant a faire hériter les autres controllers de l'application
 */
class Controller {

    protected $viewPath;
    protected $template;

    protected function render($view, $vars = []) {

        ob_start();

        extract($vars);

        $view = $this->viewPath . str_replace('.', '/', $view) . '.php';
        require($view);

        $content = ob_get_clean();

        require($this->viewPath . 'templates/' . $this->template . '.php');

    }

    protected function forbidden() {
        header('HTTP/1.0 403 Forbidden');
        die('Acces Interdit');
    }

    protected function notFound() {
        header('HTTP/1.0 404 Not Found');
        die("Vous n'auriez jamais du venir ici");
    }
}