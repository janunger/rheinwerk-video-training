<?php

class Auto
{
    /**
     * @var Motor
     */
    private $motor;

    public function __construct(Motor $motor)
    {
        $this->motor = $motor;
    }

    public function starte()
    {
        $this->motor->betaetigeAnlasser();
    }

    public function fahre($anzahlKilometer, $geschwindigkeit)
    {
        // ...
    }
}