<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddContainerRequest;
use App\Services\Repositories\ContainerRepositoryInterface;
use App\Services\Repositories\ImageRepositoryInterface;

class ContainerController extends Controller
{
    private readonly ImageRepositoryInterface $imageRepository;
    private readonly ContainerRepositoryInterface $containerRepository;

    public function __construct(
        ImageRepositoryInterface     $imageRepository,
        ContainerRepositoryInterface $containerRepository)
    {
        $this->imageRepository = $imageRepository;
        $this->containerRepository = $containerRepository;
    }

    public function index()
    {
        $images_list = $this->imageRepository->dropDown();

        $data = $this->containerRepository->getAll();

        return view('containers.index', compact('data', 'images_list'));
    }

    public function show($id)
    {

        $data = $this->containerRepository->getById($id);

        return view('containers.show', compact('data'));
    }

    public function stop($id)
    {
        $this->containerRepository->stop($id);

        return redirect()->back()->with('status', 'The operation was successful');
    }

    public function remove($id)
    {
        $this->containerRepository->remove($id);

        return redirect()->route('containers.index')->with('status', 'The operation was successful');
    }

    public function add(AddContainerRequest $request)
    {
        $this->containerRepository->add($request->toArray());

        return redirect()->route('containers.index')->with('status', 'The operation was successful');
    }
}
