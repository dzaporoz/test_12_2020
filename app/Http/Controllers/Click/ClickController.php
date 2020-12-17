<?php

namespace App\Http\Controllers\Click;

use App\Click\ClickService;
use App\Click\Repositories\ClickRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\Click\Click\DeleteClickRequest;
use App\Http\Requests\Click\Click\GetClicksRequest;
use App\Http\Requests\Click\Click\ShowClickRequest;
use App\Http\Requests\Click\Click\StoreClickRequest;
use App\Http\Requests\Click\Click\UpdateClickRequest;
use Illuminate\Http\Request;
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
        $filters = $request->only(["id", "ua", "ip", "ref", "param2"]);

        return response()->json($this->repository->all(
            $request->input('limit'),
            $request->input('offset'),
            $request->input('sort_by'),
            $request->input('order'),
            $filters
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreClickRequest $request
     * @return JsonResponse
     */
//    public function store(StoreClickRequest $request): JsonResponse
//    {
//        return response()->json($this->repository->create($request->all()));
//    }

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

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateClickRequest $request
     * @return JsonResponse
     */
//    public function update(UpdateClickRequest $request): JsonResponse
//    {
//        return response()->json(
//            $this->repository->update(
//                $request->input('click'), $request->all()
//            ));
//    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DeleteClickRequest $request
     * @param  $id
     * @return JsonResponse
     */
//    public function destroy(DeleteClickRequest $request): JsonResponse
//    {
//        return response()->json($this->repository->delete($request->input("click")));
//    }
}
