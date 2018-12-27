<?php

namespace DetailTest\Notification\Options;

class ModuleOptionsTest extends OptionsTestCase
{
    /**
     * @var \Detail\Notification\Options\ModuleOptions
     */
    protected $options;

    protected function setUp()
    {
        $this->options = $this->getOptions(
            'Detail\Notification\Options\ModuleOptions',
            array(
                'getSenderFactories',
                'setSenderFactories',
            )
        );
    }

    public function testSenderFactoriesCanBeSet()
    {
        $senderFactories = array('a-sender-type' => 'Some/Sender/Class');

        $this->assertTrue(is_array($this->options->getSenderFactories()));
        $this->assertEmpty($this->options->getSenderFactories());

        $this->options->setSenderFactories($senderFactories);

        $this->assertEquals($senderFactories, $this->options->getSenderFactories());
    }
}
