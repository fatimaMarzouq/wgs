@extends('layouts.app')

@section('content')
    <!doctype html>
    <html class="no-js" lang="en">

    <meta http-equiv="content-type" content="text/html;charset=utf-8" />

    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title> Niche </title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('resources/css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('resources/css/custom-style.css') }}">
        <script src="{{ asset('resources/js/custom-js.js') }}"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
            integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>

    <body>
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert" onclick="location.reload();">×</button>
                <strong>{{ $message }}</strong>
            </div>
        @endif

        @if ($message = Session::get('error'))
            <div class="alert alert-danger alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
        @endif

        @if ($message = Session::get('warning'))
            <div class="alert alert-warning alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
        @endif

        @if ($message = Session::get('info'))
            <div class="alert alert-info alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert">×</button>
                Please check the form below for errors
            </div>
        @endif
        <!--  <section class="logo-sec m-0" >
                  <div class="logo-div">
                    <a href=""><img src="{{ asset('resources/images/niche-logo-official.png') }}" align="Niche"></a>
                  </div>
                </section> -->

        <section class="heading-sec m-0 p-0">
            <div class="main-head-div p-0">
                <h1>DATA CAPTURE FORM-WG&S</h1>
            </div>
        </section>
        <form class="form-horizontal" id="form_customer" onsubmit="return validation(this)"
            action="{{ route('captureStore') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <section class="filter-sec m-0">
                <div class="container p-lg-0">
                    <div class="row align-items-center">
                        <div class="col-lg-12 col-md-12 col-12">
                            <div class="row g-3">
                                <div class="col-lg-3 col-md-3 col-12">
                                    <b>Store Code:</b>
                                    <div class="dropdown">
                                        <button onclick="dropdownFunction()" class="dropbtn">Choose Store Code</button>
                                        <div id="storeDropdown" class="dropdown-content">
                                            <input type="text" placeholder="Search.." id="searchInput"
                                                onkeyup="filterFunction()">
                                            @foreach ($codes as $code)
                                                <a>{{ $code->AccountNumbeAuto }}</a>
                                            @endforeach
                                        </div>
                                    </div>

                                </div>
                                <div class="col-lg-3 col-md-3 col-12">
                                    <b>Area:</b><select id="area" name="area" class="form-select">
                                        <option value="">Choose Area</option>

                                    </select>
                                </div>
                                <div class="col-lg-3 col-md-3 col-12">
                                    <b>Account:</b><select id="account" name="account" class="form-select">
                                        <option value="">Choose Account</option>

                                    </select>
                                </div>
                                <div class="col-lg-3 col-md-3 col-12">
                                    <b>Outlet:</b><select id="outlet" name="outlet" class="form-select">
                                        <option value="">Choose Outlet</option>

                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="image-sec">
                <div class="container p-lg-0">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-12">
                            <h6 class="text-center ph-head">Add Photo for Drink Menu</h6>
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-12">
                                        <div class="dropArea">
                                            <div class="dropForm">
                                                <input class="compress" type="file" name="gallery[]" multiple="">
                                                <label class="button" for="fileElem">
                                                    <img src="{{ asset('resources/images/gallery-icon.png') }}">
                                                    <p class="text-center">Gallery</p>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-12">
                            <h6 class="text-center ph-head">Add Photo for Back Bar</h6>
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-12">
                                        <div class="dropArea">
                                            <div class="dropForm">
                                                <input class="compress" type="file" name="gallery2[]" multiple="">
                                                <label class="button" for="fileElem">
                                                    <img src="{{ asset('resources/images/gallery-icon.png') }}">
                                                    <p class="text-center">Gallery</p>
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-12">
                            <h6 class="text-center ph-head">Add Photo for Entrance</h6>
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-12">
                                        <div class="dropArea">
                                            <div class="dropForm">
                                                <input class="compress" type="file" multiple="" name="gallery3[]">
                                                <label class="button" for="fileElem">
                                                    <img src="{{ asset('resources/images/gallery-icon.png') }}">
                                                    <p class="text-center">Gallery</p>
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="table-sec">
                <div class="container p-lg-0">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-12">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>

                                            <th class="col-2" scope="col">Discription</th>
                                            <th class="col-1" scope="col">Is It Available in the Outlet?</th>
                                            <th class="col-1" scope="col">Listed in Drinks Menu?</th>
                                            <th class="col-2" scope="col">Price (Per SIngle Shot)</th>
                                            <th class="col-1" scope="col">Visible at Back Bar(Yes or No)</th>
                                            <th class="col-1" scope="col">Remarks</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>

                                            <td>Glenfiddich 12-Year-Old<br>(Whiskey)</td>
                                            <input type="hidden" name="category[]" value="Whiskey">
                                            <input type="hidden" name="description[]" value="Glenfiddich 12-Year-Old">
                                            <td>
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-12 col-12">
                                                        <select id="inputState" name="outletAvailable[]"
                                                            class="form-select">
                                                            <option>Yes</option>
                                                            <option selected="">No</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-12 col-12">
                                                        <select id="inputState" name="drinksMenu[]" class="form-select">
                                                            <option>Yes</option>
                                                            <option selected="">No</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="row g-3">
                                                    <div class="col-lg-12 col-md-12 col-12">
                                                        <input type="number" min="0" step="0.1"
                                                            name="price[]" class="form-control" id="inputType"
                                                            placeholder="Type Here">
                                                        <small class="req-price text-danger d-none">The price is
                                                            required</small>
                                                    </div>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="row g-3">
                                                    <div class="col-lg-12 col-md-12 col-12">
                                                        <select id="inputState" name="visibleBar[]" class="form-select">
                                                            <option>Yes</option>
                                                            <option selected="">No</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="row g-3">
                                                    <div class="col-lg-12 col-md-12 col-12">
                                                        <input type="text" class="form-control" id="inputType"
                                                            placeholder="Type Here" name="desc_remarks[]">
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>

                                            <td>Glenfiddich 15-Year-Old<br>(Whiskey)</td>
                                            <input type="hidden" name="category[]" value="Whiskey">
                                            <input type="hidden" name="description[]" value="Glenfiddich 15-Year-Old">
                                            <td>
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-12 col-12">
                                                        <select id="inputState" name="outletAvailable[]"
                                                            class="form-select">
                                                            <option>Yes</option>
                                                            <option selected="">No</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-12 col-12">
                                                        <select id="inputState" name="drinksMenu[]" class="form-select">
                                                            <option>Yes</option>
                                                            <option selected="">No</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="row g-3">
                                                    <div class="col-lg-12 col-md-12 col-12">
                                                        <input type="number" min="0" step="0.1"
                                                            name="price[]" class="form-control" id="inputType"
                                                            placeholder="Type Here">
                                                        <small class="req-price text-danger d-none">The price is
                                                            required</small>
                                                    </div>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="row g-3">
                                                    <div class="col-lg-12 col-md-12 col-12">
                                                        <select id="inputState" name="visibleBar[]" class="form-select">
                                                            <option>Yes</option>
                                                            <option selected="">No</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="row g-3">
                                                    <div class="col-lg-12 col-md-12 col-12">
                                                        <input type="text" class="form-control" id="inputType"
                                                            placeholder="Type Here" name="desc_remarks[]">
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>

                                            <td>Glenfiddich 18-Year-Old<br>(Whiskey)</td>
                                            <input type="hidden" name="category[]" value="Whiskey">
                                            <input type="hidden" name="description[]" value="Glenfiddich 18-Year-Old">
                                            <td>
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-12 col-12">
                                                        <select id="inputState" name="outletAvailable[]"
                                                            class="form-select">
                                                            <option>Yes</option>
                                                            <option selected="">No</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-12 col-12">
                                                        <select id="inputState" name="drinksMenu[]" class="form-select">
                                                            <option>Yes</option>
                                                            <option selected="">No</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="row g-3">
                                                    <div class="col-lg-12 col-md-12 col-12">
                                                        <input type="number" min="0" step="0.1"
                                                            name="price[]" class="form-control" id="inputType"
                                                            placeholder="Type Here">
                                                        <small class="req-price text-danger d-none">The price is
                                                            required</small>
                                                    </div>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="row g-3">
                                                    <div class="col-lg-12 col-md-12 col-12">
                                                        <select id="inputState" name="visibleBar[]" class="form-select">
                                                            <option>Yes</option>
                                                            <option selected="">No</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="row g-3">
                                                    <div class="col-lg-12 col-md-12 col-12">
                                                        <input type="text" class="form-control" id="inputType"
                                                            placeholder="Type Here" name="desc_remarks[]">
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>

                                            <td>Glenfiddich 21-Year-Old<br>(Whiskey)</td>
                                            <input type="hidden" name="category[]" value="Whiskey">
                                            <input type="hidden" name="description[]" value="Glenfiddich 21-Year-Old">
                                            <td>
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-12 col-12">
                                                        <select id="inputState" name="outletAvailable[]"
                                                            class="form-select">
                                                            <option>Yes</option>
                                                            <option selected="">No</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-12 col-12">
                                                        <select id="inputState" name="drinksMenu[]" class="form-select">
                                                            <option>Yes</option>
                                                            <option selected="">No</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="row g-3">
                                                    <div class="col-lg-12 col-md-12 col-12">
                                                        <input type="number" min="0" step="0.1"
                                                            name="price[]" class="form-control" id="inputType"
                                                            placeholder="Type Here">
                                                        <small class="req-price text-danger d-none">The price is
                                                            required</small>
                                                    </div>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="row g-3">
                                                    <div class="col-lg-12 col-md-12 col-12">
                                                        <select id="inputState" name="visibleBar[]" class="form-select">
                                                            <option>Yes</option>
                                                            <option selected="">No</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="row g-3">
                                                    <div class="col-lg-12 col-md-12 col-12">
                                                        <input type="text" class="form-control" id="inputType"
                                                            placeholder="Type Here" name="desc_remarks[]">
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>

                                            <td>Glenfiddich Grand Gru<br>(Whiskey)</td>
                                            <input type="hidden" name="category[]" value="Whiskey">
                                            <input type="hidden" name="description[]" value="Glenfiddich Grand Gru">
                                            <td>
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-12 col-12">
                                                        <select id="inputState" name="outletAvailable[]"
                                                            class="form-select">
                                                            <option>Yes</option>
                                                            <option selected="">No</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-12 col-12">
                                                        <select id="inputState" name="drinksMenu[]" class="form-select">
                                                            <option>Yes</option>
                                                            <option selected="">No</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="row g-3">
                                                    <div class="col-lg-12 col-md-12 col-12">
                                                        <input type="number" min="0" step="0.1"
                                                            name="price[]" class="form-control" id="inputType"
                                                            placeholder="Type Here">
                                                        <small class="req-price text-danger d-none">The price is
                                                            required</small>
                                                    </div>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="row g-3">
                                                    <div class="col-lg-12 col-md-12 col-12">
                                                        <select id="inputState" name="visibleBar[]" class="form-select">
                                                            <option>Yes</option>
                                                            <option selected="">No</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="row g-3">
                                                    <div class="col-lg-12 col-md-12 col-12">
                                                        <input type="text" class="form-control" id="inputType"
                                                            placeholder="Type Here" name="desc_remarks[]">
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>

                                            <td>Glenfiddich Grande Couronne<br>(Whiskey)</td>
                                            <input type="hidden" name="category[]" value="Whiskey">
                                            <input type="hidden" name="description[]"
                                                value="Glenfiddich Grande Couronne">
                                            <td>
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-12 col-12">
                                                        <select id="inputState" name="outletAvailable[]"
                                                            class="form-select">
                                                            <option>Yes</option>
                                                            <option selected="">No</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-12 col-12">
                                                        <select id="inputState" name="drinksMenu[]" class="form-select">
                                                            <option>Yes</option>
                                                            <option selected="">No</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="row g-3">
                                                    <div class="col-lg-12 col-md-12 col-12">
                                                        <input type="number" min="0" step="0.1"
                                                            name="price[]" class="form-control" id="inputType"
                                                            placeholder="Type Here">
                                                        <small class="req-price text-danger d-none">The price is
                                                            required</small>
                                                    </div>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="row g-3">
                                                    <div class="col-lg-12 col-md-12 col-12">
                                                        <select id="inputState" name="visibleBar[]" class="form-select">
                                                            <option>Yes</option>
                                                            <option selected="">No</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="row g-3">
                                                    <div class="col-lg-12 col-md-12 col-12">
                                                        <input type="text" class="form-control" id="inputType"
                                                            placeholder="Type Here" name="desc_remarks[]">
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>

                                            <td>Monkey Shoulder<br>(Whiskey)</td>
                                            <input type="hidden" name="category[]" value="Whiskey">
                                            <input type="hidden" name="description[]" value="Monkey Shoulder">
                                            <td>
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-12 col-12">
                                                        <select id="inputState" name="outletAvailable[]"
                                                            class="form-select">
                                                            <option>Yes</option>
                                                            <option selected="">No</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-12 col-12">
                                                        <select id="inputState" name="drinksMenu[]" class="form-select">
                                                            <option>Yes</option>
                                                            <option selected="">No</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="row g-3">
                                                    <div class="col-lg-12 col-md-12 col-12">
                                                        <input type="number" min="0" step="0.1"
                                                            name="price[]" class="form-control" id="inputType"
                                                            placeholder="Type Here">
                                                        <small class="req-price text-danger d-none">The price is
                                                            required</small>
                                                    </div>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="row g-3">
                                                    <div class="col-lg-12 col-md-12 col-12">
                                                        <select id="inputState" name="visibleBar[]" class="form-select">
                                                            <option>Yes</option>
                                                            <option selected="">No</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="row g-3">
                                                    <div class="col-lg-12 col-md-12 col-12">
                                                        <input type="text" class="form-control" id="inputType"
                                                            placeholder="Type Here" name="desc_remarks[]">
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>

                                            <td>Balvenie 12-year-old<br>(Whiskey)</td>
                                            <input type="hidden" name="category[]" value="Whiskey">
                                            <input type="hidden" name="description[]" value="Balvenie 12-year-old">
                                            <td>
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-12 col-12">
                                                        <select id="inputState" name="outletAvailable[]"
                                                            class="form-select">
                                                            <option>Yes</option>
                                                            <option selected="">No</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-12 col-12">
                                                        <select id="inputState" name="drinksMenu[]" class="form-select">
                                                            <option>Yes</option>
                                                            <option selected="">No</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="row g-3">
                                                    <div class="col-lg-12 col-md-12 col-12">
                                                        <input type="number" min="0" step="0.1"
                                                            name="price[]" class="form-control" id="inputType"
                                                            placeholder="Type Here">
                                                        <small class="req-price text-danger d-none">The price is
                                                            required</small>
                                                    </div>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="row g-3">
                                                    <div class="col-lg-12 col-md-12 col-12">
                                                        <select id="inputState" name="visibleBar[]" class="form-select">
                                                            <option>Yes</option>
                                                            <option selected="">No</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="row g-3">
                                                    <div class="col-lg-12 col-md-12 col-12">
                                                        <input type="text" class="form-control" id="inputType"
                                                            placeholder="Type Here" name="desc_remarks[]">
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>

                                            <td>Balvenie 14-year-old<br>(Whiskey)</td>
                                            <input type="hidden" name="category[]" value="Whiskey">
                                            <input type="hidden" name="description[]" value="Balvenie 14-year-old">
                                            <td>
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-12 col-12">
                                                        <select id="inputState" name="outletAvailable[]"
                                                            class="form-select">
                                                            <option>Yes</option>
                                                            <option selected="">No</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-12 col-12">
                                                        <select id="inputState" name="drinksMenu[]" class="form-select">
                                                            <option>Yes</option>
                                                            <option selected="">No</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="row g-3">
                                                    <div class="col-lg-12 col-md-12 col-12">
                                                        <input type="number" min="0" step="0.1"
                                                            name="price[]" class="form-control" id="inputType"
                                                            placeholder="Type Here">
                                                        <small class="req-price text-danger d-none">The price is
                                                            required</small>
                                                    </div>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="row g-3">
                                                    <div class="col-lg-12 col-md-12 col-12">
                                                        <select id="inputState" name="visibleBar[]" class="form-select">
                                                            <option>Yes</option>
                                                            <option selected="">No</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="row g-3">
                                                    <div class="col-lg-12 col-md-12 col-12">
                                                        <input type="text" class="form-control" id="inputType"
                                                            placeholder="Type Here" name="desc_remarks[]">
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>

                                            <td>Balvenie 21-year-old<br>(Whiskey)</td>
                                            <input type="hidden" name="category[]" value="Whiskey">
                                            <input type="hidden" name="description[]" value="Balvenie 21-year-old">
                                            <td>
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-12 col-12">
                                                        <select id="inputState" name="outletAvailable[]"
                                                            class="form-select">
                                                            <option>Yes</option>
                                                            <option selected="">No</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-12 col-12">
                                                        <select id="inputState" name="drinksMenu[]" class="form-select">
                                                            <option>Yes</option>
                                                            <option selected>No</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="row g-3">
                                                    <div class="col-lg-12 col-md-12 col-12">
                                                        <input type="number" min="0" step="0.1"
                                                            name="price[]" class="form-control" id="inputType"
                                                            placeholder="Type Here">
                                                        <small class="req-price text-danger d-none">The price is
                                                            required</small>
                                                    </div>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="row g-3">
                                                    <div class="col-lg-12 col-md-12 col-12">
                                                        <select id="inputState" name="visibleBar[]" class="form-select">
                                                            <option>Yes</option>
                                                            <option selected>No</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="row g-3">
                                                    <div class="col-lg-12 col-md-12 col-12">
                                                        <input type="text" class="form-control" id="inputType"
                                                            placeholder="Type Here" name="desc_remarks[]">
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>

                                            <td>Hendricks Original<br>(Gin)</td>
                                            <input type="hidden" name="category[]" value="Gin">
                                            <input type="hidden" name="description[]" value="Hendricks Original">
                                            <td>
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-12 col-12">
                                                        <select id="inputState" name="outletAvailable[]"
                                                            class="form-select">
                                                            <option>Yes</option>
                                                            <option selected="">No</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-12 col-12">
                                                        <select id="inputState" name="drinksMenu[]" class="form-select">
                                                            <option>Yes</option>
                                                            <option selected="">No</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="row g-3">
                                                    <div class="col-lg-12 col-md-12 col-12">
                                                        <input type="number" min="0" step="0.1"
                                                            name="price[]" class="form-control" id="inputType"
                                                            placeholder="Type Here">
                                                        <small class="req-price text-danger d-none">The price is
                                                            required</small>
                                                    </div>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="row g-3">
                                                    <div class="col-lg-12 col-md-12 col-12">
                                                        <select id="inputState" name="visibleBar[]" class="form-select">
                                                            <option>Yes</option>
                                                            <option selected="">No</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="row g-3">
                                                    <div class="col-lg-12 col-md-12 col-12">
                                                        <input type="text" class="form-control" id="inputType"
                                                            placeholder="Type Here" name="desc_remarks[]">
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="cucumber-sec ">
                <div class="container cust-border p-lg-0">
                    <div class="row ">
                        <div class="col-lg-10 col-md-9 col-9">
                            <p>If Hendricks Original listed, IS bar providing perfect serve for the brand-are they serving
                                it with a cucumber ?</p>
                        </div>
                        <div class="col-lg-2 col-md-3 col-3">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-12">
                                    <select id="inputState" name="perfectServe" class="form-select">
                                        <option>Yes</option>
                                        <option selected="">No</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


            <div class="row">
                <div class="col-lg-12 col-md-12 col-12 m-2">
                    <textarea style="width:95%" rows="4" name="remarks" placeholder="Type Your Remarks Here: "></textarea>
                    <input type="hidden" id="csrftoken" name="csrftoken" value="{{ csrf_token() }}">
                    <input type="hidden" id="userId" name="userId" value="{{ $userId }}">
                </div>
            </div>
            <div class="text-center">
                <button class="btn btn-danger" id="save" type="submit">SAVE</button>
                &emsp;<button class="btn btn-danger" type="button" onclick="location.reload();">CLEAR</button><br><br>
            </div>
        </form>
        <footer class="footer">
        </footer>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>
        <script src="{{ asset('resources/js/custom.js') }}"></script>
    </body>

    </html>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {

            $("#storeDropdown a").each(function() {
                $(this).click(function() {
                    let code = $(this).text();
                    $.ajax({
                        url: "<?php echo route('allDetails'); ?>",
                        method: 'POST',
                        data: {
                            "_token": $('#csrftoken').val(),
                            code: code
                        },
                        success: function(response) {
                            $('#account').children().remove().end()
                            $('#outlet').children().remove().end()
                            $('#area').children().remove().end()
                            var value = JSON.parse(response);
                            var ss = [];
                            for (var i = 0; i < value.length; i++) {
                                //alert(value[i]['id']);
                                $('#account').append('<option >' + value[i][
                                    'ParentAccount'
                                ] + '</option>');
                                $('#outlet').append('<option >' + value[i][
                                    'AccountName'
                                ] + '</option>');
                                $('#area').append('<option >' + value[i]['Area'] +
                                    '</option>');
                            }
                            $(".dropbtn").text(code);
                            $("#searchInput").val('');
                            $("#searchInput").keyup();

                            document.getElementById("storeDropdown").classList.toggle(
                                "show");
                        }
                    });

                })
            })

            $(".compress").change(function() {
                $("#form_customer").submit();
            });
            $("#form_customer").submit(function(e) {
                e.preventDefault();
                var formData = new FormData(this);

                $.ajax({
                    url: "<?php echo route('compress'); ?>",
                    method: 'POST',
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,

                    success: function(response) {


                    }

                });

            });

            $("#save").click(function(event) {
                $("#form_customer").unbind('submit');
            });
            $("input[name='price[]']").on("keypress keyup change", function() {
                $(this).parent().find(".req-price").addClass("d-none")
            });

        });

        function validation(e) {
            let flag = true;
            let outletAvailable = $(e).find("select[name='outletAvailable[]']");
            let prices = $(e).find("input[name='price[]']");
            let reqprice = $(e).find(".req-price");
            for (i = 0; i < prices.length; i++) {
                if ($(outletAvailable[i]).val() == "Yes" && $(prices[i]).val() == "") {
                    $(reqprice[i]).removeClass("d-none");
                    flag = false
                }
            }
            return flag;
        }
    </script>
@endsection
