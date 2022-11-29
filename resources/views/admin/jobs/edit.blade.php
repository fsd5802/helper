@extends('admin.components.form')
{{-- Preparing page properties --}}
@section('module_name', trans('admin.header.jobs'))
@section('index_route', getRoute('jobs.index'))
@section('store_route', getRoute('jobs.update', $job))
@section('page_type', trans('general.edit'))
@section('form_type', 'POST')
@section('title') @lang('admin.header.jobs') @endsection

{{-- Fields --}}
@section('fields_content')
    @method('put')
    <div class="card card-custom">
        <div class="card-header card-header-tabs-line">
            <div class="card-title">
                <h3 class="card-label">@lang('general.locales')</h3>
            </div>
            <div class="card-toolbar">
                <ul class="nav nav-tabs nav-bold nav-tabs-line">
                    @foreach (config('translatable.locales') as $key => $locale)
                        <li class="nav-item">
                            <a class="nav-link  @if ($key == 0) active @endif" data-toggle="tab"
                                href="{{ '#' . $locale }}">@lang('general.'.$locale)</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="card-body">
            <div class="tab-content">

                @foreach (config('translatable.locales') as $key => $locale)
                    <div class="tab-pane fade show @if ($key == 0) active @endif" id="{{ $locale }}" role="tabpanel">
                        <div class="col form-group">
                            <label>@lang('slider.name') (@lang('general.'.$locale))<span
                                    class="text-danger">*</span></label>
                            <input type="text" name="{{ $locale . '[name]' }}" id="{{ $locale . '[name]' }}"
                                placeholder="@lang('slider.name')" class="form-control @error(" $locale.name") is-invalid
                            @enderror" value="{{ old($locale . '.name', $job->translate($locale)->name) }}">
                            @error("$locale.name")
                            <div class="alert my-2 alert-danger">{{ $message }}</div>
                           @enderror
                    </div>



                    <div class="col form-group">
                        <label>@lang('slider.desc') (@lang('general.'.$locale))<span
                                class="text-danger">*</span></label>
                        <textarea name="{{ $locale . '[desc]' }}" placeholder="@lang('slider.desc')"
                        class="form-control @error(" $locale.desc") is-invalid @enderror"  id="{{ $locale }}.editor1">
                    {{ old($locale . '.desc', strip_tags($job->translate($locale)->desc)) }}
                </textarea>
                <script>
                    CKEDITOR.replace('{{ $locale }}.editor1', {
                        extraPlugins: 'bidi',
                        // Setting default language direction to right-to-left.
                        contentsLangDirection: 'rtl',
                        height: 270,
                        scayt_customerId: '1:Eebp63-lWHbt2-ASpHy4-AYUpy2-fo3mk4-sKrza1-NsuXy4-I1XZC2-0u2F54-aqYWd1-l3Qf14-umd',
                        scayt_sLang: 'auto',
                        removeButtons: 'PasteFromWord'
                    });
                </script>
                @error("$locale.desc")
                 <div class="alert my-2 alert-danger">{{ $message }}</div>
                @enderror
                </div>
            </div>


        @endforeach


    </div>




    <div class="col form-group">
        @if (isset($job->image))
            <label>@lang('slider.image') <span class="text-danger">*</span></label>
            <br>
            <img src="{{ asset($job->image) }}" class="w-25">
        @endif
    </div>
    <div class="col form-group">
        <label>@lang('slider.image') <span class="text-danger">*</span></label>
        <input type="file" name="image" placeholder="@lang('slider.image')" class="form-control" value="">
        @error("image")
        <div class="alert my-2 alert-danger">{{ $message }}</div>
       @enderror
    </div>
</div>

</div>
<div class="card card-custom">
<div class="card-footer text-center">
    <button type="submit" class="btn btn-light-success active">
        <i class="far fa-save fa-sm"></i>
        @lang('general.save')
    </button>
</div>
</div>
@endsection
