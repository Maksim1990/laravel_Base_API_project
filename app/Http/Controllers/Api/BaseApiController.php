<?php


namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;

class BaseApiController extends Controller
{
    /**
     * @param array $data
     * @param null $statusCode
     * @param null $placeholders
     * @param array $headers
     * @return \Illuminate\Http\JsonResponse
     */
    protected function view(array $data, $statusCode = null, $placeholders = null, array $headers = [])
    {
        if (!is_array($data) || !isset($data['data'])) {
            $data = array(
                "data" => !is_null($data) ? $data : array(),
            );
        }
        return response()->json($data, $statusCode);
    }


    /**
     * @param $data
     * @param null $errorCode
     * @param null $placeholders
     * @param array $headers
     * @return \Illuminate\Http\JsonResponse
     */
    protected function errorView($data, $errorCode = null, $placeholders = null, array $headers = [])
    {
            $data = array(
                "error" => !is_null($data) ? $data : array(),
            );

        return response()->json($data, $errorCode);
    }

    /**
     * @param Request $request
     * @param string $type
     * @param array $arrParams
     * @return bool
     */
    protected function getSortedCollectionData(Request $request, string $type, array $arrParams=[])
    {
        $orderBy = $request->get("order_by") ?? "id";
        $sortBy = (in_array(strtoupper($request->get("sort_by")), ["ASC", "DESC"])) ? $request->get("sort_by") : "ASC";
        if (in_array($type, ['product'])) {
            if($type==='review'){
                $collection =Review::where('product_id',$arrParams['product_id'])->orderBy($orderBy, $sortBy);
            }else{
                $collection = Product::where("id", "!=", 0)->orderBy($orderBy, $sortBy);
            }
            return $collection->paginate($request->get("limit") ?? config('paginator.max_per_page'));
        } else {
            return false;
        }

    }

}
