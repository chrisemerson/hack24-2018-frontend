<?php
namespace ManyWays\Site\Actions;

use Psr\Log\LoggerInterface;
use Slim\Http\Request;
use Slim\Http\Response;
use Slim\Views\Twig;

class RouteAction
{
    private $view;
    private $logger;

    public function __construct(Twig $view, LoggerInterface $logger)
    {
        $this->view = $view;
        $this->logger = $logger;
    }

    public function __invoke(Request $request, Response $response, $args)
    {
        $this->logger->info("Route action dispatched");

        $data = [
            'start' => ucwords($request->getParam('start')),
            'end' => ucwords($request->getParam('end'))
        ];

        $this->view->render($response, 'route.html.twig', $data);

        return $response;
    }

}
