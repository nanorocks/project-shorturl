<?php

namespace App\Controller;

use App\Persistent\ControllerInterface;

/**
 * Class ViewUrlPageController
 * @package App\Controller
 */
class ViewUrlPageController implements ControllerInterface
{
    /**
     * @var \Twig\Environment
     */
    private $twig;

    /**
     * ViewUrlPageController constructor.
     * @param \Twig\Environment $twig
     */
    public function __construct(\Twig\Environment $twig)
    {
        $this->twig = $twig;
    }

    /**
     * @return mixed|void
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function load()
    {
        echo $this->twig->render('index.twig', []);
    }
}