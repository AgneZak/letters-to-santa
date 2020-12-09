<?php


namespace App\Controllers\Admin;


use App\App;
use App\Controllers\Base\AuthController;
use App\Views\BasePage;
use App\Views\Forms\Admin\DeleteForm;
use App\Views\Tables\Admin\ProductsTable;
use Core\Views\Form;

class MessagesController extends AuthController
{
    protected DeleteForm $form;
    protected BasePage $page;

    public function __construct()
    {
        parent::__construct();
        $this->form = new deleteForm();
        $this->page = new BasePage([
            'title' => 'Edit wishes',
        ]);
    }

    public function messages(): ?string
    {
        $table = new ProductsTable();

        $this->page->setContent($table->render());

        return $this->page->render();
    }

}