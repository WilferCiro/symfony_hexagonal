<?php

namespace App\Shared\Infrastructure\Security;

use Lexik\Bundle\JWTAuthenticationBundle\Security\Guard\JWTTokenAuthenticator as BaseAuthenticator;
use Symfony\Component\HttpFoundation\Request;

class JwtTokenAuthenticator extends BaseAuthenticator
{
    // Puedes personalizar los métodos según tus necesidades
    public function start(Request $request, \Lexik\Bundle\JWTAuthenticationBundle\Exception\ExpiredTokenException $authException = null)
    {
        // Maneja el inicio de la autenticación
    }
}