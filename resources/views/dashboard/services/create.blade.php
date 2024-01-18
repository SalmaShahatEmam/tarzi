@extends('dashboard.layouts.app')

@section('title', __('models.add_n_service'))

@section('content')
<!-- BEGIN: Content-->
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('rafaorders.index') }}">{{ __('models.orders') }}</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">{{ __('models.add_n_service') }}</a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- Basic Vertical form layout section start -->
            <section id="basic-vertical-layouts">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h2 class="card-title">{{ __('models.add_n_service') }}</h2>
                            </div>
                            <div class="card-body">
                                <form class="form form-vertical" id="createserviceForm" action="{{ route('rafaorders.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">

                                        <!--     <div class="col-12">
                                                <div class="form-group">
                                                    <label for="formFile"
                                                        class="form-label">{{ __('models.image') }}</label>
                                                    <input class="form-control image" accept="image/png, image/jpeg"
                                                        type="file" id="formFile" name="image">
                                                    @error('image')
                                                        <span class="alert alert-danger">
                                                            <small class="errorTxt">{{ $message }}</small>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group prev">
                                                    <img src="" style="width: 100px"
                                                        class="img-thumbnail preview-formFile" alt="">
                                                </div>
                                            </div> -->

                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="name">{{ __('models.User Name') }}</label>
                                                <input type="text" id="name" class="form-control" name="name" value="{{ old('name') }}" />
                                                @error('name')
                                                <span class="alert alert-danger">
                                                    <small class="errorTxt">{{ $message }}</small>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="phone">{{ __('models.phone') }}</label>
                                                <input type="text" id="phone" class="form-control" name="phone" value="{{ old('phone') }}" />
                                                @error('phone')
                                                <span class="alert alert-danger">
                                                    <small class="errorTxt">{{ $message }}</small>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="date">{{ __('models.date') }}</label>
                                                <input type="date" id="date" class="form-control" name="date" value="{{ old('date') }}" />
                                                @error('date')
                                                <span class="alert alert-danger">
                                                    <small class="errorTxt">{{ $message }}</small>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12">
                                       
                                            <div class="form-group">
                                                <label class="form-label" for="details"> {{ __('models.details') }}</label>
                                                <div class="row my-2">
                                                    <div class="col-md-8">
                                                        <input type="text" name="details[]" id="details" class="form-control"  required>
                                                    </div>
                                                    <div class="col-md-2">

                                                        <input type="text" name="price[]" id="price" class="form-control" placeholder="{{__('price')}}" required>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <a class="btn btn-danger remove-btn">
                                                            <i class="fa-solid fa-trash"></i>
                                                        </a>
                                                    </div>
                                                </div>

                                                <div class="">
                                                    @if ($errors->has('title'))
                                                    <span class="help-block">
                                                        <strong style="color: red;">{{ $errors->first('title') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <a class="btn btn-primary add-btn">
                                                    <i data-feather='plus'></i>
                                                </a>
                                            </div>
                                           
                                        </div>






                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary mr-1">{{ __('models.save') }}</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Basic Vertical form layout section end -->
        </div>
    </div>
</div>
<!-- END: Content-->

@push('js')
<script src="{{ asset('dashboard/assets/js/custom/validation/serviceForm.js') }}"></script>
<script src="{{ asset('dashboard/app-assets/js/custom/preview-image.js') }}"></script>
<script>
    $(document).on('click', '.remove-btn', function(e) {
        e.preventDefault();
        $(this).closest('.row').remove();
    });

    $('.add-btn').click(function(e) {
        e.preventDefault();
        var content = ` <div class="row my-2">
                                                    <div class="col-md-8">
                                                        <input type="text" name="details[]" id="details" class="form-control"  required>
                                                    </div>
                                                    <div class="col-md-2">

                                                        <input type="text" name="price[]" id="price" class="form-control" placeholder="{{__('price')}}" required>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <a class="btn btn-danger remove-btn">
                                                            <i class="fa-solid fa-trash"></i>
                                                        </a>
                                                    </div>
                                                </div>`;
        $(this).parent().prepend(content);
    });
</script>
@endpush
@endsection