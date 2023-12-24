@extends('layouts.app')
@section('content')
@extends('layouts.navbar')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div>
                </div>
                <div class="card-header">Quốc gia</div>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    @if(!isset($country))
                    {!! Form::open(['route' => 'country.store', 'method' =>'post']) !!}
                    @else
                    {!! Form::open(['route' => ['country.update',$country->id],'method' =>'PUT']) !!}
                    @endif
                    <div class="form-group ">
                        {!! Form::label('title', 'Title', []) !!}
                        {!! Form::text('title', isset($country) ? $country->title : '', ['class'=> 'form-control', 'placeholder' => 'Nhập tiêu đề','id' => 'slug','onkeyup' => 'ChangeToSlug()']) !!}
                    </div>
                    <div class="form-group ">
                        {!! Form::label('slug', 'Slug', []) !!}
                        {!! Form::text('slug', isset($country) ? $country->slug : '', ['class'=> 'form-control', 'placeholder' => 'Nhập tiêu đề','id' => 'convert_slug']) !!}
                    </div>
                    <div class="form-group ">
                        {!! Form::label('description', 'Description', []) !!}
                        {!! Form::textarea('description', isset($country) ? $country->description : '', ['style'=> 'resize:none','class'=> 'form-control', 'placeholder' => 'Nhập thêm dữ liệu', 'id' => 'description']) !!}
                    </div>
                    <div class="form-group ">
                        {!! Form::label('active', 'Active', []) !!}
                        {!! Form::select('status', ['1'=> "Hiển thị", '0' => 'Không hiển thị'], isset($country) ? $country->status :'', ['class'=> 'form-control']) !!}
                    </div>
                    @if(!isset($country))
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
                        <th scope="col">Description</th>
                        <th scope="col">slug</th>
                        <th scope="col">Status</th>
                        <th scope="col">Manage</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($list as $key => $cate)

                    <tr>
                        <th scope="row">{{$cate -> id}}</th>
                        <td>{{$cate->title}}</td>
                        <td>{{$cate->description}}</td>
                        <td>{{$cate->slug}}</td>
                        <td>
                            @if ($cate->status)
                            Hiển thị
                            @else
                            Không hiển thị
                            @endif
                        </td>
                        <td>
                            {!! Form::open([
                            'method' => 'delete',
                            'route' => ['country.destroy',$cate-> id],
                            'onsubmit' => 'return confirm("Xoá hay không?")'
                            ]) !!}
                            {!! Form::submit('Xoá', ['class' => 'btn btn-danger']) !!}

                            {!! Form::close() !!}
                            <a href="{{route('country.edit',$cate-> id)}}" class="btn btn-warning">Sửa</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection