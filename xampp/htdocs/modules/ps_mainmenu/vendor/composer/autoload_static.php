<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit2a722c62ccb23f7c7b13676d37ceaca3
{
    public static $classMap = array (
        'Ps_MainMenu' => __DIR__ . '/../..' . '/ps_mainmenu.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInit2a722c62ccb23f7c7b13676d37ceaca3::$classMap;

        }, null, ClassLoader::class);
    }
}
