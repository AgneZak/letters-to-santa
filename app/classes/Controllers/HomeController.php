<?php

namespace App\Controllers;

use App\Abstracts\Controller;
use App\App;
use App\Views\BasePage;
use Core\View;

class HomeController extends Controller
{
    protected BasePage $page;

    /**
     * Controller constructor.
     *
     * We can write logic common for all
     * other methods
     *
     * For example, create $page object,
     * set it's header/navigation
     * or check if user has a proper role
     *
     * Goal is to prepare $page
     */
    public function __construct()
    {
        $this->page = new BasePage([
            'title' => 'Wishes'
        ]);
    }

    /**
     * This method builds or sets
     * current $page content
     * renders it and returns HTML
     *
     * So if we have ex.: ProductsController,
     * it can have methods responsible for
     * index() (main page, usualy a list),
     * view() (preview single),
     * create() (form for creating),
     * edit() (form for editing)
     * delete()
     *
     * These methods can then be called on each page accordingly, ex.:
     * add.php:
     * $controller = new PixelsController();
     * print $controller->add();
     *
     *
     * my.php:
     * $controller = new ProductsController();
     * print $controller->my();
     *
     * @return string|null
     * @throws \Exception
     */
    function index(): ?string
    {
        // TODO: Implement index() method.

        if (App::$session->getUser()) {
            $h3 = "Sveiki sugrize {$_SESSION['email']}";
        } else {
            $h3 = 'Jus neprisijunges';
        }

        if (isset($_POST['id'])) {
            $rows = App::$db->getRowsWhere('wishes');
            foreach ($rows ?? [] as $key => $wish) {
                if ($key == $_POST['id']) {
                    $wish['fulfilled'] = 'true';
                    App::$db->updateRow('wishes', $key, $wish);
                }
            }
        }

        $content = new View([
            'title' => 'Letters to Santa',
            'heading' => $h3,
            'items' => App::$db->getRowsWhere('wishes')
        ]);

        $this->page->setContent($content->render(ROOT . '/app/templates/content/index.tpl.php'));


        return $this->page->render();
    }
}