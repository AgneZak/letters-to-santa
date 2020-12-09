<?php


namespace App\Controllers\Admin;


use App\Controllers\Base\AuthController;
use App\Views\BasePage;
use App\Views\Tables\Admin\MessagesTable;

class MessagesController extends AuthController
{
    protected BasePage $page;

    public function __construct()
    {
        parent::__construct();
        $this->page = new BasePage([
            'title' => 'Messages',
        ]);
    }

    public function messages(): ?string
    {
        $table = new MessagesTable();

        $this->page->setContent($table->render());

        return $this->page->render();
    }

}