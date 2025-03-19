<?php

return [
    'auth' => [
        'login' => [
            'title' => 'Login',
            'form' => [
                'email' => 'Email Address',
                'password' => 'Password',
                'remember_me' => 'Remember Me',
                'submit' => 'Login',
            ],
            'forgot_password' => 'Forgot Your Password?',
        ],
        'register' => [
            'title' => 'Register',
            'form' => [
                'name' => 'Full Name',
                'email' => 'Email Address',
                'password' => 'Password',
                'confirm_password' => 'Confirm Password',
                'submit' => 'Register',
            ],
        ],
        'verify' => [
            'title' => 'Verify Email',
            'messages' => [
                'verification_link_sent' => 'A fresh verification link has been sent to your email address.',
                'check_email_for_verification' => 'Before proceeding, please check your email for a verification link.',
                'did_not_receive_email' => 'If you did not receive the email',
                'click_here_to_request_another' => 'click here to request another',
            ],
        ],
        'confirm' => [
            'title' => 'Confirm Password',
            'messages' => [
                'confirm_password_message' => 'Please confirm your password before continuing.',
            ],
            'form' => [
                'submit' => 'Confirm Password',
            ],
        ],
        'password_reset' => [
            'email' => [
                'title' => 'Recover Password',
                'form' => [
                    'submit' => 'Send Password Reset Link',
                ],
            ],
            'reset' => [
                'title' => 'Reset Your Account',
                'form' => [
                    'password' => 'New Password',
                    'confirm_password' => 'Confirm Password',
                    'submit' => 'Reset Password',
                ],
            ],
        ],
    ],
];