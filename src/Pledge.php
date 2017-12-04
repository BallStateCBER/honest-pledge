<?php
namespace App;

use \Exception;

class Pledge
{
    private $html = '';

    /**
     * Pledge constructor.
     *
     * @param string $name The pledge-maker's name
     * @param string $version Either citizen, business, or official
     * @throws Exception
     */
    public function __construct($name, $version)
    {
        $this->html = $this->getHtml($name, $version);
        switch ($version) {
            case 'citizen':
            case 'business':
            case 'official':
                $template = $this->getTemplate($version);
                $this->html = $this->replaceTokens($template, $name);

                return;
        }

        throw new Exception("Unrecognized pledge type: $version");
    }

    /**
     * Replaces any placeholder tokens (e.g. [name] with appropriate strings)
     *
     * @param string $template Html with tokens to replace
     * @param string $name The pledge-maker's name
     * @return string
     */
    private function replaceTokens($template, $name)
    {
        $template = str_replace('[name]', $name, $template);
        $template = str_replace('[date]', date('F j, Y'), $template);

        return $template;
    }

    public function getHtml()
    {
        return $this->html;
    }

    /**
     * Returns the contents of the specified template file, wrapped with wrapper.php
     *
     * @param string $templateName The name of the template
     * @return string
     * @throws Exception
     */
    private function getTemplate($templateName)
    {
        $dir = dirname(__FILE__) . '/Templates';
        $wrapper = file_get_contents($dir . '/wrapper.php');
        if (! $wrapper) {
            throw new Exception("Template wrapper not found");
        }

        $template = file_get_contents($dir . "/$templateName.php");
        if (! $template) {
            throw new Exception("Unknown template name: $templateName");
        }

        return str_replace('[pledge]', $template, $wrapper);
    }
}