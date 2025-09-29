<?php

namespace App\Http;

class Kernel
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
        'admin' => \App\Http\Middleware\AdminMiddleware::class,
    }
}
