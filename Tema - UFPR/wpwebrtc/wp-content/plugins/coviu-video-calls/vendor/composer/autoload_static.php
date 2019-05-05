<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit0ef401dc694b2c42e588afe05428ba89
{
    public static $prefixLengthsPsr4 = array (
        'c' => 
        array (
            'coviu\\Api\\' => 10,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'coviu\\Api\\' => 
        array (
            0 => __DIR__ . '/..' . '/coviu/coviu-sdk/src',
        ),
    );

    public static $prefixesPsr0 = array (
        'R' => 
        array (
            'Requests' => 
            array (
                0 => __DIR__ . '/..' . '/rmccue/requests/library',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit0ef401dc694b2c42e588afe05428ba89::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit0ef401dc694b2c42e588afe05428ba89::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInit0ef401dc694b2c42e588afe05428ba89::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}