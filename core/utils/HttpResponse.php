<?php
class HttpResponse
{
    public function __construct($templatePath, $context, $layout='base')
    {
        $templatePath = $this->_normaliseFilePath($templatePath);
        $content = dirname(__DIR__) . '/../templates/' . $templatePath . '.php';
        $layout = dirname(__DIR__) . '/../templates/layouts/' . $layout . '.php';
        echo $content;
        if (!file_exists($content)) {
            die('No such template file');
        }
        require_once $content;
    }

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
