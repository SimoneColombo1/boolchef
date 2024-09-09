<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreChefRequest;
use App\Http\Requests\UpdateChefRequest;
use App\Models\Chef;
use App\Models\Specialization;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ChefController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $chefs = Chef::all();

        return view('admin.chefs.index', compact('chefs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $chefs = new Chef();
        $specializations = Specialization::all();
        return view('admin.chefs.create', compact('chefs', 'specializations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreChefRequest $request)
    {
        $data = $request->validated();


        $img_path = Storage::disk('public')->put('upload/img', $data['photograph']);
        $file_path = Storage::disk('public')->put('upload/cv', $data['CV']);
        $data["photograph"] = $img_path;
        $data["CV"] = $file_path;
        $data['user_id'] = Auth::id();
        $newChef = Chef::create($data);
        return redirect()->route('admin.chefs.show', $newChef);
    }

    /**
     * Display the specified resource.
     */
    public function show(Chef $chef)
    {



        return view('admin.chefs.show', compact('chef'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateChefRequest $request, Chef $chef)
    {
        $data = $request->validated();
        $img_path = Storage::disk('public')->put('uploads/Images', $data['photograph']);
        $file_path = Storage::disk('public')->put('uploads/Cv', $data['CV']);
        $data["photograph"] = $img_path;
        $data["CV"] = $file_path;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chef $chef)
    {
        //
        $chef->delete();

        return redirect()->route('admin.chefs.index');
    }
}