<?php
/**
 * Class: HttpResponse
 * handles echoind template php files, using correct layout and passes context data
 *
 */
class HttpResponse
{
    /**
     * Resolver php template files to output and outputs them
     *
     * @param string $templatePath relative path to the template file without extension
     * @param string $context      hashmap containing context data which will be accessed in template
     * @param string $layout       relative path to the layout file without extension
     *
     * @return void
     */
    public function __construct($templatePath, $context, $layout='base')
    {
        $templatePath = $this->_normaliseFilePath($templatePath);
        $content = dirname(__DIR__) . '/../templates/' . $templatePath . '.php';
        $layout = dirname(__DIR__) . '/../templates/layouts/' . $layout . '.php';
        if (!file_exists($content)) {
            die('No such template file');
        }
        if (!file_exists($layout)) {
            die('No such layout file');
        }
        include_once $layout;
    }

    /**
     * Normalizes file path to match the pattern
     *
     * @param string $filepath path to normalize
     *
     * @return void
     */
    private function _normaliseFilePath($filepath)
    {
        $startsWithSlash = mb_substr($filepath, 0, 1) == '/';
        $endsWithPhp = mb_substr($filepath, mb_strlen($filepath) - 4, 4) == '.php';

        if ($endsWithPhp) {
            $filepath = mb_substr($filepath, 0, mb_strlen($filepath) - 4);
        }

        if ($startsWithSlash) {
            $filepath = mb_substr($filepath, 1, mb_strlen($filepath) - 1);
        }

        return $filepath;
    }
}
