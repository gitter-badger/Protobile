<?php

namespace Spec\Protobile\Exceptions;

use PhpSpec\ObjectBehavior;

class CoreExceptionSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('Protobile\Exceptions\CoreException');
    }

    public function it_extends_protobile_base_exception()
    {
        $this->shouldHaveType('Protobile\Exceptions\BaseException');
    }
}
