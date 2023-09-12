<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit16716c47500edd70c878084d6b23887d
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'AltoRouter' => __DIR__ . '/..' . '/altorouter/altorouter/AltoRouter.php',
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit16716c47500edd70c878084d6b23887d::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit16716c47500edd70c878084d6b23887d::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit16716c47500edd70c878084d6b23887d::$classMap;

        }, null, ClassLoader::class);
    }
}