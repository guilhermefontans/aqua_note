<?php
/**
 * Created by PhpStorm.
 * User: fontans
 * Date: 5/17/17
 * Time: 1:48 PM
 */

namespace AppBundle\Twig;

use AppBundle\Service\MarkdownTransformer;
use Twig_SimpleFilter;

class MarkdownExtension extends \Twig_Extension
{
    private $markdownTransformer;

    public function __construct(MarkdownTransformer $markdownTransformer)
    {
        $this->markdownTransformer = $markdownTransformer;
    }

    public function getName()
    {
        return 'app.markdown';
    }

    public function getFilters()
    {
        return [
            new Twig_SimpleFilter(
                'markdownify',
                [
                    $this,
                    'parseMarkdown'
                ],
                [
                    'is_safe' => ['html']
                ]
            )
        ];
    }

    public function parseMarkdown($string)
    {
        return $this->markdownTransformer->parse($string);
    }
}