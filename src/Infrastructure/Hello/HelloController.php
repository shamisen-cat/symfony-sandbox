<?php

declare(strict_types=1);

namespace App\Infrastructure\Hello;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class HelloController extends AbstractController
{
    #[Route(
        path: '/',
        name: 'app_hello',
        methods: ['GET'],
    )]
    public function index(): Response
    {
        return $this->render('hello/index.html.twig');
    }
}
