<?php

namespace Spec\Protobile\Exceptions;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class RouterExceptionSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Protobile\Exceptions\RouterException');
    }
    
    function it_extends_protobile_base_exception()
    {
        $this->shouldHaveType('Protobile\Exceptions\BaseException');
    }
}
