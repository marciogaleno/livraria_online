<?php
return array(
    /** Loggers attached to every command */
    "_" => function () {
        return array(
            new \Monolog\Handler\StreamHandler('/tmp/phpci', \Monolog\Logger::ERROR),
        );
    }
);
