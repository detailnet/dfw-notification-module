<?php

namespace DetailTest\Notification;

use PHPUnit\Framework\TestCase;

use Detail\Notification\Module;

class ModuleTest extends TestCase
{
    /**
     * @var Module
     */
    protected $module;

    protected function setUp()
    {
        $this->module = new Module();
    }

    public function testModuleProvidesConfig(): void
    {
        $config = $this->module->getConfig();

        $this->assertTrue(is_array($config));
        $this->assertArrayHasKey('detail_notification', $config);
        $this->assertTrue(is_array($config['detail_notification']));
        $this->assertArrayHasKey('sender_factories', $config['detail_notification']);
        $this->assertTrue(is_array($config['detail_notification']['sender_factories']));
        $this->assertArrayHasKey('webhook', $config['detail_notification']['sender_factories']);
    }
}
