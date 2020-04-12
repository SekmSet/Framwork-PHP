<?php
namespace Core;

class TemplateEngine
{
    /**
     * @var string
     */
    private $view;

    /**
     * @var array
     */
    private $scope;

    /**
     * @var array
     */
    private $tags = [
        '\{\{([^}]*)\}\}' => "<?= htmlentities($1) ?>",
        '@if(.*)' => '<?php if $1 : ?>',
        '@elseif(.*)' => '<?php elseif $1 : ?>',
        '@else' => '<?php else : ?>',
        '@endempty|@endif|@endisset|@endislog' => '<?php endif ?>',
        '@foreach(.*)' => '<?php foreach $1 : ?>',
        '@endforeach' => '<?php endforeach ?>',
        '@empty(.*)' => '<?php if (empty $1) : ?>',
        '@notempty(.*)' => '<?php if (!empty $1) : ?>',
        '@isset(.*)' => '<?php if (isset $1) : ?>',
        '@islog' => '<?php if (isset ($_SESSION["user_id"])) : ?>',
        '@isnotlog' => '<?php if (!isset ($_SESSION["user_id"])) : ?>',
    ];

    /**
     * TemplateEngine constructor.
     * @param $view
     * @param array $scope
     */
    public function __construct(string $view, array $scope=[])
    {
        $this->view = $view;
        $this->scope = $scope;
    }

    public function render()
    {
        extract($this->scope);

        if (file_exists($this->view)) {
            ob_start();
            include($this->view) ;
            $view = ob_get_clean();

            ob_start();
            include(implode(DIRECTORY_SEPARATOR, [
                    dirname(__DIR__),
                    'src',
                    'View',
                    'index'
                ]). '.php');

            $result = ob_get_clean();

            ob_start();
            foreach ($this->tags as $key => $value) {
                $result = preg_replace('/'.$key.'/', $value, $result);
            }

            if (!empty($result)) {
                eval("?> $result");
            }
//            echo $result;
            return ob_get_clean();
        } else {
            echo 'Tu es vraiment null, regarde le nom de tes dossiers, fichiers … THALOOPE !!! ' . $this->view . ' Enfant con.' .PHP_EOL;
        }
        return '';
    }
}
