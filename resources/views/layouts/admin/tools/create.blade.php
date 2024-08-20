@extends('layouts/contentNavbarLayout')

@section('title', 'EMD')

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}">
@endsection

@section('vendor-script')
    <script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>
@endsection

@section('page-script')
    <script src="{{ asset('assets/js/dashboards-analytics.js') }}"></script>
@endsection

@section('content')
    <section class="tools-create">
        <div class="container">
            <div class="white-bg">
                <div class="add-tool-wrapper">
                    <div class="add-tools">
                        <div class="add-tool-heading">
                            <h3>Add Tools</h3>
                        </div>
                        <div class="add-tools-form-body">
                            <form>
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="mb-3">
                                            <label for="toolName" class="form-label">Tool Name</label>
                                            <input type="text" class="form-control" id="toolName"
                                                placeholder="Tool Name">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="mb-3">
                                            <label for="toolSlug" class="form-label">Tool Slug</label>
                                            <input type="text" class="form-control" id="toolSlug"
                                                placeholder="Tool Slug">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-3 form-check">
                                            <input type="checkbox" class="form-check-input" id="isHome">
                                            <label class="form-check-label" for="isHome">is it Home?</label>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="mb-3">
                                            <label for="metaTitle" class="form-label">Meta Title</label>
                                            <input type="text" class="form-control" id="metaTitle"
                                                placeholder="Meta Title">
                                            <div class="form-text">
                                                <span class="char-count">(Characters: <span class="char-count-num">0</span>)</span>
                                                <span class="word-count">(Words: <span class="word-count-num">0</span>)</span>
                                                <span class="space-count">(Extra Spaces: <span class="char-extraspaces-num">0</span>)</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="mb-3">
                                            <label for="metaDescription" class="form-label">Meta Description</label>
                                            <textarea name="meta-description" class="form-control" id="metaDescription" placeholder="Meta Description"></textarea>
                                            <div class="form-text">
                                              <span class="char-count">(Characters: <span class="desc-char-count-num">0</span>)</span>
                                              <span class="word-count">(Words: <span class="desc-word-count-num">0</span>)</span>
                                              <span class="space-count">(Extra Spaces: <span class="desc-char-extraspaces-num">0</span>)</span>
                                          </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="mb-3">
                                            <label for="language" class="form-label">Language</label>
                                            <select class="form-select" aria-label="Languages">
                                              <option selected>Languages</option>

                                              @dd($languagesData)


                                              <option value="1">One</option>
                                              <option value="2">Two</option>
                                              <option value="3">Three</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Create</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
