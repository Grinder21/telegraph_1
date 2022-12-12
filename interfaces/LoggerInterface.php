<?php

interface LoggerInterface
{
    public function logMessage($err);
    public function lastMessages($messages) : array;
}