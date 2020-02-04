<?php
/**
 * Created by PhpStorm.
 * User: ilhamarrouf
 * Date: 07/03/19
 * Time: 17.39
 */

use Carbon\Carbon;
use Illuminate\Support\Arr;
use Slim\Http\Response;
use Slim\Http\StatusCode;

/**
 * todo : Kenapa tidak dipakai pada API yang sedang running di perusahaan ?
 *        Kenapa malah menggunakan "use Illuminate\Database\Capsule\Manager as DB" ?
 */
if (! function_exists('conn')) {
    function conn()
    {
        return container()->get('db');
    }
}
//========================================

if (! function_exists('app')) {
    /**
     * @return \Slim\App
     */
    function app()
    {
        global $app;

        return $app;
    }
}

if (! function_exists('container')) {
    /**
     * @return \Psr\Container\ContainerInterface
     */
    function container()
    {
        return app()->getContainer();
    }
}

if (! function_exists('request')) {
    /**
     * @return mixed
     */
    function request()
    {
        return container()->get('request');
    }
}

if (! function_exists('response')) {
    /**
     * @param int $status
     * @param null $headers
     * @param null $body
     *
     * @return \Slim\Http\Response
     */
    function response($status = StatusCode::HTTP_OK, $headers = null, $body = null)
    {
        return new Response($status, $headers, $body);
    }
}

if (! function_exists('now')) {
    /**
     * @param null $tz
     *
     * @return Carbon
     */
    function now($tz = null)
    {
        return Carbon::now($tz);
    }
}

if (! function_exists('yesterday')) {
    /**
     * @param null $tz
     *
     * @return \Carbon\CarbonInterface
     */
    function yesterday($tz = null)
    {
        return Carbon::yesterday($tz);
    }
}

if (! function_exists('today')) {
    /**
     * @param null $tz
     *
     * @return Carbon
     */
    function today($tz = null)
    {
        return Carbon::today($tz);
    }
}

if (! function_exists('tomorrow')) {
    /**
     * @param null $tz
     *
     * @return \Carbon\CarbonInterface
     */
    function tomorrow($tz = null)
    {
        return Carbon::tomorrow($tz);
    }
}

if (! function_exists('endda')) {
    /**
     * @return string
     */
    function endda()
    {
        return '9999-12-31';
    }
}

if (! function_exists('config')) {
    /**
     * @param $key
     * @param null $default
     *
     * @return mixed
     */
    function config($key, $default = null)
    {
        return Arr::get(container()->get('settings'), $key, $default);
    }
}

if (! function_exists('auth')) {
    /**
     * @return mixed
     */
    function auth()
    {
        return container()->get('auth');
    }
}

if (! function_exists('uuid1')) {
    /**
     * @param null $node
     * @param null $clockSeq
     *
     * @return \Ramsey\Uuid\UuidInterface
     * @throws Exception
     */
    function uuid1($node = null, $clockSeq = null)
    {
        return \Ramsey\Uuid\Uuid::uuid1($node, $clockSeq);
    }
}

if (! function_exists('base_url')) {
    /**
     * @param null $path
     *
     * @return string
     */
    function base_url($path = null)
    {
        return request()->getUri()->getBaseUrl().DIRECTORY_SEPARATOR.$path;
    }
}

if (! function_exists('capture_log')) {
    function capture_log(string $class, string $action, string $message)
    {
        return \App\Models\ActivityLog::create([
            'BEGDA' => now(),
            'ENDDA' => endda(),         
            'CLASS' => $class,
            'ACTIO' => $action,
            'MESSG' => $message,
            'CHGDT' => now(),
            'CHUSR' => auth()->user()->USRNM
        ]);
    }
}

if (! function_exists('storage')) {
    /**
     * @return mixed
     */
    function storage()
    {
        return container()->get('storage');
    }
}

