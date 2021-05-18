<?php
// Add doctrine, twig, etc...
return [
    \twig\Environment::class => function ()
    {
        $loader = new Twig\Loader\FilesystemLoader(__DIR__ . '/Views');
        $twig = new Twig\Environment($loader, [
            __DIR__ . '/../cache'
        ]);
        if (DEV_ENV) {
            $twig->enableDebug();
        }
        return $twig;
    }
];