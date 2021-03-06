<?php
namespace ManyWays\Site\Actions;

use GuzzleHttp\Client;
use Psr\Log\LoggerInterface;
use Slim\Http\Request;
use Slim\Http\Response;
use Slim\Views\Twig;

class RouteAction
{
    private $view;
    private $logger;
    private $guzzle;

    const LOCATE_API = 'http://locate.api.many-ways.co.uk';
    const ROUTE_API = 'http://route.api.many-ways.co.uk/manyways';

    public function __construct(Twig $view, LoggerInterface $logger)
    {
        $this->view = $view;
        $this->logger = $logger;
        $this->guzzle = new Client();
    }

    public function __invoke(Request $request, Response $response, $args)
    {
        $this->logger->info("Route action dispatched");

        $start = $request->getParam('start');
        $end = $request->getParam('end');

        $data = [
            'start' => ucwords($start),
            'end' => ucwords($end)
        ];

        list($startLat, $startLong) = $this->getLatLong($start);
        list($endLat, $endLong) = $this->getLatLong($end);

        $data['routes'] = $this->getRoutes($startLat, $startLong, $endLat, $endLong);

        $this->view->render($response, 'route.html.twig', $data);

        return $response;
    }

    private function getLatLong($place)
    {
        $results = $this->guzzle->get(self::LOCATE_API, ['query' => ['place' => $place]]);

        $latLong = json_decode($results->getBody()->getContents());

        return [$latLong->lat, $latLong->lng];
    }

    private function getRoutes($startLat, $startLong, $endLat, $endLong)
    {
        $results = $this->guzzle->get(self::ROUTE_API, ['query' => [
            'start' => $startLat . "," . $startLong,
            'end' => $endLat . "," . $endLong,
        ]]);

        $routesJSON = json_decode($results->getBody()->getContents())->direct_routes;

        $parkAndRideRoute = $results->getBody()->getContents()->pandr_route;

        $polylines = [];

        foreach ($parkAndRideRoute->from_pandr->polylines as $polyline) {
            $polylines[] = $polyline;
        }

        foreach ($parkAndRideRoute->to_pandr->polylines as $polyline) {
            $polylines[] = $polyline;
        }

        $routesJSON[] = [
            'polylines' => $polylines,
            'total_score' => $parkAndRideRoute->total_score,
            'type' => ['PARK AND RIDE'],
        ];

        usort($routesJSON, [$this,'sortRoutes']);

        return $routesJSON;
    }

    private function sortRoutes($route1, $route2)
    {
        return $route2->total_score <=> $route1->total_score;
    }
}
