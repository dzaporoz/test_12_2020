<?php

namespace App\Http\Controllers\Click;

use App\Click\Repositories\BadDomainRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\Click\BadDomain\DeleteBadDomainRequest;
use App\Http\Requests\Click\BadDomain\ShowBadDomainRequest;
use App\Http\Requests\Click\BadDomain\StoreBadDomainRequest;
use App\Http\Requests\Click\BadDomain\GetBadDomainsRequest;
use App\Http\Requests\Click\BadDomain\UpdateBadDomainRequest;
use Illuminate\Http\JsonResponse;

class BadDomainController extends Controller
{
    /** @var BadDomainRepositoryInterface repository */
    protected $repository;

    /**
     * BadDomainController constructor.
     * @param BadDomainRepositoryInterface $r
     */
    public function __construct(BadDomainRepositoryInterface $r)
    {
        $this->repository = $r;
    }

    /**
     * Display a listing of the resource.
     *
     * @param GetBadDomainsRequest $request
     * @return JsonResponse
     */
    public function index(GetBadDomainsRequest $request): JsonResponse
    {
        return response()->json([
            'data' => $this->repository->all(
                $request->input('limit'),
                $request->input('offset'),
                $request->input('sort_by'),
                $request->input('order'),
                $request->only("name")
            ),
            'total_count' => $this->repository->getSelectAllRowsCount()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreBadDomainRequest $request
     * @return JsonResponse
     */
    public function store(StoreBadDomainRequest $request): JsonResponse
    {
        return response()->json($this->repository->create($request->all()));
    }

    /**
     * Display the specified resource.
     *
     * @param ShowBadDomainRequest $request
     * @return JsonResponse
     */
    public function show(ShowBadDomainRequest $request): JsonResponse
    {
        return response()->json($this->repository->find($request->input("bad_domain")));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateBadDomainRequest $request
     * @return JsonResponse
     */
    public function update(UpdateBadDomainRequest $request): JsonResponse
    {
        return response()->json(
            $this->repository->update(
                $request->input('bad_domain'), $request->all()
        ));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DeleteBadDomainRequest $request
     * @param  $id
     * @return JsonResponse
     */
    public function destroy(DeleteBadDomainRequest $request): JsonResponse
    {
        return response()->json($this->repository->delete($request->input("bad_domain")));
    }
}
