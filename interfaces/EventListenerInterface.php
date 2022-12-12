<?php

interface EventListenerInterface
{
    public function attachEvent($methodName, $callBack);
    public function detouchEvent($methodName);
}