<?php

namespace App\Controller;

use App\Persistent\ControllerInterface;
use Illuminate\Database\Connection;

/**
 * Class StoreUrlController
 * @package App\Controller
 */
class StoreUrlController implements ControllerInterface
{
    /**
     * @var \Twig\Environment
     */
    private $template;

    /**
     * StoreUrlController constructor.
     * @param \Twig\Environment $twig
     */
    public function __construct(
        \Twig\Environment $template,
        Connection $db
    )
    {
        $this->template = $template;
        $this->db = $db;
    }

    /**
     * @return mixed|void
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function load()
    {
        echo $this->template->render('index.twig', []);
    }
}