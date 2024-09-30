@extends('layouts.frontend.main')
@section('title', @$tool->tool_name)
@push('style')
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/speech-to-text.css') }}?v={{ config('setting_key.project_version') }}">
@endpush
@section('content')
    <section class="tool_bg">
        <div class="tool-top d-flex-column d-flex-jc-ai-g">
            <h1>{{ @$content->main_heading->value }}</h1>
            <p>{{ @$content->main_content->value }}</p>
        </div>
        <form action="#" id="SpeechToText">
            <input type="file" id="fileUpload" class="d-none" accept=".txt,.doc,.docx" />
            <div class="main_tool">
                <div class="main_content">
                    <div class="tool-body p-3">
                        <div class="tool-action">
                            <button type="button" class="custom-button" id="start">
                                <span class="label">
                                    <svg fill="#0D8487" width="800px" height="800px" viewBox="0 0 36 36" version="1.1"  preserveAspectRatio="xMidYMid meet" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <path d="M18,24c3.9,0,7-3.1,7-7V9c0-3.9-3.1-7-7-7s-7,3.1-7,7v8C11,20.9,14.1,24,18,24z M13,9c0-2.8,2.2-5,5-5s5,2.2,5,5v8c0,2.8-2.2,5-5,5s-5-2.2-5-5V9z" class="clr-i-outline clr-i-outline-path-1"></path>
                                            <path d="M30,17h-2c0,5.5-4.5,10-10,10S8,22.5,8,17H6c0,6.3,4.8,11.4,11,11.9V32h-3c-0.6,0-1,0.4-1,1s0.4,1,1,1h8c0.6,0,1-0.4,1-1s-0.4-1-1-1h-3v-3.1C25.2,28.4,30,23.3,30,17z" class="clr-i-outline clr-i-outline-path-2"></path>
                                        <rect x="0" y="0" width="36" height="36" fill-opacity="0"/>
                                    </svg>
                                </span><br>
                                {{ @$content->start_recording_text->value }}
                            </button>
                            <button type="button" class="custom-button bg-danger hidden" id="stop" style="display: none">
                                <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                    viewBox="0 0 330 330" style="enable-background:new 0 0 330 330;" xml:space="preserve">
                                    <g id="XMLID_223_" fill="#fff">
                                        <path id="XMLID_224_" d="M225.75,89.25h-121.5c-8.284,0-15,6.716-15,15v121.5c0,8.284,6.716,15,15,15h121.5c8.284,0,15-6.716,15-15
                                            v-121.5C240.75,95.966,234.034,89.25,225.75,89.25z"/>
                                        <path id="XMLID_225_" d="M165,0C74.019,0,0,74.019,0,165s74.019,165,165,165s165-74.019,165-165S255.981,0,165,0z M165,300
                                            c-74.439,0-135-60.561-135-135S90.561,30,165,30s135,60.561,135,135S239.439,300,165,300z"/>
                                    </g>
                                </svg>
                                <br>
                                <span class="text-white">
                                    {{ @$content->stop_recording_text->value }}</span>
                            </button>
                            <button type="button" class="custom-button bg-danger hidden" id="cancleBtn" style="display: none">
                                <svg fill="#fff" width="800px" height="800px" viewBox="0 0 24 24" id="cross" data-name="Flat Color" xmlns="http://www.w3.org/2000/svg" class="icon flat-color">
                                    <path id="primary" d="M13.41,12l6.3-6.29a1,1,0,1,0-1.42-1.42L12,10.59,5.71,4.29A1,1,0,0,0,4.29,5.71L10.59,12l-6.3,6.29a1,1,0,0,0,0,1.42,1,1,0,0,0,1.42,0L12,13.41l6.29,6.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42Z" style="fill: #fff;"></path>
                                </svg>
                                <br>
                                <span class="text-white">
                                    {{ @$content->cancle_process_text->value }}</span>
                            </button>
                            <button type="button" class="uploadFile custom-button">
                                
                                <svg width="28" height="24" viewBox="0 0 28 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M22.4872 17.4658H18.3391C17.7362 17.4658 17.2475 16.9771 17.2475 16.3742C17.2475 15.7713 17.7362 15.2826 18.3391 15.2826H22.4872C24.293 15.2826 25.7621 13.8135 25.7621 12.0077C25.7621 10.1408 24.4481 8.73291 22.7056 8.73291C22.1027 8.73291 21.614 8.24419 21.614 7.6413C21.614 5.83555 20.1449 4.36645 18.3391 4.36645C17.9851 4.36645 17.624 4.43463 17.2352 4.57484C16.7974 4.73275 16.3079 4.59586 16.0156 4.23393C14.9629 2.93066 13.4225 2.18323 11.7894 2.18323C8.77985 2.18323 6.33136 4.63172 6.33136 7.6413C6.33136 8.24419 5.84264 8.73291 5.23975 8.73291C3.49726 8.73291 2.18323 10.1408 2.18323 12.0077C2.18323 13.8135 3.65232 15.2826 5.45807 15.2826H9.6062C10.2091 15.2826 10.6978 15.7713 10.6978 16.3742C10.6978 16.9771 10.2091 17.4658 9.6062 17.4658H5.45807C2.44849 17.4658 0 15.0173 0 12.0077C0 10.55 0.519335 9.18937 1.46238 8.17635C2.2044 7.37925 3.15727 6.85424 4.21237 6.64809C4.70082 2.90233 7.91262 0 11.7894 0C13.8414 0 15.7843 0.833283 17.2229 2.30882C17.5992 2.22531 17.9725 2.18323 18.3391 2.18323C21.0078 2.18323 23.2353 4.1084 23.7056 6.64291C24.7716 6.84529 25.7345 7.37243 26.4829 8.1764C27.4259 9.18937 27.9453 10.55 27.9453 12.0077C27.9453 15.0173 25.4969 17.4658 22.4872 17.4658Z" fill="#0D8487"/>
                                    <path d="M18.0194 11.8754L15.5164 9.3724C15.0984 8.95437 14.5517 8.74216 14.0026 8.73468C13.9926 8.73441 13.9828 8.73315 13.9727 8.73315C13.9626 8.73315 13.9527 8.73441 13.9427 8.73468C13.3937 8.74216 12.8469 8.95437 12.4289 9.3724L9.92595 11.8754C9.49962 12.3017 9.49962 12.9928 9.92595 13.4191C10.3523 13.8454 11.0434 13.8455 11.4697 13.4191L12.881 12.0078V22.9084C12.881 23.5113 13.3697 24 13.9726 24C14.5755 24 15.0642 23.5113 15.0642 22.9084V12.0078L16.4755 13.4191C16.9018 13.8454 17.5931 13.8454 18.0193 13.4191C18.4456 12.9928 18.4456 12.3016 18.0194 11.8754Z" fill="#0D8487"/>
                                </svg>
                                <br>
                                {{ @$content->upload_file_text->value }}
                            </button>
                        </div>
                
                        <div class="audio-wave">
                            <div class="sound-wave-bars">
                                <div class="timer me-3">00:00</div>
                                <div class="bar"></div>
                                <div class="bar"></div>
                                <div class="bar"></div>
                                <div class="bar"></div>
                                <div class="bar"></div>
                                <div class="bar"></div>
                                <div class="bar"></div>
                                <div class="bar"></div>
                                <div class="bar"></div>
                                <div class="bar"></div>
                                <div class="bar"></div>
                                <div class="bar"></div>
                                <div class="bar"></div>
                                <div class="bar"></div>
                                <div class="bar"></div>
                                <div class="bar"></div>
                                <div class="bar"></div>
                                <div class="bar"></div>
                                <div class="bar"></div>
                                <div class="bar"></div>
                                <div class="bar"></div>
                                <div class="bar"></div>
                                <div class="bar"></div>
                                <div class="bar"></div>
                                <div class="bar"></div>
                                <div class="bar"></div>
                                <div class="bar"></div>
                                <div class="bar"></div>
                                <div class="bar"></div>
                                <div class="bar"></div>
                                <div class="bar"></div>
                                <div class="bar"></div>
                                <div class="bar"></div>
                                <div class="bar"></div>
                                <div class="bar"></div>
                                <div class="bar"></div>
                                <div class="bar"></div>
                                <div class="bar"></div>
                            </div>
                        </div>
                        
                        <div class="custom-audio-player">
                            <audio id="player" controls style="display: none;" ></audio>                            
                            <audio id="audioPlayer" controls style="display: none;"></audio>
                        </div>
                        <input type="file" id="audioInput" accept=".mp3,.ogg,.wav" style="display: none;">
                    </div>

                    <div class="lower_tool_action">
                        <form action="">
                            @csrf
                            <input type="hidden" id="csrf_token" value="{{ csrf_token() }}">
                            <input type="hidden" id="audio_file" readonly>
                        
                        </form>
                        
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
@endsection
@push('script')
    <script src="{{ asset('assets/frontend/js/speech-to-text.js') }}?v={{ config('setting_key.project_version') }}"></script>
@endpush