<?php


namespace App\Controllers\Admin;


use App\App;
use App\Controllers\Base\AuthController;
use App\Views\BasePage;
use App\Views\Forms\Admin\AddForm;
use Core\View;

class EditController extends AuthController
{
    protected AddForm $form;
    protected BasePage $page;

    public function __construct()
    {
        parent::__construct();
        $this->form = new AddForm();
        $this->page = new BasePage([
            'title' => 'Edit Item',
        ]);
    }

    public function edit(): ?string
    {
        $row_id = $_GET['id'] ?? null;

        if ($row_id === null) {
            header("Location: /admin/list.php");
            exit();
        }

        $row = (App::$db->getRowById('wishes', $row_id));
        unset($row['email']);
        unset($row['fulfilled']);

        $this->form->fill($row);

        if ($this->form->validate()) {
            $clean_inputs = $this->form->values();

            App::$db->updateRow('wishes', $row_id, $clean_inputs + [
                    'email' => $_SESSION['email'],
                    'fulfilled' => 'false'
                ]);

            $p = 'You edited the item';
        }

        $content = new View([
            'title' => 'Edit item',
            'form' => $this->form->render(),
            'message' => $p ?? null
        ]);

        $this->page->setContent($content->render(ROOT . '/app/templates/content/forms.tpl.php'));

        return $this->page->render();
    }

}