@extends('admin.layouts.master')
@section('title')
   {{--  @lang('translation.basic-elements') --}}
  locations
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
           
        <a href="{{ route('admin.location.index') }}"> locations </a>
        @endslot
        @slot('title')
            Edit
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Edit location </h4>
                    <div class="flex-shrink-0">
                       
                    </div>
                </div><!-- end card header -->
                <div class="card-body">
                    <div class="live-preview">
                        @include('admin.includes.alerts')
                        <form action="{{ route('admin.location.edit',$data->id) }}" method="post" >
                            @csrf
                           <div class="row gy-4">
                                
                                <div class="col-xxl-3 col-md-12">
                                    <div>
                                        <label for="basiInput" class="form-label">Location Name</label>
                                        <input type="text" name="name" class="form-control" id="basiInput" value="{{$data->name}}">

                                    </div>
                                </div>



                                <!--end col-->
                                <div class="col-12">
                                    <button class="btn btn-primary" type="submit">Submit </button>
                                </div>
                                <!--end col-->
                            </div>
                        </form>
                        <!--end row-->
                    </div>
                </div>
            </div>
        </div>
        <!--end col-->
    </div>
    <!--end row-->
@endsection
@section('script')
    <script src="{{ URL::asset('/assets/libs/prismjs/prismjs.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
@endsection
