<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Http\Requests\StoreHotelRequest;
use App\Http\Requests\UpdateHotelRequest;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hotels = Hotel::query()->latest('id')->paginate(10);
        return view('index', compact('hotels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreHotelRequest $request)
    {
        $data = $request->all();

        Hotel::query()->create($data);
        return redirect()->route('hotels.index')->with('message', 'Thêm thành công!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Hotel $hotel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $hotel = Hotel::query()->findOrFail($id);

        return view('edit', compact('hotel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $hotel = Hotel::query()->findOrFail($id);

        $data = $request->validate(
            [
            'name' => 'required|unique:hotels,name,' . $hotel->id . '|max:255',
            'location' => 'required'
        ],
        [
            'name.required'=> 'name không được để trống',
            'name.unique'=> 'name đã tồn tại',
            'location.required'=> 'location không được để trống',
            ]
    );

        $hotel->update($data);

        return redirect()->back()->with('message', 'Cập nhật dữ liệu thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $hotel = Hotel::query()->find($id)->delete();

        return redirect()->route('hotels.index')->with('message','Xóa thành công!');
    }
}
