<?php
/**
 * @package Protobile
 * @since Barcelona
 * @author Matiss Treinis <matiss@marolind.com>
 * @copyright Protobile Developers
 * @license Apache License 2.0
 */

namespace Protobile\Core\Http;

use Protobile\Utility\ArrayUtility;

class Request
{
    /**
     * @var InputContainer
     */
    protected $post;

    /**
     * @var InputContainer
     */
    protected $get;

    /**
     * @var InputContainer
     */
    protected $server;

    /**
     * @var CookieManager
     */
    protected $cookie;

    /**
     * @var FileUploadManager
     */
    protected $files;

    /**
     * @param $key
     * @return mixed
     */
    public function post($key = null)
    {
        return ArrayUtility::get_dot_value($key, $this->post);
    }

    /**
     * @param $key
     * @return mixed
     */
    public function get($key = null)
    {
        return ArrayUtility::get_dot_value($key, $this->get);
    }

    /**
     * @param $key
     * @return mixed
     */
    public function server($key = null)
    {
        return ArrayUtility::get_dot_value($key, $this->server);
    }

    /**
     * @param $key
     * @return CookieManager
     */
    public function cookie($key = null)
    {
        // Pending special implementation - CookieManager
    }

    /**
     * @param $key
     * @return FileUploadManager
     */
    public function files($key = null)
    {
        // Pending special implementation - FileUploadManager
    }

    /**
     * @param InputContainer       $get
     * @param InputContainer       $post
     * @param ServerInputContainer $server
     * @param InputContainer       $cookie
     * @param InputContainer       $files
     */
    public function __construct(
        InputContainer $get,
        InputContainer $post,
        ServerInputContainer $server,
        InputContainer $cookie,
        InputContainer $files
    ) {
        $this->get         = $get;
        $this->post        = $post;
        $this->server      = $server;
        $this->cookie      = $cookie;
        $this->files       = $files;
    }
}