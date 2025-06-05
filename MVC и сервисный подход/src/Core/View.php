<?php
namespace App\Core;

class View
{
    private static function view(string $view, array $data = [])
    {
        $file = __DIR__ . "/../../views/" . $view . ".php";
        if (!file_exists($file)) {
            throw new \RuntimeException("Template not found: " . $file . "");
        }

        extract($data);
        include $file;
    }

    public static function render(string $view, array $data = [])
    {
         ob_start();
         View::view($view, $data);
         $content = ob_get_clean();
         View::view("layout", ['content' => $content]);
    }
}
