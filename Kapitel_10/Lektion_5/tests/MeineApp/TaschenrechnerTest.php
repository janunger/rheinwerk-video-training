<?php

namespace MeineApp;

class TaschenrechnerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Taschenrechner
     */
    private $taschenrechner;

    protected function setUp()
    {
        $this->taschenrechner = new Taschenrechner();
    }

    public function testAddiertZweiZahlen()
    {
        $ergebnis = $this->taschenrechner->addiere(1, 2);
        $this->assertEquals(3, $ergebnis);
    }

    public function testSubtrahiertZweiZahlen()
    {
        $ergebnis = $this->taschenrechner->subtrahiere(1, 2);
        $this->assertEquals(-1, $ergebnis);
    }
}