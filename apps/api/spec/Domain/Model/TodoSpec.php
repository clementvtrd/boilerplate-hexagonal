<?php

namespace spec\Domain\Model;

use Domain\Model\Todo;
use PhpSpec\ObjectBehavior;

class TodoSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith('task');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(Todo::class);
    }

    public function it_gets_task()
    {
        $this->getTask()->shouldReturn('task');
    }

    public function it_sets_task()
    {
        $this->setTask('toto');

        $this->getTask()->shouldReturn('toto');
    }

    public function it_is_done()
    {
        $this->isDone()->shouldReturn(false);
    }

    public function it_done()
    {
        $this->done();

        $this->isDone()->shouldReturn(true);
    }

    public function it_undo()
    {
        $this->done();
        $this->undo();
        $this->isDone()->shouldReturn(false);
    }
}
