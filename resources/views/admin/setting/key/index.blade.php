@extends('layouts/adminLayout')
@section('title', 'Create')

@section('content')
    <section class="tools-create">
        <div class="container">
            <div class="white-bg">
                <div class="add-tool-wrapper">
                    <div class="add-tools">
                        <div class="add-tool-heading">
                            <h3>Setting Keys:</h3>
                        </div>
                        <div class="add-tools-form-body">
                            <form action="{{ route('setting-key.store') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <span class="js-span-toggle-content">
                                        <div class="tool-content">
                                            @foreach ($settings as $key => $value)
                                                <div class="row">
                                                    <div class="col-md-3 mb-3">
                                                        <input type="text" name="contentKey[]" class="form-control"
                                                            placeholder="Key" value="{{ $key }}">
                                                    </div>
                                                    <div class="col-md-7 mb-3">
                                                        <input type="text" name="contentValue[]" class="form-control"
                                                            placeholder="Value" value="{{ $value }}">
                                                    </div>
                                                    <div class="col-md-2 mb-3">
                                                        <input type="hidden" name="contentType[]" class="form-control contentType" value="inputField">
                                                        <div class="delete">
                                                            <a class="btn btn-sm btn-danger text-white" href="{{ route('setting-key.show', $key) }}">
                                                                <i class="mdi mdi-delete"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                            <div class="row">
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
                                                    <option disabled>Select Input Type</option>
                                                    <option value="inputField" selected>Input Fields</option>
                                                    <option value="textarea">Text Area</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <a href="#" class="btn btn-primary waves-effect waves-light"
                                                    id="addMore">Add Row</a>
                                            </div>
                                        </div>
                                    </span>
                                </div>
                                <div class="col-12 text-end">
                                    <button type="submit" class="btn btn-primary">Create</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('page-script')
    <script>
        $('#addMore').on('click', function(e) {
            e.preventDefault();
            var selectedValue = $('#add_more_type').val();
            var html =
                `<div class="row"><input type="hidden" value="` +
                selectedValue +
                `" name="contentType[]">
                <div class="col-md-3 mb-3">
                    <input type="text" name="contentKey[]" class="form-control" placeholder="Key" value="">
                </div>
                <div class="col-md-9 mb-3">`;
                    if (selectedValue == 'inputField') {
                html +=
                    `<input type="text" name="contentValue[]" class="form-control" placeholder="Value" value="">`;
            } else if (selectedValue == 'textarea') {
                html +=
                    `<textarea rows="3" name="contentValue[]" class="form-control" placeholder="Content"></textarea>`;
            }
            html += `</div></div>`;
            $('.tool-content').append(html);
        });
    </script>
@endpush