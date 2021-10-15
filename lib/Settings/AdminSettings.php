<?php

namespace OCA\OpenOTPSign\Settings;

use OCP\AppFramework\Http\TemplateResponse;
use OCP\IConfig;
use OCP\Settings\ISettings;

class AdminSettings implements ISettings {

    /** @var IConfig */
    protected $config;

    /**
     * @param IConfig $config
     */
    public function __construct(IConfig $config) {
        $this->config = $config;
    }

    /**
     * @return TemplateResponse
     */
    public function getForm() {
        return new TemplateResponse('openotpsign', 'settings/admin', [
            'server_url' => $this->config->getAppValue('openotpsign', 'server_url'),
            'ignore_ssl_errors' => $this->config->getAppValue('openotpsign', 'ignore_ssl_errors'),
            'client_id' => $this->config->getAppValue('openotpsign', 'client_id'),
            'default_domain' => $this->config->getAppValue('openotpsign', 'default_domain'),
            'user_settings' => $this->config->getAppValue('openotpsign', 'user_settings'),
        ], 'blank');
    }

    /**
     * @return string the section ID, e.g. 'sharing'
     */
    public function getSection() {
        return 'openotpsign';
    }

    /**
     * @return int whether the form should be rather on the top or bottom of
     * the admin section. The forms are arranged in ascending order of the
     * priority values. It is required to return a value between 0 and 100.
     *
     * E.g.: 70
     */
    public function getPriority() {
        return 55;
    }
}
