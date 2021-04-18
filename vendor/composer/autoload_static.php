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
        'CC\\CRUD\\Admin' => __DIR__ . '/../..' . '/includes/Admin.php',
        'CC\\CRUD\\Admin\\Address_List' => __DIR__ . '/../..' . '/includes/Admin/Address_List.php',
        'CC\\CRUD\\Admin\\Addressbook' => __DIR__ . '/../..' . '/includes/Admin/Addressbook.php',
        'CC\\CRUD\\Admin\\Menu' => __DIR__ . '/../..' . '/includes/Admin/Menu.php',
        'CC\\CRUD\\Ajax' => __DIR__ . '/../..' . '/includes/Ajax.php',
        'CC\\CRUD\\Assets' => __DIR__ . '/../..' . '/includes/Assets.php',
        'CC\\CRUD\\Frontend' => __DIR__ . '/../..' . '/includes/Frontend.php',
        'CC\\CRUD\\Frontend\\Enquiry' => __DIR__ . '/../..' . '/includes/Frontend/Enquiry.php',
        'CC\\CRUD\\Frontend\\Shortcode' => __DIR__ . '/../..' . '/includes/Frontend/Shortcode.php',
        'CC\\CRUD\\Installer' => __DIR__ . '/../..' . '/includes/Installer.php',
        'CC\\CRUD\\Traits\\Form_Error' => __DIR__ . '/../..' . '/includes/Traits/Form_Error.php',
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'Dealerdirect\\Composer\\Plugin\\Installers\\PHPCodeSniffer\\Plugin' => __DIR__ . '/..' . '/dealerdirect/phpcodesniffer-composer-installer/src/Plugin.php',
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
