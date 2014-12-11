<?php
$finder = Symfony\CS\Finder\DefaultFinder::create()
    ->in(__DIR__.'/Protobile/');

return Symfony\CS\Config\Config::create()
    ->fixers(array('-eof_ending','concat_with_spaces','align_equals','align_double_arrow','whitespacy_lines','ternary_spaces','unused_use'))
    ->level(Symfony\CS\FixerInterface::SYMFONY_LEVEL)
    ->finder($finder);