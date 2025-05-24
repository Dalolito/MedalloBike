<?php

return [
    'login' => [
        'title' => 'Iniciar sesión',
        'form' => [
            'email' => 'Correo electrónico',
            'password' => 'Contraseña',
            'remember_me' => 'Recordarme',
            'submit' => 'Iniciar sesión',
        ],
        'forgot_password' => '¿Olvidaste tu contraseña?',
    ],
    'register' => [
        'title' => 'Registrarse',
        'form' => [
            'name' => 'Nombre completo',
            'email' => 'Correo electrónico',
            'password' => 'Contraseña',
            'confirm_password' => 'Confirmar contraseña',
            'submit' => 'Registrarse',
        ],
    ],
    'verify' => [
        'title' => 'Verificar correo electrónico',
        'messages' => [
            'verification_link_sent' => 'Un enlace de verificación ha sido enviado a su correo electrónico.',
            'check_email_for_verification' => 'Antes de continuar, revise su correo electrónico para obtener un enlace de verificación.',
            'did_not_receive_email' => 'Si no recibiste el correo electrónico',
            'click_here_to_request_another' => 'haga clic aquí para solicitar otro',
        ],
    ],
    'confirm' => [
        'title' => 'Confirmar contraseña',
        'messages' => [
            'confirm_password_message' => 'Por favor confirme su contraseña antes de continuar.',
        ],
        'form' => [
            'submit' => 'Confirmar contraseña',
        ],
    ],
    'password_reset' => [
        'email' => [
            'title' => 'Recuperar contraseña',
            'form' => [
                'submit' => 'Enviar correo para recuperar contraseña',
            ],
        ],
        'reset' => [
            'title' => 'Restablecer contraseña',
            'form' => [
                'password' => 'Nueva contraseña',
                'confirm_password' => 'Confirmar contraseña',
                'submit' => 'Restablecer contraseña',
            ],
        ],
    ],
    'google' => [
        'login' => 'Iniciar sesión con Google',
        'register' => 'Registrarse con Google',
        'or' => 'o usa tu cuenta local',
    ],
];
