<?php


namespace App\Views\Forms;


use Core\Views\Form;

class RegisterForm extends Form
{
    public function __construct()
    {
        parent::__construct([
            'attr' => [
                'method' => 'POST'
            ],
            'fields' => [
                'name' => [
                    'label' => 'Name',
                    'type' => 'text',
                    'validators' => [
                        'validate_field_not_empty',
                        'validate_no_special_chars'
                    ],
                    'extra' => [
                        'attr' => [
                            'placeholder' => 'Vardenis',
                            'class' => 'input-field'
                        ]
                    ]
                ],
                'surname' => [
                    'label' => 'Surname',
                    'type' => 'text',
                    'validators' => [
                        'validate_field_not_empty',
                        'validate_no_special_chars'
                    ],
                    'extra' => [
                        'attr' => [
                            'placeholder' => 'Pavardenis',
                            'class' => 'input-field'
                        ]
                    ]
                ],
                'email' => [
                    'label' => 'Email',
                    'type' => 'email',
                    'value' => '',
                    'validators' => [
                        'validate_field_not_empty',
                        'validate_user_unique',
                        'validate_email'
                    ],
                    'extra' => [
                        'attr' => [
                            'placeholder' => 'email@mail',
                            'class' => 'input-field'
                        ]
                    ]
                ],
                'password' => [
                    'label' => 'Password',
                    'type' => 'password',
                    'value' => '',
                    'validators' => [
                        'validate_field_not_empty',
                    ],
                    'extra' => [
                        'attr' => [
                            'placeholder' => 'password',
                            'class' => 'input-field'
                        ]
                    ]
                ],
                'password_repeat' => [
                    'label' => 'Password repeat',
                    'type' => 'password',
                    'value' => '',
                    'validators' => [
                        'validate_field_not_empty',
                    ],
                    'extra' => [
                        'attr' => [
                            'placeholder' => 'password',
                            'class' => 'input-field'
                        ]
                    ]
                ],
            ],
            'buttons' => [
                'submit' => [
                    'title' => 'Register',
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
            ],
            'validators' => [
                'validate_field_match' => [
                    'password',
                    'password_repeat'
                ],
            ]
        ]);
    }
}