@extends('layouts.frontend.main')
@section('title', @$tool->tool_name)
@push('style')
<style>
    #main_header {
        background: #f0faf6 !important;
    }
    .tool_bg {
        background: linear-gradient(180deg, #f0faf6 0%, #ffffff 100%);
    }
</style>
@endpush
@section('content')
   
    <section class="tool_bg">
        <div class="tool-top d-flex-column d-flex-jc-ai-g">
            <h1>{{ @$content->main_heading->value }}</h1>
            <p>{{ @$content->main_content->value }}</p>
        </div>
        <form action="#" id="TextToSpeech">
            <input type="file" id="fileUpload" class="d-none" accept=".txt,.doc,.docx" />
            <div class="main_tool">
                <div class="main_content">
                    <div class="tool_action">
                        <div class="clear">
                            <img class="clear-input cursor-pointer" src="{{ asset('assets/frontend/image/delete.svg') }}" alt="delete" />
                        </div>
                        <div class="error">
                            <img src="{{ asset('assets/frontend/image/error.svg') }}" alt="error icon" />
                            <span></span>
                        </div>
                    </div>
                    <div class="functional_tool">
                        <textarea class="input-content-div" id="content" name="content" placeholder="What your text that you want to convert it?"></textarea>
                        <div class="wordCount">
                            <span class="wordCountSpan">0</span>
                            <span>/</span>
                            <span class="wordCountLimit">{{ @$content->word_limit->value }}</span>
                        </div>
                    </div>
                    <div class="lower_tool_action">
                        <div class="uploadData">
                            <img src="{{ asset('assets/frontend/image/upload.svg') }}" alt="upload" />
                            <span>{{ @$content->upload_btn->value }}</span>
                        </div>
                        <div class="type-selector">
                            <div class="custom-select fix-height">
                                <div class="select-selected" id="typeSelectors">
                                    <span data-lang="en" class="SelectedLanguage">English</span>
                                    <div class="g-1">
                                        <img src="{{ asset('assets/frontend/image/select_icon.svg') }}" alt="select_icon" />
                                        <img src="{{ asset('assets/frontend/image/arrows_down.svg') }}" alt="arrows" />
                                    </div>
                                </div>
                                <span class="d-none" id="typeSelected"></span>
                                <input type="hidden" name="essay_type" id="typeSelectedInput" value="Basic" />
                                <ul class="select-items" id="typeItem">
                                    <li data-lang="en">English</li>
                                    <li data-lang="es">Spanish</li>
                                    <li data-lang="de">German</li>
                                    <li data-lang="fr">French</li>
                                    <li data-lang="ja">Japanese</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn-generate btn-11 d-flex-jc-ai-g" id="SubmitBtn">
                <span>{{ @$content->button_text->value }}</span>
            </button>
        </form>
        <div class="disclaimer">
            <p>{!! @$content->disclaimer->value !!}</p>
        </div>
    </section>

    <section class="container">
        <div class="work-container d-flex">
            <div class="left-works d-flex-g d-flex-column">
                <h2>{{ @$content->how_to_use->value }}</h2>
                <p>{{ @$content->how_to_use_description->value }}</p>
            </div>
            <div class="right-works d-flex">
                <div class="work-steps-container d-flex-column">
                    <div class="how-container d-flex-column d-flex-jce-aie-g">
                        <ul class="how-container d-flex-column d-flex-jce-aie-g">
                            <li class="step-1 d-flex-jc-ai-g">
                                <img src="{{ asset('assets/frontend/image/step-1.svg') }}" alt="step-1" class="step-image" />
                                <p>
                                    <span>{{ @$content->step_1->value }} </span>
                                    {{ @$content->step_1_description->value }}
                                </p>
                            </li>
                            <li class="step-1 d-flex-jc-ai-g">
                                <img src="{{ asset('assets/frontend/image/step-2.svg') }}" alt="step-2" class="step-image" />
                                <p>
                                    <span>{{ @$content->step_2->value }}</span> 
                                    {{ @$content->step_2_description->value }}
                                </p>
                            </li>
                            <li class="step-1 d-flex-jc-ai-g">
                                <img src="{{ asset('assets/frontend/image/step-3.svg') }}" alt="step-3" class="step-image" />
                                <p>
                                    <span>{{ @$content->step_3->value }}</span>
                                    {{ @$content->step_3_description->value }}
                                </p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg_color">
        <div class="container">
            <div class="feature-top d-flex-jc-ai-g d-flex-column" id="features">
                <h3>{{ @$content->features_heading->value }}</h3>
                <p class="text-center">{{ @$content->features_description->value }}</p>
                <div class="card_flex">
                    <div class="home-features">
                        <div class="feature_card">
                            <div class="card_body">
                                <div class="card_image">
                                    <img src="{{ asset('assets/frontend/image/home-fature1.svg') }}" alt="feature" />
                                </div>
                                <div class="card_content">
                                    <h3>{{ @$content->feature_step_1->value }}</h3>
                                    <p>{{ @$content->feature_step_1_description->value }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="home-features">
                        <div class="feature_card">
                            <div class="card_body">
                                <div class="card_image">
                                    <img src="{{ asset('assets/frontend/image/home-fature2.svg') }}" alt="feature" />
                                </div>
                                <div class="card_content">
                                    <h3>{{ @$content->feature_step_2->value }}</h3>
                                    <p>{{ @$content->feature_step_2_description->value }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="home-features">
                        <div class="feature_card">
                            <div class="card_body">
                                <div class="card_image">
                                    <img src="{{ asset('assets/frontend/image/home-fature3.svg') }}" alt="feature" />
                                </div>
                                <div class="card_content">
                                    <h3>{{ @$content->feature_step_3->value }}</h3>
                                    <p></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="home-features">
                        <div class="feature_card">
                            <div class="card_body">
                                <div class="card_image">
                                    <img src="{{ asset('assets/frontend/image/home-fature4.svg') }}" alt="feature" />
                                </div>
                                <div class="card_content">
                                    <h3>{{ @$content->feature_step_4->value }}</h3>
                                    <p>{{ @$content->feature_step_4_description->value }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="container">
        <div class="work-container d-flex">
            <div class="right-works d-flex">
                <img class="why-us-img" src="{{ asset('assets/frontend/image/why-us.svg') }}" alt="why-us" />
            </div>
            <div class="left-works d-flex-g d-flex-column">
                <h2>{{ @$content->why_us_heading->value }}</h2>
                <p>{!! @$content->why_us_description->value !!}</p>
            </div>
        </div>
    </section>

    <section class="container">
        <div class="faq_section d-flex-jc-ai-g d-flex-column">
            <h3></h3>
        </div>
        <div class="faq-container d-flex-column d-flex-jc-ai-g">
            <div class="question-container d-flex-column">
                <div class="question-div dropDownIcon cursor-pointer d-flex-column" id="dropDownIcon_1">
                    <div class="question-top d-flex">
                        <div class="question-title" id="title_dropDownIcon_1">
                            <h3>{{ @$content->faq_question_1->value }}</h3>
                        </div>
                        <div class="drop-icon d-flex-jc-ai">
                            <img id="icon_dropDownIcon_1" src="{{ asset('assets/frontend/image/drop-icon.svg') }}" alt="drop-icon" />
                        </div>
                    </div>
                    <div class="dropdown-content d-none" id="show_dropDownIcon_1">
                        <p>{!! @$content->faq_answer_1->value !!}</p>
                    </div>
                </div>

                <div class="question-div dropDownIcon cursor-pointer d-flex-column" id="dropDownIcon_2">
                    <div class="question-top d-flex">
                        <div class="question-title" id="title_dropDownIcon_2">
                            <h3>{{ @$content->faq_question_2->value }}</h3>
                        </div>
                        <div class="drop-icon d-flex-jc-ai">
                            <img id="icon_dropDownIcon_2" src="{{ asset('assets/frontend/image/drop-icon.svg') }}" alt="drop-icon" />
                        </div>
                    </div>
                    <div class="dropdown-content d-none" id="show_dropDownIcon_2">
                        <p>{!! @$content->faq_answer_2->value !!}</p>
                    </div>
                </div>

                <div class="question-div dropDownIcon cursor-pointer d-flex-column" id="dropDownIcon_3">
                    <div class="question-top d-flex">
                        <div class="question-title" id="title_dropDownIcon_3">
                            <h3>{{ @$content->faq_question_3->value }}</h3>
                        </div>
                        <div class="drop-icon d-flex-jc-ai">
                            <img id="icon_dropDownIcon_3" src="{{ asset('assets/frontend/image/drop-icon.svg') }}" alt="drop-icon" />
                        </div>
                    </div>
                    <div class="dropdown-content d-none" id="show_dropDownIcon_3">
                        <p>{!! @$content->faq_answer_3->value !!}</p>
                    </div>
                </div>

                <div class="question-div dropDownIcon cursor-pointer d-flex-column" id="dropDownIcon_4">
                    <div class="question-top d-flex">
                        <div class="question-title" id="title_dropDownIcon_4">
                            <h3>{{ @$content->faq_question_4->value }}</h3>
                        </div>
                        <div class="drop-icon d-flex-jc-ai">
                            <img id="icon_dropDownIcon_4" src="{{ asset('assets/frontend/image/drop-icon.svg') }}" alt="drop-icon" />
                        </div>
                    </div>
                    <div class="dropdown-content d-none" id="show_dropDownIcon_4">
                        <p>{!! @$content->faq_answer_4->value !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <x-validation-model />
@endsection

@push('script')
    <script src="{{ asset('assets/frontend/js/home.js') }}"></script>
@endpush