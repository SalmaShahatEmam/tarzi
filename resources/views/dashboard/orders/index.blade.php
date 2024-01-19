@extends('dashboard.layouts.app')

@section('title', __('models.orders'))

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
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
                    <div class="form-group breadcrumb-right">
                        <div class="dropdown">
                            <a href="{{ route('rafaorders.create') }}"
                                class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle" type="button"
                                aria-haspopup="true" aria-expanded="false">
                                {{ __('models.add_n_order') }}</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- Basic table -->
            <section id="basic-datatable">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <table class="datatables-basic table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>{{ __('models.name') }}</th>
                                        <th>{{ __('models.phone') }}</th>
                                        <th>{{ __('models.details') }}</th>
                                        <th>{{ __('models.price') }}</th>
                                        <th>{{ __('models.order_type') }}</th>
                                        <th>{{ __('models.delivery_date') }}</th>
                                        <th>{{ __('models.finished') }}</th>
                                        <th>{{ __('models.actions') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $order)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $order->client->name }}</td>
                                            <td>{{ $order->client->phone }}</td>
                                            <td>
                                                @foreach (json_decode($order->details) as $details => $price)
                                                    <p>{{ "$details : $price" }}</p>
                                                @endforeach
                                            </td>
                                            <td>{{ $order->total_price }}</td>
                                            <td>{{ __("models.$order->order_type") }}</td>
                                            <td>{{ $order->delivery_date->format('Y-m-d') }}</td>
                                            <td>
                                                @if ($order->finish)
                                                    <span class="badge badge-success">{{ __('models.yes') }}</span>
                                                @else
                                                    <span class="badge badge-danger">{{ __('models.no') }}</span>
                                                @endif
                                            </td>

                                            <td class="text-center">
                                                <div class="btn-group" role="group" aria-label="Second group">
                                                    <a href="{{ route('rafaorders.edit', $order->id) }}"
                                                        class="btn btn-sm btn-primary"><i
                                                            class="fa-solid fa-pen-to-square"></i></a>
                                                    <a href="{{ route('rafaorders.destroy', $order->id) }}"
                                                        data-id="{{ $order->id }}"
                                                        class="btn btn-sm btn-danger item-delete"><i
                                                            class="fa-solid fa-trash-can"></i></a>

                                                    @if (!$order->finish)
                                                        <a href="{{ route('finish', $order->id) }}"
                                                            class="btn btn-sm btn-warning">{{ __('models.finished') }}</a>
                                                    @endif

                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
            <!--/ Basic table -->
        </div>
    </div>
    </div>
    <!-- END: Content-->
    @push('js')
        <script src="{{ asset('dashboard/app-assets/js/custom/custom-delete.js') }}"></script>
    @endpush
@endsection
