@extends('admin.layouts.master')
@section('title', 'Create Category')

@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            <a href="{{ route('admin.product-categories.index') }}">Product Categories</a>
        @endslot
        @slot('title')
            Create Category
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-lg-12">
            <div class="live-preview">
                <form action="{{ route('admin.product.store') }}" method="POST" enctype="multipart/form-data" id="geniusform1">
                    @csrf

                    @include('admin.includes.ajax-alerts')
                    @include('admin.products.listing.partials.inputs')

                      <div class="col-12 mb-4 ">
                                <button class="btn btn-primary submit-btn" type="submit">Submit form</button>
                            </div>
                </form>
            </div>
        </div>
    </div>
@endsection
