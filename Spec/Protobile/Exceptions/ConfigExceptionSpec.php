<?php

namespace Spec\Protobile\Exceptions;

use PhpSpec\ObjectBehavior;

class ConfigExceptionSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('Protobile\Exceptions\ConfigException');
    }

    public function it_extends_protobile_base_exception()
    {
        $this->shouldHaveType('Protobile\Exceptions\BaseException');
    }
}
