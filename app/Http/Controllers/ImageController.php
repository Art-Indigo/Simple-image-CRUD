<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImageRequest;
use App\Image;
use Illuminate\Support\Facades\Storage;
use Kris\LaravelFormBuilder\FormBuilder;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $images = Image::with('category')->get();


        return view('images.index', compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(FormBuilder $formBuilder)
    {
        $form = $formBuilder->create('App\Forms\ImageForm', [
            'method' => 'PAST',
            'url' => route('images.store')
        ]);

        return view('images.create', compact('form'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ImageRequest $request)
    {
        //Сделать сервис по обработке загрузки файлов
        $filename = $request->file('cover_image')->getClientOriginalName();
        $filename = pathinfo($filename, PATHINFO_FILENAME);
        $fileExtension = $request->file('cover_image')->getClientOriginalExtension();
        $fileToStore = $filename.'_'.time().'.'.$fileExtension;
        $path = $request->file('cover_image')->storeAs('public/images/'.$request->input('category_id'), $fileToStore);

        $data = $request->validated();
        $data['path'] =  $fileToStore;

        $user = $request->user();
        $image = $user->images()->create($data);

        return redirect(route('images.show', $image->id))->with('success', 'Success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function show(Image $image)
    {
        return view('images.show', compact('image'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy(Image $image)
    {

        if(Storage::delete('public/images/'.$image->category_id.'/'.$image->path)) {
            $image->delete();
            return redirect('/')->with('success', 'Photo Deleted');
        }

    }
}
