<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Category;
use App\Models\Country;
use App\Models\Genre;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::pluck('title','id');
        $genre = Genre::pluck('title', 'id');
        $country = Country::pluck('title', 'id');
        //with là lấy dữ liệu từ funciton đã được khai trong Movie 
        $list = Movie::with('category','genre','country')->orderBy('id','desc') -> get();
        return view('admincp.movie.form',compact('list', 'category', 'genre', 'country'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $data = $request->all();
            $movie = new Movie();
            $movie -> title = $data['title'];
            $movie ->slug = $data['slug'];
            $movie ->description = $data['description'];
            $movie -> status = $data['status'];
            $movie ->category_id = $data['category_id'];
            $movie ->country_id = $data['country_id'];
            $movie ->genre_id = $data['genre_id'];
            //thêm hình ảnh
            $get_image = $request-> file('image');

            if($get_image){
                //lấy tên vd: hinh1.jpg
                $get_name_image = $get_image->getClientOriginalName();
                //tách tên thành chuỗi (.) vd : hinh1[0] (.) jpg[1]
                $name_image = current(explode('.', $get_name_image));
                //thêm đuôi các số, tránh trường hợp bị trùng lặp -> nối lại(.)
                $new_image = $name_image.rand(0,9999).'.'.$get_image-> getClientOriginalExtension();
                $get_image -> move('uploads/movie/',$new_image);
                $movie -> image = $new_image;
            }
            $movie->save();
            return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::pluck('title', 'id');
        $genre = Genre::pluck('title', 'id');
        $country = Country::pluck('title', 'id');
        $list = Movie::with('category','genre','country')->orderBy('id','desc') -> get();
        $movie = Movie::find($id);
        return view('admincp.movie.form', compact('list', 'category', 'genre', 'country','movie'));
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
        $data = $request->all();
        $movie = Movie::find($id);
        $movie->title = $data['title'];
        $movie->slug = $data['slug'];
        $movie->description = $data['description'];
        $movie->status = $data['status'];
        $movie->category_id = $data['category_id'];
        $movie->country_id = $data['country_id'];
        $movie->genre_id = $data['genre_id'];
        //thêm hình ảnh
        $get_image = $request->file('image');

        if ($get_image) {
            if (empty($movie->image)) {
                unlink('uploads/movie/' . $movie->iamge);
            }
            //lấy tên vd: hinh1.jpg
            $get_name_image = $get_image->getClientOriginalName();
            //tách tên thành chuỗi (.) vd : hinh1[0] (.) jpg[1]
            $name_image = current(explode('.', $get_name_image));
            //thêm đuôi các số, tránh trường hợp bị trùng lặp -> nối lại(.)
            $new_image = $name_image . rand(0, 9999) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move('uploads/movie/', $new_image);
            $movie->image = $new_image;
        }
        $movie->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $movie = Movie::find($id);
        if(empty($movie->image)){
            unlink('uploads/movie/'.$movie->iamge);
        }
        $movie->delete();
        return redirect()->back();
        
    }
}
