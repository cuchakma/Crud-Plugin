<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitdcad7d5aa2e259d3800548156563283a
{
    public static $files = array (
        '153573777f1c8b1930b906351f540bd9' => __DIR__ . '/../..' . '/includes/functions.php',
    );

    public static $prefixLengthsPsr4 = array (
        'D' => 
        array (
            'Dealerdirect\\Composer\\Plugin\\Installers\\PHPCodeSniffer\\' => 55,
        ),
        'C' => 
        array (
            'CC\\CRUD\\' => 8,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Dealerdirect\\Composer\\Plugin\\Installers\\PHPCodeSniffer\\' => 
        array (
            0 => __DIR__ . '/..' . '/dealerdirect/phpcodesniffer-composer-installer/src',
        ),
        'CC\\CRUD\\' => 
        array (
            0 => __DIR__ . '/../..' . '/includes',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitdcad7d5aa2e259d3800548156563283a::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitdcad7d5aa2e259d3800548156563283a::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitdcad7d5aa2e259d3800548156563283a::$classMap;

        }, null, ClassLoader::class);
    }
}
