<?php


namespace App\Controllers;


use App\App;
use App\Views\BasePage;
use App\Views\Forms\Admin\DeleteForm;
use Core\View;

class AboutController
{
    protected BasePage $page;

    public function __construct()
    {
        $this->page = new BasePage([
            'title' => 'About',
        ]);
    }

    function index(): ?string
    {
        // TODO: Implement index() method.

        $content = new View([
            'title' => 'About Santa',
            'img' => 'https://images.theconversation.com/files/302306/original/file-20191118-169393-r78x4o.jpg?ixlib=rb-1.1.0&q=45&auto=format&w=1200&h=675.0&fit=crop',
            'address' => 'Tähtikuja 1, 96930 Rovaniemi, Finland',
            'email' => 'joulupukinpaaposti@posti.fi'
        ]);

        $this->page->setContent($content->render(ROOT . '/app/templates/content/about.tpl.php'));

        return $this->page->render();
    }
}