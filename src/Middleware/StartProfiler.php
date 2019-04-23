<?php

namespace RootYQ\Laravel\Profiler\Middleware;

use Closure;
use RootYQ\Profiler\Profiler;
use RootYQ\Profiler\ProfilerManager;

class StartProfiler
{
    /**
     * @var Profiler
     */
    private $profiler;

    /**
     * StartProfiler constructor.
     * @param ProfilerManager $manager
     */
    public function __construct(ProfilerManager $manager)
    {
        $this->profiler = $manager->getProfiler();
    }

    /**
     * @param $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $this->profiler->turnOn();

        return $next($request);
    }

    /**
     * @param $request
     * @param $response
     */
    public function terminate($request, $response)
    {
        register_shutdown_function(function () {
            $this->profiler->turnDown();
        });
    }
}