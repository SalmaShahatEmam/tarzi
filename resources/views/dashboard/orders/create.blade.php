@extends('dashboard.layouts.app')

@section('title', __('models.add_n_order'))

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
                                    <li class="breadcrumb-item"><a
                                            href="{{ route('rafaorders.index') }}">{{ __('models.orders') }}</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">{{ __('models.add_n_order') }}</a>
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
                                    <h2 class="card-title">{{ __('models.add_n_order') }}</h2>
                                </div>
                                <div class="card-body">
                                    <form class="form form-vertical" id="createserviceForm"
                                        action="{{ route('rafaorders.store') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">

                                            <div class="col-10">
                                                <div class="form-group">
                                                    <label for="client_id">{{ __('models.clients') }}</label>
                                                    <select class="form-control" name="client_id" id="client_id">
                                                        <option value="">اختر</option>
                                                        @foreach ($clients as $client)
                                                            <option value="{{ $client->id }}">{{ $client->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('client_id')
                                                        <span class="alert alert-danger">
                                                            <small class="errorTxt">{{ $message }}</small>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-2">
                                                <a href="" class="form-control btn btn-primary mt-2">اضافة عميل
                                                    جديد</a>
                                            </div>

                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="order_type">{{ __('models.order_type') }}</label>
                                                    <select class="form-control" name="order_type" id="order_type">
                                                        <option value="">اختر</option>
                                                        <option value="rafa">{{ __('models.rafa') }}</option>
                                                        <option value="print">{{ __('models.print') }}</option>
                                                    </select>
                                                    @error('order_type')
                                                        <span class="alert alert-danger">
                                                            <small class="errorTxt">{{ $message }}</small>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="delivery_date">{{ __('models.delivery_date') }}</label>
                                                    <input type="date" id="delivery_date" class="form-control"
                                                        name="delivery_date" value="{{ old('delivery_date') }}" />
                                                    @error('delivery_date')
                                                        <span class="alert alert-danger">
                                                            <small class="errorTxt">{{ $message }}</small>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-12">

                                                <div class="form-group">
                                                    <label class="form-label" for="details">
                                                        {{ __('models.details') }}</label>
                                                    <div class="form-group">
                                                        <a class="btn btn-primary add-btn">
                                                            <i data-feather='plus'></i>
                                                        </a>
                                                    </div>
                                                    <div class="row my-2">
                                                        <div class="col-md-8">
                                                            <input type="text" name="details[]" id="details"
                                                                class="form-control"
                                                                placeholder="{{ __('models.details') }}" required>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <input type="number" min="1" name="price[]"
                                                                id="price" class="form-control"
                                                                placeholder="{{ __('models.price') }}" required>
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
                                                                <strong
                                                                    style="color: red;">{{ $errors->first('title') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>


                                            </div>






                                            <div class="col-12">
                                                <button type="submit"
                                                    class="btn btn-primary mr-1">{{ __('models.save') }}</button>
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

                                        <input type="number" min="1" name="price[]" id="price" class="form-control" placeholder="{{ __('models.price') }}" required>
                                    </div>
                                    <div class="col-md-2">
                                        <a class="btn btn-danger remove-btn">
                                            <i class="fa-solid fa-trash"></i>
                                        </a>
                                    </div>
                                </div>`;
                $(this).parent().append(content);
            });
        </script>
    @endpush
@endsection
