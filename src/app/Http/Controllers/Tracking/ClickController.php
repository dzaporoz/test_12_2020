<?php

namespace App\Http\Controllers\Tracking;

use App\Tracking\Repositories\ClickRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\Click\Click\GetClicksRequest;
use App\Http\Requests\Click\Click\ShowClickRequest;
use Illuminate\Http\JsonResponse;

class ClickController extends Controller
{
    /** @var ClickRepositoryInterface repository */
    protected $repository;

    /**
     * BadDomainController constructor.
     * @param ClickRepositoryInterface $r
     */
    public function __construct(ClickRepositoryInterface $r)
    {
        $this->repository = $r;
    }

    /**
     * Display a listing of the resource.
     *
     * @param GetClicksRequest $request
     * @return JsonResponse
     */
    public function index(GetClicksRequest $request): JsonResponse
    {
        $filters = $request->only(["id", "ua", "ip", "ref", "param1", "param2"]);

        return response()->json([
            'data' => $this->repository->all(
                $request->input('limit'),
                $request->input('offset'),
                $request->input('sort_by'),
                $request->input('order'),
                $filters
            ),
            'total_count' => $this->repository->getSelectAllRowsCount()
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param ShowClickRequest $request
     * @return JsonResponse
     */
    public function show(ShowClickRequest $request): JsonResponse
    {
        return response()->json($this->repository->find($request->input("click")));
    }
}
