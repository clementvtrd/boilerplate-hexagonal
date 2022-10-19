<?php

namespace spec\Domain\Model;

use Domain\Model\Todo;
use Domain\Model\TodoList;
use PhpSpec\ObjectBehavior;

class TodoListSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith('title');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(TodoList::class);
    }

    public function it_gets_todos()
    {
        $this->getTodos()->shouldReturn([]);
    }

    public function it_gets_lenght()
    {
        $this->getLength()->shouldReturn(0);
    }

    public function it_adds_todo(Todo $todo)
    {
        $this->addTodo($todo);
        $this->getTodos()->shouldReturn([$todo->getWrappedObject()]);
    }

    public function it_removes_todo(Todo $todo)
    {
        $this->addTodo($todo);
        $this->getTodos()->shouldReturn([$todo->getWrappedObject()]);

        $this->removeTodo($todo);
        $this->getTodos()->shouldReturn([]);
    }

    public function it_gets_title()
    {
        $this->getTitle()->shouldReturn('title');
    }

    public function it_sets_title()
    {
        $this->getTitle()->shouldReturn('title');
        $this->setTitle('updated');
        $this->getTitle()->shouldReturn('updated');
    }
}
