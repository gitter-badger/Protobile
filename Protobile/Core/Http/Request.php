<?php
/**
 * @package Protobile
 * @since Barcelona
 * @author Matiss Treinis <matiss@marolind.com>
 * @copyright Protobile Developers
 * @license Apache License 2.0
 */

namespace Protobile\Core\Http;

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
    protected $file_upload;

    public function post()
    {
    }

    public function get()
    {
    }

    public function server()
    {
    }

    public function cookie()
    {
    }

    public function file_upload()
    {
    }
}