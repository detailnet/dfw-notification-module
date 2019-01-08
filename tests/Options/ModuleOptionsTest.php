<?php

namespace DetailTest\Notification\Options;

use Detail\Notification\Options;

class ModuleOptionsTest extends OptionsTestCase
{
    /**
     * @var \Detail\Notification\Options\ModuleOptions
     */
    protected $options;

    protected function setUp()
    {
        $this->options = $this->getOptions(
            Options\ModuleOptions::CLASS,
            [
                'getSenderFactories',
                'setSenderFactories',
            ]
        );
    }

    public function testSenderFactoriesCanBeSet(): void
    {
        $senderFactories = ['a-sender-type' => 'Some/Sender/Class'];

        $this->assertTrue(is_array($this->options->getSenderFactories()));
        $this->assertEmpty($this->options->getSenderFactories());

        $this->options->setSenderFactories($senderFactories);

        $this->assertEquals($senderFactories, $this->options->getSenderFactories());
    }
}
