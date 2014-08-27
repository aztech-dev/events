<?php

namespace Aztech\Events\Tests\Bus\Factory;

use Aztech\Events\Bus\Factory\TransportFactory;

class TransportFactoryTest extends \PHPUnit_Framework_TestCase
{

    private $factory;

    protected function setUp()
    {
        $transport = $this->getMock('\Aztech\Events\Bus\Transport');
        $serializer = $this->getMock('Aztech\Events\Bus\Serializer');

        $this->factory = new TransportFactory($transport, $serializer);
    }

    public function testCreatePublisherReturnsPublisher()
    {
        $publisher = $this->factory->createPublisher();

        $this->assertInstanceOf('\Aztech\Events\Bus\Publisher', $publisher);
    }

    public function testCreateConsumerReturnsConsumer()
    {
        $consumer = $this->factory->createConsumer();

        $this->assertInstanceOf('\Aztech\Events\Bus\Consumer', $consumer);
    }

    public function testCreateProcessorReturnsProcessor()
    {
        $processor = $this->factory->createProcessor();

        $this->assertInstanceOf('\Aztech\Events\Bus\Processor', $processor);
    }

    /**
     * @expectedException \BadMethodCallException
     */
    public function testCreateProcessorThrowsExceptionWhenProcessingIsDisabled()
    {
        $this->factory->disableProcess();

        $this->factory->createProcessor();
    }

    /**
     * @expectedException \BadMethodCallException
     */
    public function testCreateConsumerThrowsExceptionWhenProcessingIsDisabled()
    {
        $this->factory->disableProcess();

        $this->factory->createConsumer();
    }

    /**
     * @expectedException \BadMethodCallException
     */
    public function testCreatePublisherThrowsExceptionWhenProcessingIsDisabled()
    {
        $this->factory->disablePublish();

        $this->factory->createPublisher();
    }
}