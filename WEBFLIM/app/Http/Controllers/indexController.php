<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Genre;
use App\Models\Country;
use App\Models\Movie;
use App\Models\Episode;
class indexController extends Controller
{
    public function home(){
        $category = Category::orderBy('id','desc')->where('status',1)->get();
        $genre = Genre::orderBy('id','desc')->get();
        $country = Country::orderBy('id','desc')->get();
        return view('pages.home',compact('category','genre','country'));
    }
    public function category($slug){
        $category = Category::orderBy('id', 'desc')->where('status', 1)->get();
        $genre = Genre::orderBy('id', 'desc')->get();
        $country = Country::orderBy('id', 'desc')->get();
        $cate_slug = Category::where('slug',$slug)->first();
        return view('pages.category', compact('category', 'genre', 'country','cate_slug'));
    }
    public function genre($slug){
        $category = Category::orderBy('id', 'desc')->where('status', 1)->get();
        $genre = Genre::orderBy('id', 'desc')->get();
        $country = Country::orderBy('id', 'desc')->get();
        $genre_slug = Genre::where('slug', $slug)->first();

        return view('pages.gerne', compact('category', 'genre', 'country','genre_slug'));
    }
    public function country($slug){
        $category = Category::orderBy('id', 'desc')->where('status', 1)->get();
        $genre = Genre::orderBy('id', 'desc')->get();
        $country = Country::orderBy('id', 'desc')->get();
        $country_slug = Country::where('slug', $slug)->first();

        return view('pages.country', compact('category', 'genre', 'country','country_slug'));
    }
    public function movie(){
        return view('pages.movie');
    }
    public function watch(){
        return view('pages.watch');
    }
    public function episode(){
        return view('pages.episode');
    }
}

