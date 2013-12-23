<?php
/**
 * Created by PhpStorm.
 * User: Maksim
 * Date: 04.12.13
 * Time: 21:51
 */

namespace Likedimion\Tools\Helper;


use Likedimion\Service\TranslationsHelperInterface;
use Symfony\Component\Console\Helper\InputAwareHelper;
use Symfony\Component\Yaml\Yaml;

class TranslationHelper extends InputAwareHelper implements TranslationsHelperInterface {
    /** @var  string */
    protected $locale;
    /** @var  array */
    protected $lines = array();

    /**
     * Returns the canonical name of this helper.
     *
     * @return string The canonical name
     *
     * @api
     */
    public function getName()
    {
        return "translations";
    }

    /**
     * @param string $localeFile
     */
    public function setLocale($localeFile)
    {
        $this->locale = $localeFile;
    }

    /**
     * @throws \RuntimeException
     * @return $this
     */
    public function load() {
        if(file_exists($this->locale)){
            $this->lines = Yaml::parse(file_get_contents($this->locale));
        } else {
            throw new \RuntimeException(
                sprintf("Locale file %s not found", $this->locale)
            );
        }
        return $this;
    }

    /**
     * @param string $line
     * @return string
     */
    public function getLine($line)
    {
        return (isset($this->lines[$line])) ? $this->lines[$line] : $line;
    }
}