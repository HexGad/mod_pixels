<?php

namespace HexGad\Pixels\Http\Controllers;

use HexGad\Pixels\Models\Pixel;
use HexGad\Pixels\Http\DataTables\PixelsDataTable;
use HexGad\Pixels\Http\Requests\StorePixelsRequest;
use HexGad\Pixels\Http\Requests\UpdatePixelsRequest;
use App\Exceptions\ApiException;

use Illuminate\Routing\Controller;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\JsonResponse;

class PixelController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param PixelsDataTable $datatable
     * @return Renderable|JsonResponse
     */
    public function index(PixelsDataTable $datatable): Renderable|JsonResponse
    {
        return $datatable->render('pixels::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create(): Renderable
    {
        return view('pixels::create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StorePixelsRequest $request
     *
     * @return JsonResponse
     * @throws ApiException
     */
    public function store(StorePixelsRequest $request): JsonResponse
    {
        if($pixel = Pixel::create($request->validated()))
            return response()->json($pixel);

        throw new ApiException;
    }

    /**
     * Show the specified resource.
     *
     * @param Pixel $pixel
     *
     * @return Renderable
     */
    public function show(Pixel $pixel): Renderable
    {
        return view('pixels::show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Pixel $pixel
     *
     * @return Renderable
     */
    public function edit(Pixel $pixel): Renderable
    {
        return view('pixels::edit', compact('pixel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdatePixelsRequest $request
     * @param Pixel $pixel
     *
     * @return JsonResponse
     * @throws ApiException
     */
    public function update(UpdatePixelsRequest $request, Pixel $pixel): JsonResponse
    {
        if($pixel->update($request->validated()))
            return response()->json($pixel);

        throw new ApiException;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Pixel $pixel
     *
     * @return JsonResponse
     * @throws ApiException
     */
    public function destroy(Pixel $pixel): JsonResponse
    {
        if($pixel->delete())
            return response()->json($pixel);

        throw new ApiException;
    }
}
