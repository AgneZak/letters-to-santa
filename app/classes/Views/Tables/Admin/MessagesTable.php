<?php


namespace App\Views\Tables\Admin;


use App\App;
use App\Views\Forms\Admin\DeleteForm;
use Core\Views\Link;
use Core\Views\Table;

class MessagesTable extends Table
{
    public function __construct()
    {
        $rows = App::$db->getRowsWhere('messages');

        parent::__construct([
            'headers' => [
                'Name',
                'Message'
            ],
            'rows' => $rows
        ]);
    }
}