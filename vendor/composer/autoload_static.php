<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit172e449d389acdef567c12e344cf5d94
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
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit172e449d389acdef567c12e344cf5d94::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit172e449d389acdef567c12e344cf5d94::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
