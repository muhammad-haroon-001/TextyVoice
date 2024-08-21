@extends('layouts/contentNavbarLayout')

@section('title', 'Create')

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
                            <h3>Add Tools:</h3>
                        </div>
                        <div class="add-tools-form-body">
                            <form action="{{ route('Emd.tools.store') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <!-- Tool Name -->
                                    <div class="col-12 col-md-6">
                                        <div class="mb-3">
                                            <label for="toolName" class="form-label">Tool Name</label>
                                            <input type="text" name="name" class="form-control" id="toolName"
                                                placeholder="Tool Name">
                                        </div>
                                    </div>

                                    <!-- Tool Slug -->
                                    <div class="col-12 col-md-6">
                                        <div class="mb-3">
                                            <label for="toolSlug" class="form-label">Tool Slug</label>
                                            <input type="text" name="slug" class="form-control" id="toolSlug"
                                                placeholder="Tool Slug">
                                        </div>
                                    </div>

                                    <!-- Is it Home? -->
                                    <div class="col-12">
                                        <div class="mb-3 form-check">
                                            <input type="checkbox" value="1" name="is-home" class="form-check-input"
                                                id="isHome">
                                            <label class="form-check-label" for="isHome">Is it Home?</label>
                                        </div>
                                    </div>

                                    <!-- Meta Title -->
                                    <div class="col-12 col-md-6">
                                        <div class="mb-3">
                                            <label for="metaTitle" class="form-label">Meta Title</label>
                                            <input type="text" name="meta-title" class="form-control" id="metaTitle"
                                                placeholder="Meta Title">
                                            <div class="form-text">
                                                <span class="char-count">(Characters: <span
                                                        class="char-count-num">0</span>)</span>
                                                <span class="word-count">(Words: <span
                                                        class="word-count-num">0</span>)</span>
                                                <span class="space-count">(Extra Spaces: <span
                                                        class="char-extraspaces-num">0</span>)</span>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Meta Description -->
                                    <div class="col-12 col-md-6">
                                        <div class="mb-3">
                                            <label for="metaDescription" class="form-label">Meta Description</label>
                                            <textarea name="meta-description" class="form-control" id="metaDescription" placeholder="Meta Description"></textarea>
                                            <div class="form-text">
                                                <span class="char-count">(Characters: <span
                                                        class="desc-char-count-num">0</span>)</span>
                                                <span class="word-count">(Words: <span
                                                        class="desc-word-count-num">0</span>)</span>
                                                <span class="space-count">(Extra Spaces: <span
                                                        class="desc-char-extraspaces-num">0</span>)</span>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Language -->
                                    <div class="col-12 col-md-6">
                                        <div class="mb-3">
                                            <label for="language" class="form-label">Language</label>
                                            <select class="form-select" name="tool-lang" aria-label="Languages" required>
                                                <option disabled selected>Languages</option>
                                                @foreach ($languageData['languages'] as $lang)
                                                    <option value="{{ $lang['code'] }}">{{ $lang['name'] }}
                                                        ({{ $lang['code'] }})</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Parent Tool -->
                                    <div class="col-12 col-md-6">
                                        <div class="mb-3">
                                            <label for="parentTool" class="form-label">Parent Tool</label>
                                            <select class="form-select js-tool-parent" name="tool-parent"
                                                aria-label="Parent Tool" required>
                                                <option selected value="0">Parent Tool</option>
                                                @foreach ($tools as $tool)
                                                    <option value="{{ $tool->id }}">{{ $tool->tool_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Tool Content -->
                                    <span class="js-span-toggle-content">
                                        <div class="col-12">
                                            <div class="my-5">
                                                <h3>Tool Content:</h3>
                                            </div>
                                        </div>

                                        <div class="tool-content">
                                            <div class="row" id="row1">
                                                <div class="col-md-3 mb-3">
                                                    <input type="text" name="contentKey[]" class="form-control"
                                                        placeholder="Key">
                                                </div>
                                                <div class="col-md-7 mb-3">
                                                    <input type="text" name="contentValue[]" class="form-control"
                                                        placeholder="Value">
                                                </div>
                                                <div class="col-md-2 mb-3">
                                                    <input type="hidden" name="contentType[]"
                                                        class="form-control contentType" value="inputField">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <select name="add_more_type" id="add_more_type" class="form-select">
                                                    <option selected disabled>Select Input Type</option>
                                                    <option value="inputField">Input Fields</option>
                                                    <option value="textarea">Text Area</option>
                                                    <option value="richText">Rich Text Editor</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <a href="#" class="btn btn-primary waves-effect waves-light"
                                                    id="addMore">Add Row</a>
                                            </div>
                                        </div>
                                    </span>
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
