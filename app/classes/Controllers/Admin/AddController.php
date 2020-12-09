<?php

namespace App\Controllers\Admin;

use App\App;
use App\Controllers\Base\AuthController;
use App\Views\BasePage;
use App\Views\Forms\Admin\AddForm;
use Core\View;

class AddController extends AuthController
{
    protected AddForm $form;
    protected BasePage $page;

    public function __construct()
    {
        parent::__construct();
        $this->form = new AddForm();
        $this->page = new BasePage([
            'title' => 'Add wishes',
        ]);
    }

    public function add(): ?string
    {
        if ($this->form->validate()) {
            $clean_inputs = $this->form->values();
            $wishes = App::$db->getRowsWhere('wishes');
            $wish_count = 0;

            foreach ($wishes as $wish) {
                if ($_SESSION['email'] === $wish['email']) {
                    $wish_count++;
                }
            }

            if ($wish_count < 3) {
                App::$db->insertRow('wishes', $clean_inputs + [
                        'email' => $_SESSION['email'],
                        'fulfilled' => 'false'
                    ]);

                $p = 'You added an item';
            } else {
                $p = 'You cant add anymore wishes';
            }

        }

        $content = new View([
            'title' => 'Add',
            'form' => $this->form->render(),
            'message' => $p ?? null
        ]);

        $this->page->setContent($content->render(ROOT . '/app/templates/content/forms.tpl.php'));

        return $this->page->render();
    }

}