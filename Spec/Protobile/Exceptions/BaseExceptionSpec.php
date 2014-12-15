<?php

namespace Spec\Protobile\Exceptions;

use PhpSpec\ObjectBehavior;
use Protobile\Exceptions\BaseException;

class BaseExceptionSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beAnInstanceOf('Spec\Protobile\Exceptions\ConcreteException');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType('Protobile\Exceptions\BaseException');
    }

    public function it_extends_php_base_exception()
    {
        $this->shouldHaveType('Exception');
    }
}

class ConcreteException extends BaseException
{
}