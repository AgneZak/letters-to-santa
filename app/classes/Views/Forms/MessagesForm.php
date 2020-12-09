<?php


namespace App\Views\Forms;


use Core\Views\Form;

class MessagesForm extends Form
{
    public function __construct()
    {
        parent::__construct([
            'attr' => [
                'method' => 'POST'
            ],
            'fields' => [
                'name' =>[
                    'label' => 'Name and surname',
                    'type' => 'text',
                    'validators' => [
                        'validate_field_not_empty',
                        'validate_field_has_space'
                    ]
                ],
                'message' => [
                    'label' => 'Message',
                    'type' => 'textarea',
                    'validators' => [
                        'validate_field_not_empty',
                        'validate_number_of_symbols' => [
                            'max' => 200
                        ]
                    ],
                ],

            ],
            'buttons' => [
                'submit' => [
                    'title' => 'Message',
                    'type' => 'submit',
                    'extra' => [
                        'attr' => [
                            'class' => 'btn'
                        ]
                    ]
                ]
            ]
        ]);
    }
}