@extends('site.layouts.app')

@title($job->name)

@description(isset($job->desc) ? Str::limit($job->desc, 160) : Str::limit($job->desc, 160))

@image(asset('storage/' . getSetting('logo')))

@section('title', $job->name)

@section('content')
    <section class="jops-details">
        <div class="main-container">
            <div class="title-center">
                <span></span>
                <h2> {{ $job->name }} </h2>
                <span></span>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="text-sub-jops-details" data-aos="fade-left" data-aos-easing="linear" data-aos-duration="800">

                        {!! $job->desc !!}
                    </div>
                </div>
            </div>


            <div class="btn-jops-details">
                <a href="{{ route('site.jobs.apply', $job->id) }}" class="ctm-btn"> {{ __('models.apply_job') }} </a>
            </div>
        </div>
    </section>

    @push('js')
        <script src="{{ asset('js/share.js') }}"></script>
    @endpush
@endsection
