<?php

namespace Core;

class Controller
{
    /**
     * @var string
     */
    private static $_render;

    /**
     * @var Request
     */
    protected $request;

    public function __construct()
    {
        $this->request = new Request();
    }

    public function __destruct()
    {
        echo self::$_render;
    }

    protected function user_is_log(): void
    {
        if (!isset($_SESSION['user_id'])) {
            header('location: ' . BASE_URI . '/login');
            die;
        }
    }

    protected function render(string $view, array $scope=[])
    {
        $file = implode(DIRECTORY_SEPARATOR, [
                dirname(__DIR__),
                'src',
                'View',
                trim(str_replace('Controller', '', basename(get_class($this))), '\\'),
                $view
            ]). '.php';
        $tpl = new TemplateEngine($file, $scope);
        self::$_render = $tpl->render();
    }
}
