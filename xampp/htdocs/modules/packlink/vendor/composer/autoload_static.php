<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit7cce86825541a83b5b267eb8217f9696
{
    public static $prefixLengthsPsr4 = array (
        'i' => 
        array (
            'iio\\libmergepdf\\' => 16,
        ),
        'P' => 
        array (
            'Packlink\\PrestaShop\\Classes\\' => 28,
            'Packlink\\Lib\\' => 13,
            'Packlink\\BusinessLogic\\' => 23,
            'Packlink\\Brands\\' => 16,
        ),
        'L' => 
        array (
            'Logeecom\\Infrastructure\\' => 24,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'iio\\libmergepdf\\' => 
        array (
            0 => __DIR__ . '/..' . '/iio/libmergepdf/src',
        ),
        'Packlink\\PrestaShop\\Classes\\' => 
        array (
            0 => __DIR__ . '/../..' . '/classes',
        ),
        'Packlink\\Lib\\' => 
        array (
            0 => __DIR__ . '/../..' . '/lib',
        ),
        'Packlink\\BusinessLogic\\' => 
        array (
            0 => __DIR__ . '/..' . '/packlink/integration-core/src/BusinessLogic',
        ),
        'Packlink\\Brands\\' => 
        array (
            0 => __DIR__ . '/..' . '/packlink/integration-core/src/Brands',
        ),
        'Logeecom\\Infrastructure\\' => 
        array (
            0 => __DIR__ . '/..' . '/packlink/integration-core/src/Infrastructure',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'FPDF' => __DIR__ . '/..' . '/setasign/fpdf/fpdf.php',
        'FPDF_TPL' => __DIR__ . '/..' . '/setasign/fpdi/fpdf_tpl.php',
        'FPDI' => __DIR__ . '/..' . '/setasign/fpdi/fpdi.php',
        'FilterASCII85' => __DIR__ . '/..' . '/setasign/fpdi/filters/FilterASCII85.php',
        'FilterASCIIHexDecode' => __DIR__ . '/..' . '/setasign/fpdi/filters/FilterASCIIHexDecode.php',
        'FilterLZW' => __DIR__ . '/..' . '/setasign/fpdi/filters/FilterLZW.php',
        'PacklinkBaseController' => __DIR__ . '/../..' . '/controllers/admin/PacklinkBaseController.php',
        'fpdi_bridge' => __DIR__ . '/..' . '/setasign/fpdi-fpdf/fpdi_bridge.php',
        'fpdi_pdf_parser' => __DIR__ . '/..' . '/setasign/fpdi/fpdi_pdf_parser.php',
        'pdf_context' => __DIR__ . '/..' . '/setasign/fpdi/pdf_context.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit7cce86825541a83b5b267eb8217f9696::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit7cce86825541a83b5b267eb8217f9696::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit7cce86825541a83b5b267eb8217f9696::$classMap;

        }, null, ClassLoader::class);
    }
}
