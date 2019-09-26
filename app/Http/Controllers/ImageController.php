<?php

namespace App\Http\Controllers;

use App\Photos;

use App\Http\Requests;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
// use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManagerStatic as Image;


class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
        //
        return view('tpl.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAll()
    {
        //
        $all_image = DB::table('photos')->orderBy('id', 'desc')->paginate(6);
        return view('tpl.all_image')->with('images', $all_image);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postIndex()
    {
        //
        $Validation = Validator::make(Input::all(), Photos::$upload_rules);

        if ($Validation->fails()) {
            return redirect('/')->withInput()->withErrors($Validation);
        } else {
            $image = Input::file('image');
            $filename = $image->getClientOriginalExtension();
            $filename = pathinfo($filename, PATHINFO_FILENAME);
            $fullname = Str::slug(Str::random(8) . $filename) . '.' . $image
                ->getClientOriginalExtension();
            $upload = $image->move(Config::get('image.upload_folder'), $fullname);

            Image::make(Config::get('image.upload_folder') . '/' . $fullname)->resize(
                Config::get('image.thumb_width'),
                null,
                function ($constraint) {
                    $constraint->aspectRatio();
                }
            )->save(Config::get('image.thumb_folder') . '/' . $fullname);
            if ($upload) {
                # code...
                $insert_id = DB::table('photos')->insertGetId(
                    array(
                        'title' => Input::get('title'),
                        'image' => $fullname,
                    )
                );

                return redirect(url('snatch/'.$insert_id))->with('success', "your image is uploaded successfully");
            } else {
                # code...
                return redirect('/')->withInput()->with('error', "your image is uploaded successfully");
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getImages($id)
    {
        //
        $image = Photos::find($id);

        if ($image) {
            return view('tpl.permalink')->with('image', $image);
        } else {
            return redirect('/')->with('error', 'image not found');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
