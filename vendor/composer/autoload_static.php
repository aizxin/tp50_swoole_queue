<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitd5e6c7ea6a5d56a34bb8849cb6fff323
{
    public static $files = array (
        '9b552a3cc426e3287cc811caefa3cf53' => __DIR__ . '/..' . '/topthink/think-helper/src/helper.php',
        'cc56288302d9df745d97c934d6a6e5f0' => __DIR__ . '/..' . '/topthink/think-queue/src/common.php',
    );

    public static $prefixLengthsPsr4 = array (
        't' => 
        array (
            'think\\helper\\' => 13,
            'think\\composer\\' => 15,
            'think\\' => 6,
        ),
        'a' => 
        array (
            'app\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'think\\helper\\' => 
        array (
            0 => __DIR__ . '/..' . '/topthink/think-helper/src',
        ),
        'think\\composer\\' => 
        array (
            0 => __DIR__ . '/..' . '/topthink/think-installer/src',
        ),
        'think\\' => 
        array (
            0 => __DIR__ . '/../..' . '/thinkphp/library/think',
            1 => __DIR__ . '/..' . '/topthink/think-queue/src',
        ),
        'app\\' => 
        array (
            0 => __DIR__ . '/../..' . '/application',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitd5e6c7ea6a5d56a34bb8849cb6fff323::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitd5e6c7ea6a5d56a34bb8849cb6fff323::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
