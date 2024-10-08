@extends('layouts/adminLayout')

@section('title', 'Tools')
@push('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}">
@endpush
@push('vendor-script')
    <script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>
@endpush

@section('content')
    <section class="tool-index">
        <div class="container">
            <div class="white-bg">
                <div class="update-tool-wrapper">
                    <div class="update-tool">
                        <div class="update-tool-heading">
                            <h3>Edit Tools:</h3>
                        </div>
                        <div class="add-tools-form-body">
                            <form action="{{ route('Emd.tools.update', $tool->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="mb-3">
                                            <label for="toolName" class="form-label">Tool Name <span class="text-danger fs-6 ms-1">*</span></label>
                                            <input type="text" name="name" value="{{ $tool->tool_name }}"
                                                class="form-control" id="toolName" placeholder="Tool Name">
                                                @error('name')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                        </div>
                                    </div>

                                    <!-- Tool Slug -->
                                    <div class="col-12 col-md-6">
                                        <div class="mb-3">
                                            <label for="toolSlug" class="form-label">Tool Slug</label>
                                            <input type="text" name="slug" value="{{ $tool->tool_slug }}"
                                                class="form-control bg-light" id="toolSlug" placeholder="Tool Slug" readonly>
                                            @error('name')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Meta Title -->
                                    <div class="col-12 col-md-6">
                                        <div class="mb-3">
                                            <label for="metaTitle" class="form-label">Meta Title</label>
                                            <input type="text" name="meta-title" value="{{ $tool->meta_title }}"
                                                class="form-control" id="metaTitle" placeholder="Meta Title">
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
                                            <textarea name="meta-description" value="{{ $tool->meta_description }}" class="form-control" id="metaDescription"
                                                placeholder="Meta Description">{{ $tool->meta_description }}</textarea>
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
                                            <input type="text" class="form-control bg-light" id="language" name="tool-lang"
                                                readonly value="{{ $tool->language }}">
                                        </div>
                                    </div>

                                    <!-- Parent Tool -->
                                    <div class="col-12 col-md-6">
                                        <div class="mb-3">
                                            <label for="parentTool" class="form-label">Parent Tool</label>
                                            <input type="text" readonly name="tool-parent"
                                                value="@if ($tool->parent_id != 0) {{ $tool->parent->tool_name }} @endif Parent Tool"
                                                class="form-control bg-light" id="parentTool" readonly>
                                        </div>
                                    </div>

                                    <!-- Tool Content -->
                                    <span class="js-span-toggle-content">
                                        <div class="col-12">
                                            <div class="my-5">
                                                @php
                                                    @$contentKeys = json_decode($tool->content_keys, true);
                                                    // count
                                                    // dd($contentKeys);
                                                    @$count = count($contentKeys);

                                                @endphp
                                                <h3>Content Keys: {{ $count > 0 ? $count : 0 }}</h3>
                                            </div>
                                        </div>

                                        <div class="tool-content ui_sortable" id="tool-content">
                                            @foreach ($contentKeys as $key => $content)
                                                <div class="row tool_content_row" data-id="summarizer">
                                                    <input type="hidden" name="contentType[]"
                                                        value="{{ $content['type'] }}" class="target_input_type">
                                                    <div class="col-md-2 mb-3">
                                                        <input type="text" name="contentKey[]" class="form-control"
                                                            placeholder="Key" value="{{ $key }}">
                                                    </div>
                                                    <div class="col-md-2 mb-3">
                                                        <select id="{{ $key }}-input-option"
                                                            data-target="{{ $key }}-input-option"
                                                            class="form-select js-input-type"
                                                            data-original-type="{{ $content['type'] }}">
                                                            <option value="inputField"
                                                                {{ $content['type'] === 'inputField' ? 'selected' : '' }}>
                                                                Input Fields</option>
                                                            <option value="textarea"
                                                                {{ $content['type'] === 'textarea' ? 'selected' : '' }}>
                                                                Text Area</option>
                                                            <option value="richText"
                                                                {{ $content['type'] === 'richText' ? 'selected' : '' }}>
                                                                Rich Text Editor</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6 mb-3 input-value">
                                                        @if ($content['type'] === 'textarea')
                                                            <textarea name="contentValue[]" class="form-control {{ $key }}-to-target" placeholder="Value"
                                                                id="{{ $key }}">{{ $content['value'] }}</textarea>
                                                        @elseif($content['type'] === 'richText')
                                                            <textarea name="contentValue[]" class="form-control tinymce {{ $key }}-to-target" placeholder="Value"
                                                                id="{{ $key }}">{{ $content['value'] }}</textarea>
                                                        @else
                                                            <input type="text" value="{{ $content['value'] }}"
                                                                name="contentValue[]"
                                                                class="form-control {{ $key }}-to-target"
                                                                placeholder="Value" id="{{ $key }}">
                                                        @endif
                                                    </div>
                                                    <div class="col-md-2 mb-3">
                                                        <button type="button"
                                                            class="btn btn-danger d-inline cross delete_content_key"><i
                                                                class="mdi mdi-delete"></i></button>
                                                    </div>

                                                </div>
                                            @endforeach

                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <select name="add_more_type" id="add_more_type" class="form-select">
                                                    <option selected disabled>Select Input Type
                                                    </option>
                                                    <option value="inputField">Input Fields
                                                    </option>
                                                    <option value="textarea">Text Area
                                                    </option>
                                                    <option value="richText">Rich Text Editor
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <a href="#" class="btn btn-primary waves-effect waves-light"
                                                    id="addMore">Add Row</a>
                                            </div>
                                        </div>
                                </div>


                                </span>
                        </div>
                        

                        <div class="col-12">
                            <div class="mt-5">
                                <button type="submit" class="btn btn-primary ms-auto d-flex waves-effect waves-light">update</button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="white-bg mt-5">
                <div class="row">
                    <div class="col-6 text-center pt-5">
                        <h4>Download Content as JSON File</h4>
                        <a href="{{ route('Emd.tools.download', $tool->id) }}"
                            class="btn btn-primary waves-effect waves-light">Download .json file</a>
                        <p class="px-5 mt-3">
                            To use this conetnt just open the downloded file and copy the content in it and paste that
                            content on right form and click on "Upload JSON" button
                        </p>
                    </div>
                    <div class="col-6 text-center pt-5">
                        <div class="message"></div>
                        <h4>Upload JSON Content</h4>
                        <form action="{{ route('Emd.tools.upload', $tool->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <input type="file" name="content" id="content" class="form-control" required>
                            <button type="submit" class="btn btn-primary waves-effect waves-light mt-3">Upload JSON</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('page-script')
    <script src="{{ asset('assets/js/dashboards-analytics.js') }}"></script>
    <script>
        $(document).ready(function() {
            tinymce.init({
                selector: 'textarea.tinymce',
            });
            $(".get_trans_btn").click(function() {
                $(".get_trans_btn").hide();
                var data_key = $(this).attr('id');
                var content_text = $("#" + data_key).val();
                var lang = "es";
                $.ajax({
                    url: "http://resumir.org/admin/tool/key_translate",
                    method: 'POST',
                    data: {
                        content_text: content_text,
                        lang: lang,
                        _token: "qC8DuW34pLu658bZ4XzkUlbeWTxtD8eeRGM09Oxw"
                    },
                    success: function(ret) {
                        $(".get_trans_btn").show();
                        $("#" + data_key).val(ret);
                        tinymce.get(data_key).setContent(ret);
                    }
                });
            });

            $(".get_trans_all_btn").click(function() {
                var result = confirm("Are you sure you want to proceed?");
                if (!result) {
                    return false;
                }
                $(".get_trans_all_btn").hide();
                $(".waiting_for_all_trans").removeClass("d-none");
                var lang = "es";
                var tool_id = "1";
                $.ajax({
                    url: "http://resumir.org/admin/tool/all_key_translate",
                    method: 'POST',
                    data: {
                        tool_id: tool_id,
                        lang: lang,
                        _token: "qC8DuW34pLu658bZ4XzkUlbeWTxtD8eeRGM09Oxw"
                    },
                    success: function(ret) {
                        window.location.reload();
                    }
                });
            });
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $(".confirm_convert").on('click', function() {
                convert_input_type($(this).attr('data-target'));
                $('#alert-modal').modal('toggle');
            });
            $(".modal_close_btn").on('click', function() {
                let id = $(this).attr('data-target');
                let element = $("#" + id);
                element.val(element.attr('data-original-type'));
            });
            $(".js-input-type").on("change", function() {
                var target = $(this).attr('data-target');
                $(".modal_close_btn").attr('data-target', target);
                if ($(this).attr('data-original-type') == 'richText') {
                    $(".confirm_convert").attr('data-target', target);
                    $("#alertModalBtn").click();
                } else {
                    convert_input_type(target);
                }
                return;
            });
            $(document).on('click', '.cross', function() {
                if (confirm("Are you Sure you want to delete this element?")) {
                    $(this).parents('.tool_content_row').remove();
                }
            });
            $("#addMore").on("click", function(e) {
                e.preventDefault();
                var selectedValue = $("#add_more_type").val();
                var html = `<div class="row tool_content_row">
            <input type="hidden" value="` + selectedValue + `" name="contentType[]" class="target_input_type">
                <div class="col-md-3 mb-3">
                    <input type="text" name="contentKey[]" class="form-control" placeholder="Key" value="">
                </div>
                <div class="col-md-8 mb-3">`;
                if (selectedValue == "inputField") {
                    html +=
                        `<input type="text" name="contentValue[]" class="form-control" placeholder="Value" value="">`;
                } else if (selectedValue == "textarea") {
                    html +=
                        `<textarea rows="3" name="contentValue[]" class="form-control" placeholder="Content" value=""></textarea>`;
                } else {
                    html +=
                        `<input type="text" class="form-control tool_textarea" name="contentValue[]"  />`;
                }
                html += `</div><div class="col-sm-1">
                                    <button type="button"
                                                        class="btn btn-danger d-inline cross delete_content_key"><i class="mdi mdi-delete"></i></button>
                                </div></div>`;
                $(".tool-content").append(html);
                init_tinymce();
            });
            $("#upload-json-submit").on("click", function(e) {
                var json = $("#upload_json").val();
                try {
                    JSON.parse(json);
                } catch (e) {
                    alert(e);
                    return false;
                }
                if (json != "") {
                    var count = Object.keys(JSON.parse(json)).length;
                    if (count < 1) {
                        alert("Cannot upload empty JSON");
                        return;
                    } else {
                        if (confirm("Are you sure?")) {
                            $("#jsonform").submit();
                        }
                    }
                } else {
                    alert("upload json");
                    return;
                }
            });

            function meta_title() {
                var title = $("#metaTitle").val().trim();
                $(".char-count-num").text(title.split("").length);
                var total_words = title.replace(/\s+/g, ' ').split(" ").length;
                $(".word-count-num").text(total_words);
                $(".char-extraspaces-num").text(title.split(" ").length - total_words);
            }

            function meta_description() {
                var title = $("#metaDescription").val().trim();
                $(".desc-word-count-num").text(title.split("").length);
                var total_words = title.replace(/\s+/g, ' ').split(" ").length;
                $(".desc-word-count-num").text(total_words);
                $(".desc-char-extraspaces-num").text(title.split(" ").length - total_words);
            }
            $("#metaTitle").keyup(function() {
                meta_title();
            });
            $("#metaDescription").keyup(function() {
                meta_description();
            });
            meta_title();
            meta_description();
        });

        function convert_input_type(id) {
            var element = $("#" + id);
            let val = element.val();
            let parent = element.closest('.row');
            let parent_id = parent.data('id');
            let original_input = parent.find('.input-to-target');
            let input_val = original_input.val();

            let html = "";
            if (element.attr('data-original-type') == 'richText') {
                input_val = tinymce.get(parent_id).getContent({
                    format: "text"
                });
            }
            input_val = stripHtml(input_val);
            if (val == 'inputField') {
                html =
                    "<input type='text' name='contentValue[]' class='form-control input-to-target' placeholder='Value' value='" +
                    input_val + "'>";
            } else if (val == 'textarea') {
                html =
                    '<textarea rows="3" name="contentValue[]" class="form-control input-to-target" placeholder="Content">' +
                    input_val + '</textarea>';

            } else if (val == 'richText') {
                html =
                    "<input type='text' id='" + parent_id +
                    "' name='contentValue[]' class='form-control tool_textarea input-to-target' placeholder='Value' value='" +
                    input_val + "'>";
            }
            parent.find(".input-value").html(html);
            init_tinymce();
            element.attr('data-original-type', val);
            let contentType = parent.find('.target_input_type');
            contentType.val(element.attr('data-original-type'));
        }
    </script>
@endpush