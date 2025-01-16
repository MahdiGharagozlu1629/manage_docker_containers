<?php

namespace App\Http\Controllers;

use App\Services\Repositories\ImageRepositoryInterface;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    private readonly ImageRepositoryInterface $imageRepository;
    public function __construct(ImageRepositoryInterface $imageRepository)
    {
        $this->imageRepository = $imageRepository;
    }

    public function index()
    {
        $data = $this->imageRepository->getAll();

        return view('images.index', compact('data'));
    }

    public function remove($reference)
    {
        $this->imageRepository->remove($reference);

        return redirect()->back()->with('status', 'The operation was successful');
    }

    public function add(Request $request)
    {
        $this->imageRepository->add($request->toArray());

        return redirect()->back()->with('status', 'The operation was successful');
    }
}
