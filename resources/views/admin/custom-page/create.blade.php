@extends('layouts/adminLayout')

@section('title', 'Create Custom Page')

@section('content')
    <section class="create-custom-page">
        <div class="container">
            <div class="white-bg">
                <div class="add-custom-page-heading">
                    <h3>Add Custom Page</h3>
                </div>
                <form action="{{ route('custom-page.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label for="pageName" class="form-label">Page Name</label>
                                <input type="text" name="name" class="form-control" id="pageName"
                                    placeholder="Page Name">
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label for="bladeFile" class="form-label">Blade File</label>
                                <input type="text" name="view" class="form-control" id="bladeFile"
                                    placeholder="Blade File Name">
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="mb-3">
                                <label for="pageSlug" class="form-label">Page Slug</label>
                                <input type="text" name="slug" class="form-control js-custom-page-slug" id="pageSlug"
                                    placeholder="Page Slug">
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="mb-3">
                                <label for="pageKey" class="form-label">Page Key</label>
                                <input type="text" name="key" class="form-control js-page-key" id="pageKey"
                                    placeholder="Page Key">
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="mb-3">
                                <label for="metaTitle" class="form-label">Meta Title</label>
                                <input type="text" name="meta_title" class="form-control" id="metaTitle"
                                    placeholder="Meta Title">
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="mb-3">
                                <label for="metaDescription" class="form-label">Meta Description</label>
                                <textarea type="text" name="meta_description" class="form-control" id="metaDescription"
                                    placeholder="Meta Description"></textarea>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="mb-3">
                                <label for="siteMap" class="form-label">Show in (sitemap)</label>
                                <select  name="sitemap" class="form-select" id="siteMap"
                                    placeholder="Show in (sitemap)">
                                    <option  selected value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                            </div>
                        </div>

                        <span class="js-span-toggle-content">
                          <div class="col-12">
                              <div class="my-5">
                                  <h3>Page Content:</h3>
                              </div>
                          </div>

                          <div class="page-content">
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

                        <div class="col-12"></div>
                            <div class="mt-5">
                                <button type="submit" class="btn btn-primary ms-auto d-flex waves-effect waves-light">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>

    </section>
@endsection

@push('page-script')
    <script>
        $('label').on('click', function() {
            $(this).next().focus();
        });
        $(".js-custom-page-slug").bind('keyup change input', function() {
            let val = $(this).val().toLowerCase().trim();
            val = val.replaceAll(" ", "-");
            $('.js-page-key').val(val.replaceAll("/", "-"));
        });
        $("#addMore").on("click", function(e) {
            e.preventDefault();
            var selectedValue = $("#add_more_type").val();
            var html = `<div class="row"><input type="hidden" value="` + selectedValue + `" name="contentType[]">
              <div class="col-md-3 mb-3">
                  <input type="text" name="contentKey[]" class="form-control" placeholder="Key" value="">
              </div>
              <div class="col-md-9 mb-3">`;
            if (selectedValue == "inputField") {
                html +=
                    `<input type="text" name="contentValue[]" class="form-control" placeholder="Value" value="">`;
            } else if (selectedValue == "textarea") {
                html +=
                    `<textarea rows="3" name="contentValue[]" class="form-control" placeholder="Content" value=""></textarea>`;
            } else {
                html += `<input class="form-control tool_textarea" name="contentValue[]"  />`;
            }
            html += `</div></div>`;
            $(".page-content").append(html);
            init_tinymce();
        });
    </script>
@endpush