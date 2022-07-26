<?php
/**
 * This file is part of the blmvuln package.
 *
 * @author Mathias Reker
 * @copyright Mathias Reker
 * @license MIT License
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace PrestaShop\Module\BlmVuln\resources\config;

final class Config
{
    /**
     * Name of the module.
     *
     * @var string
     */
    const MODULE_NAME = 'blmvuln';

    /**
     * Name of admin controller.
     *
     * @var string
     */
    const ADMIN_CONTROLLER_NAME = 'AdminBlmVuln';

    /**
     * Minimum required PHP version.
     *
     * @var string
     */
    const MINIMUM_PHP_VERSION = '7.0';

    /**
     * Default folder permissions.
     *
     * @var int
     */
    const DEFAULT_MODE_FOLDER = 0755;

    /**
     * Default file permissions.
     *
     * @var int
     */
    const DEFAULT_MODE_FILES = 0644;

    /**
     * Allowed file permissions.
     *
     * @var string[]
     */
    const ALLOWED_FILE_PERMISSIONS = [
        '0400',
        '0444',
        '0666',
        '0644',
        '0640',
    ];

    /**
     * Allowed folder permissions.
     *
     * @var string[]
     */
    const ALLOWED_FOLDER_PERMISSIONS = [
        '0755',
        '0750'
    ];

    /**
     * Check file and folder permission for the following directories.
     *
     * @var string[]
     */
    const PERMISSION_DIRECTORIES = [
        'admin-dev',
        'classes',
        'controllers',
        'docs',
        'download',
        'img',
        'js',
        'localization',
        'mails',
        'pdf',
        'src',
        'themes',
        'tools',
        'translations',
        'var',
        'webservice',
    ];

    /**
     * Known infected files. If this list is extended, the /bin must be updated. Please open an ISSUE in this case.
     *
     * @var string[]
     */
    const POSSIBLE_INFECTED_FILES = [
        'classes/Controller.php',
        'classes/controller/Controller.php',
        'classes/controller/FrontController.php',
        'classes/Db/Db.php',
        'classes/db/Db.php',
        'classes/Dispatcher.php',
        'classes/Hook.php',
        'classes/module/Module.php',
        'classes/modules/Module.php',
        'controllers/admin/AdminLoginController.php',
        'controllers/AdminLoginController.php',
        'controllers/front/IndexController.php',
        'tools/smarty/sysplugins/smarty_internal_templatebase.php',
        'config/smarty.config.inc.php',
    ];

    /**
     * Cache files.
     *
     * @var string[]
     */
    const CACHE_FILES = [
        'cache/class_index.php',
    ];

    /**
     * Paths of known infected JS file.
     *
     * @var string[]
     */
    const INFECTED_JS_PATHS = [
        _PS_ROOT_DIR_ . '/js/',
        _PS_MODULE_DIR_,
    ];

    /**
     * File size of a known infected JS file.
     *
     * @var int
     */
    const MALWARE_JS_FILE_SIZE = 33637;

    /**
     * File length of a known infected JS file.
     *
     * @var int
     */
    const MALWARE_JS_FILE_LENGTHS = [
        5,
        6,
    ];

    /**
     * File extension of a known infected JS file.
     *
     * @var string
     */
    const MALWARE_JS_FILE_EXTENSION = 'js';

    /**
     * @var string[]
     */
    const MALWARE_FILES_PATTERN = [
        'blm.php',
        'app/Mage.php',
        '0x666.php',
        'IndoXploit.php',
        'Sh3ll.php',
        'XsamXadoo_Bot.php',
        'XsamXadoo_Bot_All.php',
        'XsamXadoo_deface.php',
        'Xsam_Xadoo.html',
        'anonsha1a0.php',
        'atx_bot.php',
        'azzoulshell.php',
        'b374k.php',
        'bajatax_xsam.php',
        'bigdump.php',
        'bypass.php',
        'c100.php',
        'c99.php',
        'cPanelCracker.php',
        'composer.json',
        'database.php',
        'docker-compose.yml',
        'efi.php',
        'f.php',
        'hacked.php',
        'httptest.php',
        'info.php',
        'kill.php',
        'lfishell.php',
        'olux.php',
        'perlinfo.php',
        'php.php',
        'phpinfo.php',
        'phppsinfo.php',
        'phpversion.php',
        'prestashop.zip',
        'proshell.php',
        'r00t.php',
        'r57.php',
        'sado.php',
        'shellwow.php',
        'simulasi.php',
        'sssp.php',
        'test.php',
        'testproxy.php',
        'upload.php',
        'wawa.php',
        'wolfm.php',
        'wso.php',
        'xGSx.php',
        'xaishell.php',
        'xcontact182.php',
        'xsam_xadoo_bot.php',
        'xsambot.php',
        'xsambot2.php',
        'xsamxadoo.php',
        'xsamxadoo101.php',
        'xsamxadoo102.php',
        'xsamxadoo95.php',
    ];

    /**
     * Directories known for PHP unit test vulnerability.
     *
     * @var string[]
     */
    const VULNERABLE_DIRECTORIES_PATTERN = [
        _PS_ROOT_DIR_ . '/vendor/',
        _PS_MODULE_DIR_,
    ];

    /**
     * Directories to be removed.
     *
     * @var string
     */
    const VULNERABLE_DIRECTORY = 'phpunit';

    /**
     * Known vulnerable modules.
     *
     * @var array<string, string>
     */
    const PATCH_MODULES = [
        'blockwishlist' => '2.1.1',
        'bamegamenu' => '1.0.32',
    ];

    private function __construct()
    {
    }
}
