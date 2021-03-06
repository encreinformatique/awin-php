<?php

namespace Yuzu\Awin\Tests\Units\Request;

use atoum\atoum;

class GetTransactionsDefinition extends atoum\test
{
    public function testConstruct()
    {
        $this
            ->given(
                $options = array(
                    'publisherId' => 'XXX'
                )
            )
            ->if($this->newTestedInstance($options))
            ->then
            ->object($this->testedInstance)->isTestedInstance()
        ;
    }

    public function testConstructWithParams()
    {
        $this
            ->given(
                $options = array(
                    'publisherId' => 'XXX',
                    'timezone' => 'Europe/Paris',
                    'startDate' => new \DateTime("-2days"),
                    'endDate' => new \DateTime("yesterday")
                )
            )
            ->if($this->newTestedInstance($options))
                ->then
                    ->object($this->testedInstance)->isTestedInstance()
        ;
    }

    public function testConstructWithWrongParams()
    {
        $this
            ->exception(
                function () {
                    $options = array(
                        'wrongParam' => 'wrongValue'
                    );
                    $this->newTestedInstance($options);
                }
            )
        ;
    }
}
