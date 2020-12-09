<?php


namespace App\Controllers\Admin;


use App\App;
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
        if (App::$session->getUser()) {
            if (App::$session->getUser()['email'] === 'santa@santa.lt') {

                $table = new MessagesTable();

                $this->page->setContent($table->render());

                return $this->page->render();
            }
        } else {
            header("Location: /login.php");
            exit();
        }
    }

}