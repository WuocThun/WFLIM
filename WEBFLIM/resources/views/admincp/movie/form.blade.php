@extends('layouts.app')
@section('content')
@extends('layouts.navbar')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div>
                </div>
                <div class="card-header">Quản lí Phim</div>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    @if(!isset($movie))
                    {!! Form::open(['route' => 'movie.store', 'method' =>'post','enctype'=> 'multipart/form-data']) !!}
                    @else
                    {!! Form::open(['route' => ['movie.update',$movie->id],'method' =>'PUT','enctype'=> 'multipart/form-data']) !!}
                    @endif
                    <div class="form-group ">
                        {!! Form::label('title', 'Title', []) !!}
                        {!! Form::text('title', isset($movie) ? $movie->title : '', ['class'=> 'form-control', 'placeholder' => 'Nhập tiêu đề','id' => 'slug','onkeyup' => 'ChangeToSlug()']) !!}
                    </div>
                    <div class="form-group ">
                        {!! Form::label('slug', 'Slug', []) !!}
                        {!! Form::text('slug', isset($movie) ? $movie->slug : '', ['class'=> 'form-control', 'placeholder' => 'Nhập tiêu đề','id' => 'convert_slug']) !!}
                    </div>
                    <div class="form-group ">
                        {!! Form::label('description', 'Description', []) !!}
                        {!! Form::textarea('description', isset($movie) ? $movie->description : '', ['style'=> 'resize:none','class'=> 'form-control', 'placeholder' => 'Nhập thêm dữ liệu', 'id' => 'description']) !!}
                    </div>
                    <div class="form-group ">
                        {!! Form::label('active', 'Active', []) !!}
                        {!! Form::select('status',['1'=> "Hiển thị", '0' => 'Không hiển thị'] , isset($movie) ? $movie->status :'', ['class'=> 'form-control']) !!}
                    </div>
                    <div class="form-group ">
                        {!! Form::label('category', 'Category', []) !!}
                        {!! Form::select('category_id',$category , isset($movie) ? $movie->category_id :'', ['class'=> 'form-control']) !!}
                    </div>
                    <div class="form-group ">
                        {!! Form::label('country', 'Country', []) !!}
                        {!! Form::select('country_id', $country, isset($movie) ? $movie->country_id :'', ['class'=> 'form-control']) !!}
                    </div>
                    <div class="form-group ">
                        {!! Form::label('genre', 'genre', []) !!}
                        {!! Form::select('genre_id',$genre , isset($movie) ? $movie->genre_id :'', ['class'=> 'form-control']) !!}
                    </div>
                    <div class="form-group ">
                        {!! Form::label('Image', 'Image', []) !!}
                        {!! Form::file('image', ['class'=> 'form-control-file']) !!}
                        @if($movie)
                        <img width="20%" src="{{asset('uploads/movie/'.$movie->image)}}" alt="">
                        @endif
                    </div>
                    @if(!isset($movie))
                    {!! Form::submit('Thêm dữ liệu', ['class'=> 'btb btn-success']) !!}
                    @else
                    {!! Form::submit('Cập nhật', ['class'=> 'btb btn-success']) !!}
                    @endif
                    {!! Form::close() !!}

                </div>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Image</th>
                        <th scope="col">Description</th>
                        <th scope="col">slug</th>
                        <th scope="col">Status</th>

                        <th scope="col">category</th>
                        <th scope="col">genre</th>
                        <th scope="col">Country</th>
                        <th scope="col">Manage</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($list as $key => $cate)

                    <tr>
                        <th scope="row">{{$cate -> id}}</th>
                        <td>{{$cate->title}}</td>
                        <td><img width="70%" src="{{asset('uploads/movie/'.$cate->image)}}" alt=""></td>
                        <td>{{$cate->description}}</td>
                        <td>{{$cate->slug}}</td>
                        <td>
                            @if ($cate->status)
                            Hiển thị
                            @else
                            Không hiển thị
                            @endif
                        </td>
                        <td>{{$cate->category->title}}</td>
                        <td>{{$cate->genre->title}}</td>
                        <td>{{$cate->country->title}}</td>
                        <td>
                            {!! Form::open([
                            'method' => 'delete',
                            'route' => ['movie.destroy',$cate-> id],
                            'onsubmit' => 'return confirm("Xoá hay không?")'
                            ]) !!}
                            {!! Form::submit('Xoá', ['class' => 'btn btn-danger']) !!}

                            {!! Form::close() !!}
                            <a href="{{route('movie.edit',$cate-> id)}}" class="btn btn-warning">Sửa</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection