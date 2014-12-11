<?php

namespace Spec\Protobile\Exceptions;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CoreExceptionSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Protobile\Exceptions\CoreException');
    }
    
    function it_extends_protobile_base_exception()
    {
        $this->shouldHaveType('Protobile\Exceptions\BaseException');
    }
}
