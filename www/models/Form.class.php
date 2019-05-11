<?php

namespace Project\Models;

class Form
{
    /**
     * @return array
     */
    public function getLoginForm(): array
    {
        return [
            'config' => [
                'method' => 'POST',
                'action' => '',
                'class' => '',
                'id' => '',
                'submit' => 'Se connecter',
                'reset' => 'Annuler', ],

            'data' => [
                'email' => ['type' => 'email', 'placeholder' => 'Votre email', 'required' => true, 'class' => 'form-control', 'id' => 'email',
                    'error' => "L'email n'est pas valide", ],

                'pwd' => ['type' => 'password', 'placeholder' => 'Votre mot de passe', 'required' => true, 'class' => 'form-control', 'id' => 'pwd',
                    'error' => 'Veuillez préciser un mot de passe', ],
            ],
        ];
    }
}
