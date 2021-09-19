@extends('layouts.app')

@section("title") Sample @endsection

@section('content')
    <x-bread-crumb>
        <li class="breadcrumb-item active" aria-current="page">Sample</li>
    </x-bread-crumb>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="mb-0">
                        <i class="feather-feather"></i>
                        Sample Page
                    </h4>
                    <hr>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum quasi at necessitatibus qui et ab aperiam odio nemo optio in nesciunt tempora itaque repellat, sit quisquam neque, magni adipisci mollitia?
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
