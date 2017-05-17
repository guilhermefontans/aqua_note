<?php
/**
 * Created by PhpStorm.
 * User: fontans
 * Date: 5/17/17
 * Time: 9:56 AM
 */

namespace AppBundle\Service;

use Doctrine\Common\Cache\Cache;
use Knp\Bundle\MarkdownBundle\MarkdownParserInterface;

class MarkdownTransformer
{
    private $markdown;
    private $cache;

    public function __construct(MarkdownParserInterface $markdown, Cache $cache)
    {
        $this->markdown = $markdown;
        $this->cache = $cache;
    }

    public function parse($string)
    {
        $key = md5($string);
        $cache = $this->cache;

        if ($cache->contains($key)) {
            return $cache->fetch($key);
        }

        sleep(1);
        $string = $this->markdown->transform($string);
        $cache->save($key, $string);
        return $string;
    }
}