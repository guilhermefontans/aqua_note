<?php
/**
 *
 * Created by PhpStorm.
 * User: fontans
 * Date: 5/12/17
 * Time: 9:52 PM
 */

namespace AppBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class GenusController extends Controller
{
    /**
     * @Route("/genus/{genusName}")
     * @param $genusName
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function showAction($genusName)
    {
        return $this->render(
            'genus/show.html.twig',
            [
                'name' => $genusName,
                'notes' => [
                    "linha1",
                    "linha2",
                    "linha3",
                    "linha4"
                ]
            ]
        );
    }
}