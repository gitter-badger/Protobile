<?php

namespace Spec\Protobile\Exceptions;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Protobile\Exceptions\BaseException;

class BaseExceptionSpec extends ObjectBehavior
{
    function let()
    {
        $this->beAnInstanceOf('Spec\Protobile\Exceptions\ConcreteException');
    }
    
    function it_is_initializable()
    {
        $this->shouldHaveType('Protobile\Exceptions\BaseException');
    }
    
    function it_extends_php_base_exception()
    {
        $this->shouldHaveType('Exception');
    }
}

class ConcreteException extends BaseException{
}