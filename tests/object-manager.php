<?php

declare(strict_types=1);

use App\Kernel;
use Doctrine\ORM\EntityManagerInterface;

require __DIR__.'/bootstrap.php';

$kernel = new Kernel($_SERVER['APP_ENV'], (bool) $_SERVER['APP_DEBUG']);
$kernel->boot();

$entityManager = $kernel->getContainer()->get('doctrine')->getManager();
assert($entityManager instanceof EntityManagerInterface);

return $entityManager;
