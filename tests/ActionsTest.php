<?php

require_once("Config.php");

class ActionsTest extends PHPUnit_Framework_TestCase
{
    protected $actions;
    protected $config;
    protected $apiToken = null;
    protected $secureKey = null;

    public function setUp()
    {
        $this->config = new Config();
        $this->actions = new Cielo24\Actions($this->config->serverUrl);
        // Start with a fresh session each time
        $this->apiToken = $this->actions->login($this->config->username, $this->config->password, true);
        $this->secureKey = $this->actions->generateAPIKey($this->apiToken, $this->config->username, true);
    }

    public function tearDown() {
        if ($this->apiToken != null && $this->secureKey != null) {
            try {
                $this->actions->removeAPIKey($this->apiToken, $this->secureKey);
            } catch (\Cielo24\WebError $e) {
                if ($e->errorType == \Cielo24\ErrorType::ACCOUNT_UNPRIVILEGED) {
                    $this->apiToken = $this->actions->login($this->config->username, $this->config->password, true);
                    $this->actions->removeAPIKey($this->apiToken, $this->secureKey);
                } else {
                    // Pass silently
                }
            }
        }
    }
}