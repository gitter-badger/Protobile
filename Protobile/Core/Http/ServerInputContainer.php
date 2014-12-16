<?php
/**
 * @package Protobile
 * @since Barcelona
 * @author Matiss Treinis <matiss@marolind.com>
 * @copyright Protobile Developers
 * @license Apache License 2.0
 */

namespace Protobile\Core\Http;

class ServerInputContainer extends InputContainer
{
    /**
     * @param array $data
     */
    public function __construct(array $data)
    {
        foreach ($data as $key => $value) {
            $this->data[strtolower($key)] = $value;
        }
    }

    /**
     * @return string|null
     */
    public function get_http_host()
    {
        return isset($this->data['http_host']) ? $this->data['http_host'] : null;
    }

    /**
     * @return string|null
     */
    public function get_http_connection()
    {
        return isset($this->data['http_connection']) ? $this->data['http_connection'] : null;
    }

    /**
     * @return string|null
     */
    public function get_http_cache_control()
    {
        return isset($this->data['http_cache_control']) ? $this->data['http_cache_control'] : null;
    }

    /**
     * @return string|null
     */
    public function get_http_accept()
    {
        return isset($this->data['http_accept']) ? $this->data['http_accept'] : null;
    }

    /**
     * @return string|null
     */
    public function get_http_user_agent()
    {
        return isset($this->data['http_user_agent']) ? $this->data['http_user_agent'] : null;
    }

    /**
     * @return string|null
     */
    public function get_http_accept_encoding()
    {
        return isset($this->data['http_accept_encoding']) ? $this->data['http_accept_encoding'] : null;
    }

    /**
     * @return string|null
     */
    public function get_http_accept_language()
    {
        return isset($this->data['http_accept_language']) ? $this->data['http_accept_language'] : null;
    }

    /**
     * @return string|null
     */
    public function get_path()
    {
        return isset($this->data['path']) ? $this->data['path'] : null;
    }

    /**
     * @return string|null
     */
    public function get_server_signature()
    {
        return isset($this->data['server_signature']) ? $this->data['server_signature'] : null;
    }

    /**
     * @return string|null
     */
    public function get_server_software()
    {
        return isset($this->data['server_software']) ? $this->data['server_software'] : null;
    }

    /**
     * @return string|null
     */
    public function get_server_name()
    {
        return isset($this->data['server_name']) ? $this->data['server_name'] : null;
    }

    /**
     * @return string|null
     */
    public function get_server_addr()
    {
        return isset($this->data['server_addr']) ? $this->data['server_addr'] : null;
    }

    /**
     * @return string|null
     */
    public function get_server_port()
    {
        return isset($this->data['server_port']) ? $this->data['server_port'] : null;
    }

    /**
     * @return string|null
     */
    public function get_remote_addr()
    {
        return isset($this->data['remote_addr']) ? $this->data['remote_addr'] : null;
    }

    /**
     * @return string|null
     */
    public function get_document_root()
    {
        return isset($this->data['document_root']) ? $this->data['document_root'] : null;
    }

    /**
     * @return string|null
     */
    public function get_request_scheme()
    {
        return isset($this->data['request_scheme']) ? $this->data['request_scheme'] : null;
    }

    /**
     * @return string|null
     */
    public function get_context_prefix()
    {
        return isset($this->data['context_prefix']) ? $this->data['context_prefix'] : null;
    }

    /**
     * @return string|null
     */
    public function get_context_document_root()
    {
        return isset($this->data['context_document_root']) ? $this->data['context_document_root'] : null;
    }

    /**
     * @return string|null
     */
    public function get_server_admin()
    {
        return isset($this->data['server_admin']) ? $this->data['server_admin'] : null;
    }

    /**
     * @return string|null
     */
    public function get_script_filename()
    {
        return isset($this->data['script_filename']) ? $this->data['script_filename'] : null;
    }

    /**
     * @return string|null
     */
    public function get_remote_port()
    {
        return isset($this->data['remote_port']) ? $this->data['remote_port'] : null;
    }

    /**
     * @return string|null
     */
    public function get_gateway_interface()
    {
        return isset($this->data['gateway_interface']) ? $this->data['gateway_interface'] : null;
    }

    /**
     * @return string|null
     */
    public function get_server_protocol()
    {
        return isset($this->data['server_protocol']) ? $this->data['server_protocol'] : null;
    }

    /**
     * @return string|null
     */
    public function get_request_method()
    {
        return isset($this->data['request_method']) ? $this->data['request_method'] : null;
    }

    /**
     * @return string|null
     */
    public function get_query_string()
    {
        return isset($this->data['query_string']) ? $this->data['query_string'] : null;
    }

    /**
     * @return string|null
     */
    public function get_request_uri()
    {
        return isset($this->data['request_uri']) ? $this->data['request_uri'] : null;
    }

    /**
     * @return string|null
     */
    public function get_script_name()
    {
        return isset($this->data['script_name']) ? $this->data['script_name'] : null;
    }

    /**
     * @return string|null
     */
    public function get_php_self()
    {
        return isset($this->data['php_self']) ? $this->data['php_self'] : null;
    }

    /**
     * @return string|null
     */
    public function get_request_time_float()
    {
        return isset($this->data['request_time_float']) ? $this->data['request_time_float'] : null;
    }

    /**
     * @return string|null
     */
    public function get_request_time()
    {
        return isset($this->data['request_time']) ? $this->data['request_time'] : null;
    }
}