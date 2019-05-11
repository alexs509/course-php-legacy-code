<?php
namespace Project\Core;

class View
{
    private $v;
    private $t;
    private $data = [];

    /**
     * View constructor.
     * @param $v
     * @param string $t
     */
    public function __construct($v, $t = 'back')
    {
        $this->setView($v);
        $this->setTemplate($t);
    }

    /**
     * @param string $v
     */
    public function setView(string $v): void
    {
        $viewPath = 'views/'.$v.'.view.php';
        if (file_exists($viewPath)) {
            $this->v = $viewPath;
        } else {
            die("Attention le fichier view n'existe pas ".$viewPath);
        }
    }

    /**
     * @param string $t
     */
    public function setTemplate(string $t): void
    {
        $templatePath = 'views/templates/'.$t.'.tpl.php';
        if (file_exists($templatePath)) {
            $this->t = $templatePath;
        } else {
            die("Attention le fichier template n'existe pas ".$templatePath);
        }
    }

    /**
     * @param string $modal
     * @param $config
     */
    public function addModal(string $modal, array $config): void
    {
        $modalPath = 'views/modals/'.$modal.'.mod.php';
        if (file_exists($modalPath)) {
            include $modalPath;
        } else {
            die("Attention le fichier modal n'existe pas ".$modalPath);
        }
    }

    /**
     * @param string $key
     * @param $value
     */
    public function assign(string $key, $value): void
    {
        $this->data[$key] = $value;
    }

    public function __destruct()
    {
        extract($this->data);
        include $this->t;
    }
}
