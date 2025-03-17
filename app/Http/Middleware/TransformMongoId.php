<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\JsonResponse;

class TransformMongoId
{
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        if ($response instanceof JsonResponse) {
            $data = $response->getData(true);

            $this->transformId($data);

            $response->setData($data);
        }

        return $response;
    }

    private function transformId(&$data)
    {
        if (is_array($data)) {
            foreach ($data as $key => &$value) {
                if ($key === '_id') {
                    $newData = ['id' => $value] + $data;
                    unset($newData['_id']);
                    $data = $newData;
                } elseif (is_array($value)) {
                    $this->transformId($value);
                }
            }
        }
    }
}
