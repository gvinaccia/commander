<?php

namespace GVinaccia\Commander\Tests;

use GVinaccia\Commander\Command;
use GVinaccia\Commander\CommandHandlerInterface;
use TestCase;

class BasicCommandResolverTest extends TestCase
{
    /** @test */
    function it_should_be_an_instance_of_command_resolver()
    {
        $resolver = $this->app->make('GVinaccia\\Commander\\BasicCommandResolver');
        $this->assertInstanceOf('GVinaccia\\Commander\\CommandResolver', $resolver);
    }

    /** @test */
    function it_resolves_command_to_command_handler()
    {
        $resolver = $this->app->make('GVinaccia\\Commander\\BasicCommandResolver');

        $this->assertEquals(
            'GVinaccia\\Commander\\Tests\\BlablablaCommandHandler',
            $resolver->toCommandHandler(new BlablablaCommand())
        );
    }

    /** @test */
    function it_throws_an_exception_if_handler_class_not_found()
    {
        $this->setExpectedException('GVinaccia\Commander\CommandHandlerNotFoundException');

        $resolver = $this->app->make('GVinaccia\\Commander\\BasicCommandResolver');

        $resolver->toCommandHandler(new Blabla2Command());
    }
}

class BlablablaCommand extends Command { }

class Blabla2Command extends Command { }

class BlablablaCommandHandler implements CommandHandlerInterface
{
    /**
     * @param Command $command
     * @return mixed
     */
    public function handle(Command $command)
    {
        // TODO: Implement handle() method.
    }
}