<?php
namespace app\ctrls;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

use app\models\Category;

class CategoryCtrl {

    public function getAllAction(Request $request, Response $response, $args) {
        $category = new Category();
        $data = $category->getAll();
        $response = $response->withHeader('Content-type', 'application/json');
        $response = $response->withJson(['msg' => 'suceess', 'data' => $data]);
        return $response;
    }

    public function getOneAction(Request $request, Response $response, $args) {
        $id = $args['id'];
        $category = new Category();
        $data = $category->find($id);
        $response = $response->withHeader('Content-type', 'application/json');
        $response = $response->withJson(['msg' => 'suceess', 'data' => $data]);
        return $response;
    }


    public function addAction(Request $request, Response $response, $args) {
        $request = $request->withHeader('Content-type', 'application/x-www-form-urlencoded');
        $parsedBody = $request->getParsedBody();

        $category = new Category();
        $flag = $category->add($parsedBody);
        $msg = $flag ? 'suceess' : 'error';
        $statusCode = $flag ? 200 : 400;

        $response = $response->withHeader('Content-type', 'application/json');
        $response = $response->withJson(['msg' => $msg, 'data' => $parsedBody], $statusCode);
        return $response;
    }

    public function updateAction(Request $request, Response $response, $args) {
        $id = $args['id'];
        $request = $request->withHeader('Content-type', 'application/x-www-form-urlencoded');
        $parsedBody = $request->getParsedBody();

        $category = new Category();
        $flag = $category->update($id, $parsedBody);
        $msg = $flag ? 'suceess' : 'error';
        $statusCode = $flag ? 200 : 400;

        $response = $response->withHeader('Content-type', 'application/json');
        $response = $response->withJson(['msg' => $msg, 'data' => $parsedBody], $statusCode);
        return $response;
    }

    public function delAction(Request $request, Response $response, $args) {
        $id = $args['id'];

        $category = new Category();
        $flag = $category->delete($id);
        $msg = $flag ? 'suceess' : 'error';
        $statusCode = $flag ? 200 : 400;

        $response = $response->withHeader('Content-type', 'application/json');
        $response = $response->withJson(['msg' => $msg, 'id' => $id], $statusCode);
        return $response;
    }

    public static function className() {
        return __CLASS__;
    }
}
