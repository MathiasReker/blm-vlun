<?php
/**
 * This file is part of the blmvuln package.
 *
 * @author Mathias Reker
 * @copyright Mathias Reker
 * @license MIT
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

final class BlmVuln extends Module
{
    public function __construct()
    {
        $this->name = 'blmvuln';
        $this->tab = 'administration';
        $this->version = '1.1.0';
        $this->author = 'Mathias R.';
        $this->need_instance = 0;
        $this->module_key = '';
        $this->bootstrap = true;

        parent::__construct();

        $this->autoLoad();

        $this->displayName = $this->l('BLM vulnerability');
        $this->description = $this->l('This module aims to secure a website vulnerable to CVE-2022-31101.');
        $this->ps_versions_compliancy = [
            'min' => '1.6.1',
            'max' => _PS_VERSION_,
        ];
    }

    /**
     * Autoload's project files from /src directory.
     */
    public function autoLoad()
    {
        require_once $this->getLocalPath() . 'vendor/autoload.php';
    }

    public function install(): bool
    {
        $this->setShopContextAll();

        if (!(new PrestaShop\Module\BlmVuln\install\Installer($this))->execute() || !parent::install()) {
            $this->uninstall();

            return false;
        }

        return true;
    }

    public function uninstall(): bool
    {
        if (!$this->setShopContextAll()) {
            return false;
        }

        if (!parent::uninstall()) {
            return false;
        }

        return (new PrestaShop\Module\BlmVuln\install\Uninstaller($this))->execute();
    }

    public function enable($force_all = false): bool
    {
        if (!parent::enable($force_all)) {
            return false;
        }

        return (new PrestaShop\Module\BlmVuln\install\Enabler($this))->execute();
    }

    public function disable($force_all = false): bool
    {
        if (!parent::disable($force_all)) {
            return false;
        }

        return (new PrestaShop\Module\BlmVuln\install\Disabler($this))->execute();
    }

    /**
     * Gets the content of the module page.
     */
    public function getContent()
    {
        $this->redirectToModuleAdminController();
    }

    private function setShopContextAll(): bool
    {
        if (Shop::isFeatureActive()) {
            try {
                Shop::setContext(Shop::CONTEXT_ALL);
            } catch (PrestaShopException $prestaShopException) {
                return false;
            }
        }

        return true;
    }

    /**
     * Redirects the user to the admin front controller.
     */
    private function redirectToModuleAdminController()
    {
        $redirect = $this->context->link->getAdminLink(PrestaShop\Module\BlmVuln\resources\config\Config::CONTROLLER_NAME, true, false);

        Tools::redirectAdmin($redirect);
    }
}
