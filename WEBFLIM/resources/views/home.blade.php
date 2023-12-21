@extends('layouts.app')
@section('content')
@extends('layouts.navbar')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div>
                </div>
                <div class="card-header">Quản lí Admin</div>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    Wellcome to admin
                </div>
            </div>
        </div>
    </div>

</div>
@endsection