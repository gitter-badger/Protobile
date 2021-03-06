<?php
/**
 * @package Protobile
 * @since Barcelona
 * @author Matiss Treinis <matiss@marolind.com>
 * @copyright Protobile Developers
 * @license Apache License 2.0
 */

namespace Protobile\Core\Http;

use Protobile\Abstracted\BaseHttpException;
use Protobile\Interfaces\OutputFormatterInterface;

class Response
{
    /**
     * @var OutputFormatterInterface
     */
    protected $output_formatter;

    /**
     * @var int
     */
    protected $http_response_code = 200;

    /**
     * @var array
     */
    protected $headers = [];

    /**
     * @var BaseHttpException
     */
    protected $http_exception;

    /**
     * @var string
     */
    protected $controller_to_run;

    /**
     * @return string
     */
    public function get_controller_to_run()
    {
        return $this->controller_to_run;
    }

    /**
     * @param string $controller_to_run
     */
    public function set_controller_to_run($controller_to_run)
    {
        $this->controller_to_run = $controller_to_run;
    }

    /**
     * @return mixed
     */
    public function get_http_exception()
    {
        return $this->http_exception;
    }

    /**
     * @param mixed $http_exception
     */
    public function set_http_exception(BaseHttpException $http_exception)
    {
        $this->http_exception = $http_exception;
    }

    /**
     * @return array
     */
    public function get_headers()
    {
        return $this->headers;
    }

    /**
     * @param string $header
     * @param string $value
     */
    public function set_header($header, $value)
    {
        // According to RFC2616
        $this->headers[strtolower($header)] = $value;
    }

    /**
     * @param string $value
     */
    public function set_header_raw($value)
    {
        $this->headers[] = $value;
    }

    /**
     * @param string $header
     */
    public function delete_header($header)
    {
        if (isset($this->headers[$header])) {
            unset($this->headers[$header]);
        }
    }

    /**
     * @return int
     */
    public function get_http_response_code()
    {
        return $this->http_response_code;
    }

    /**
     * @param int $http_response_code
     */
    public function set_http_response_code($http_response_code)
    {
        if (is_int($http_response_code) == false) {
            throw new \InvalidArgumentException('HTTP response code is expected to be integer');
        }
        $this->http_response_code = $http_response_code;
    }

    /**
     * @return OutputFormatterInterface
     */
    public function get_output_formatter()
    {
        return $this->output_formatter;
    }

    /**
     * @param OutputFormatterInterface $output_formatter
     */
    public function set_output_formatter(OutputFormatterInterface $output_formatter)
    {
        $this->output_formatter = $output_formatter;
    }

    public function __construct(OutputFormatterInterface $formatter)
    {
        $this->set_output_formatter($formatter);
    }
}