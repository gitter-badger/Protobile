<?php
/**
 * @package Protobile
 * @since Barcelona
 * @author Matiss Treinis <matiss@marolind.com>
 * @copyright Protobile Developers
 * @license Apache License 2.0
 */

namespace Protobile\Core;

class Config
{
    /**
     * @var array
     */
    protected $config = [];
    /**
     * @var
     */
    protected $app_path;

    /**
     * @return mixed
     */
    public function get_app_path()
    {
        return $this->app_path;
    }

    /**
     * @param $app_path
     */
    public function set_app_path($app_path)
    {
        $this->app_path = $app_path;
    }

    /**
     * @param $app_path
     * @throws \ErrorException
     */
    public function __construct($app_path)
    {
        $this->set_app_path($app_path);
        $this->set_config($this->load_config($app_path));
    }

    /**
     * @param $config
     */
    public function set_config($config)
    {
        $this->config = $config;
    }

    /**
     * @param  null       $key
     * @return array|void
     */
    public function get($key = null)
    {
        if (null === $key) {
            return $this->config;
        }

        return get_dot_value($key, $this->config);
    }

    /**
     * @param $key
     * @param $value
     */
    public function set($key, $value)
    {
        if (empty($key)) {
            throw new \InvalidArgumentException('Config key must have value when doing insertion');
        }
        set_dot_value($key, $value, $this->config);
    }

    /**
     * @param $key
     */
    public function delete($key)
    {
        if (empty($key)) {
            throw new \InvalidArgumentException('Config key must have value when doing deletion');
        }
        delete_dot_value($key, $this->config);
    }

    /**
     * @param $application_path
     * @return array
     * @throws \ErrorException
     */
    protected function load_config($application_path)
    {
        $config              = [];
        $global_config_files = $this->get_recursive_config_file_list($application_path . '/Config/');
        $module_config_files = $this->get_all_module_config_file_list($application_path . '/Modules/');

        foreach ($global_config_files as $file) {
            $content                  = $this->get_config_contents($file['file']);
            $config[$file['section']] = $content;
        }

        if (isset($config['modules'])) {
            throw new \ErrorException('There MUST not be a global configuration file called "modules" - this section is reserved for module specific configurations!');
        }
        $config['modules'] = [];
        foreach ($module_config_files as $record) {
            foreach ($record['files'] as $file) {
                $content                                                                   = $this->get_config_contents($file['file']);
                $config['modules'][$record['vendor']][$record['module']][$file['section']] = $content;
            }
        }

        return $config;
    }

    /**
     * @param $directory
     * @return array
     */
    protected function get_recursive_config_file_list($directory)
    {
        $file_list          = [];
        $directory_iterator = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($directory));
        $directory_iterator->rewind();

        while ($directory_iterator->valid()) {
            if ($directory_iterator->getExtension() == 'php') {
                $file        = $directory_iterator->key();
                $file_list[] = [
                    'file'    => $file,
                    'section' => $this->get_config_section_from_file_name($file, $directory),
                ];
            }
            $directory_iterator->next();
        }

        return $file_list;
    }

    /**
     * @param $modules_root
     * @return array
     */
    protected function get_all_module_config_file_list($modules_root)
    {
        $file_list                 = [];
        $module_directory_iterator = new \DirectoryIterator($modules_root);
        foreach ($module_directory_iterator as $file_info) {
            if (!$file_info->isDot() && $file_info->isDir()) {
                $module_config = $this->get_module_config_file_list($file_info->getPathname());
                $file_list     = array_merge($file_list, $module_config);
            }
        }

        return $file_list;
    }

    /**
     * @param $modules_dir
     * @return array
     */
    protected function get_module_config_file_list($modules_dir)
    {
        $file_list                 = [];
        $module_directory_iterator = new \DirectoryIterator($modules_dir);
        foreach ($module_directory_iterator as $file_info) {
            if (!$file_info->isDot() && $file_info->isDir()) {
                $pathname    = $file_info->getPathname();
                $module      = $file_info->getFilename();
                $config_dir  = $pathname . '/Config/';
                if (file_exists($config_dir) === false) {
                    continue;
                }
                $vendor      = strtolower(basename($file_info->getPath()));
                $file_list[] = [
                    'module' => strtolower($module),
                    'files'  => $this->get_recursive_config_file_list($config_dir),
                    'vendor' => $vendor,
                ];
            }
        }

        return $file_list;
    }

    /**
     * @param $file_name
     * @param $base
     * @return string
     */
    protected function get_config_section_from_file_name($file_name, $base)
    {
        $sections_raw = str_replace(
            [
                $base,
                '.php',
            ],
            '',
            $file_name
        );

        $sections_lower = strtolower($sections_raw);

        return trim($sections_lower, '/');
    }

    /**
     * @param $file
     * @return mixed
     * @throws \ErrorException
     */
    protected function get_config_contents($file)
    {
        if (file_exists($file) === false) {
            throw new \ErrorException('Requested configuration file does not exist - "' . $file . '"');
        }

        return require $file;
    }
}