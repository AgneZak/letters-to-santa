<?php

namespace App\Views\Forms\Admin;

use Core\Views\Form;

class AddForm extends Form
{
    public function __construct()
    {
        parent::__construct([
            'attr' => [
                'method' => 'POST'
            ],
            'fields' => [
                'wish' => [
                    'label' => 'Wish',
                    'type' => 'textarea',
                    'validators' => [
                        'validate_field_not_empty',
                        'validate_number_of_symbols' => [
                            'max' => 200
                        ]
                    ],
                ],
                'option' => [
                    'label' => 'Is it public?',
                    'type' => 'select',
                    'options' => [
                        'public' => 'Public',
                        'not' => 'Not Public'
                    ],
                    'validators' => [
                        'validate_select',
                    ],
                    'value' => 'public'
                ],
                'price' => [
                    'label' => 'Price of wish',
                    'type' => 'number',
                    'value' => '',
                    'validators' => [
                        'validate_field_not_empty',
                        'validate_is_numeric',
                        'validate_field_range' => [
                            'min' => 1,
                            'max' => 100
                        ]
                    ],
                    'extra' => [
                        'attr' => [
                            'placeholder' => '99',
                            'class' => 'input-field'
                        ]
                    ]
                ],
                'url' => [
                    'label' => 'Image to wish',
                    'type' => 'text',
                    'extra' => [
                        'attr' => [
                            'placeholder' => 'Http://url',
                            'class' => 'input-field'
                        ]
                    ]
                ]
            ],
            'buttons' => [
                'submit' => [
                    'title' => 'Submit',
                    'type' => 'submit',
                    'extra' => [
                        'attr' => [
                            'class' => 'btn'
                        ]
                    ]
                ],
                'clear' => [
                    'title' => 'Clear',
                    'type' => 'reset',
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