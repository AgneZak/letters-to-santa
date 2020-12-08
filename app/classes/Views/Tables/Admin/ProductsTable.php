<?php

namespace App\Views\Tables\Admin;

use App\App;
use App\Views\Forms\Admin\DeleteForm;
use Core\Views\Link;
use Core\Views\Table;

class ProductsTable extends Table
{
    public function __construct()
    {
        $rows = App::$db->getRowsWhere('wishes', ['email' => $_SESSION['email']]);


        foreach ($rows as $id => &$row) {
            $link = new Link([
                'link' => "/admin/edit.php?id={$id}",
                'text' => 'Edit'
            ]);

            unset($row['email']);

            $rows[$id]['link'] = $link->render();

            $deleteForm = new DeleteForm($id);
            $rows[$id]['delete'] = $deleteForm->render();
        }

        parent::__construct([
            'headers' => [
                'Wish',
                'Is it public',
                'Price',
                'Image url'
            ],
            'rows' => $rows
        ]);
    }
}