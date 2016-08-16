<?php

class AutoFactory
{
    public function baueAuto()
    {
        $motor = new Motor();
        $getriebe = new Getriebe();

        return new Auto($motor, $getriebe);
    }
}