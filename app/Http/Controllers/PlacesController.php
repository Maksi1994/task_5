<?php

namespace App\Http\Controllers;

use App\Http\Requests\PlaceRequest;
use App\Models\Image;
use App\Models\Place;
use App\Models\Type;
use App\Models\Estimate;

use Illuminate\Http\Request;

class PlacesController extends Controller
{

    function getPlaces(Request $request)
    {
        $places = Place::all();

        return view('places', compact('places'));
    }

    function getCreateForm(Request $request)
    {
        $types = Type::all();

        return view('create', compact('types'));
    }

    function createPlace(PlaceRequest $request)
    {
        Place::create($request->all());

        return redirect()->route('all-places');
    }

    function getPlace(Request $request)
    {
        $place = Place::findOrFail($request->id);
        $imagesEstimatesCount = $place->estimates->count();

        foreach ($place->images as $img) {
            $imagesEstimatesCount += $img->estimates->count();
        }

        return view('place', compact('place', 'imagesEstimatesCount'));
    }

    function getPhotosEditForm(Request $request)
    {
        $place = Place::find($request->id);

        return view('add-photo-to-place', compact('place'));
    }

    function addPhotoToPlace(Request $request)
    {
        if ($request->has('photos')) {
            $request->file('photos')->store('images', 'public');
        }

        Image::create([
            'name' => $request->photos->hashName(),
            'place_id' => $request->place_id
        ]);

        return redirect('/place/' . $request->place_id);
    }

    function getAbstactPhotoForm(Request $request)
    {
        $places = Place::all();

        return view('add-photo', compact('places'));
    }

    function doEstimate(Request $request)
    {
        $type = $request->type;
        $target_id = $request->target_id;
        $estimate_type_id = Estimate::get()->where('name', $request->action_type)->pluck('id');

        if (!empty($estimate_type_id) && $type === 'place') {
            Place::find($target_id)->estimates()->attach($estimate_type_id);
            return redirect()->route('get-place', [$target_id]);

        } else if (!empty($estimate_type_id) && $type === 'image') {
            $model = Image::find($target_id);
            $model->estimates()->attach($estimate_type_id);

            return redirect()->route('get-place', [$model->place_id]);
        }

        return redirect()->route('all-places');
    }

    function getPlacesByRating(Request $request)
    {
        $places = Place::all()->sortByDesc(function ($place) {
            return $place->estimates->count();
        });

        return response()->json($places->map(function ($place) {
            return [
                'name' => $place->name,
                'estimates' => $place->estimates->count()
            ];
        }));
    }

    function getPlaceImages(Request $request) {
        $images = Image::all()->where('place_id', $request->id);

        return response()->json($images->map(function ($image) {
            return [
                'name' => $image->name,
                'created_id' => $image->created_at
            ];
        })->values());
    }

}
