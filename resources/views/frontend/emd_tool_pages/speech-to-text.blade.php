@extends('layouts.frontend.main')
@push('style')

    <style>
        .row{
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }
        .text-center{
            text-align: center;
        }
        .d-flex{
            display: flex;
        }
        .d-none{
            display: none;
        }
        .items-center{
            align-items: center;
        }
        .justify-content{
            justify-content: center;
        }

        .mt-3 {
            margin-top: 1.25rem;
        }
        .me-3{
            margin-right: 1.25rem;
        }
        
        .mx-auto{
            margin-left: auto;
            margin-right: auto;
        }

        .form-control{
            display: block;
            width: 100%;
            padding: .375rem .75rem;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: #212529;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #ced4da;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            border-radius: .25rem;
            transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
        }

        .form-select{
            display: block;
            width: 100%;
            padding: .375rem 2.25rem .375rem .75rem;
            -moz-padding-start: calc(0.75rem - 3px);
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: #212529;
            background-color: #fff;
            background-image: url({{asset('assets/frontend/image/arrows_down.svg')}});
            background-repeat: no-repeat;
            background-position: right .75rem center;
            background-size: 16px 12px;
            border: 1px solid #ced4da;
            border-radius: .25rem;
            transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
        }

        .select-list{
            width:170px;
        }

        .bg-white {
            background-color: #fff;
        }
        .bg-gray {
            background-color: #ebebeb;
        }
        .text-white {
            color: #fff;
        }
        .w-100 {
            width: 100%;
        }

        .p-1 {
            padding: .50rem;
        }

        .p-3{
            padding: 2rem;
        }

        .mt-3 {
            margin-top: 1.25rem;
        }
        .me-3{
            margin-right: 1.25rem;
        }

        .tool-body {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .tool-action {
            display: flex;
            flex-direction: row;
            gap: 4px;
        }

        .tool-footer {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        h1 {
            margin-bottom: 20px;
            font-size: 28px;
            color: #333;
        }

        .label {
            line-height: 20px;
            font-size: 17px;
            color: #333;
        }


        .audio-wave{
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        svg {
            width: 30px;
            height: 30px;
        }

        .button {
            padding: 10px 20px;
            border: none;
            border-radius: 25px;
            color: #fff;
            background: linear-gradient(45deg, #0D8487, #6eb5b7);
            cursor: pointer;
            font-size: 16px;
            transition: transform 0.2s;
        }

        .button:hover {
            transform: scale(1.05);
        }


        audio {
            width: 100%;
            margin-top: 10px;
            border-radius: 5px;
        }

        .custom-button {
            cursor: pointer;
            align-items: center;
            background-color: #ECF5F5;
            padding-left: 25px;
            padding-right: 25px;
            padding-top: 35px;
            padding-bottom: 12px;
            color: var(--primary);
            font-weight: 600;
            font-size: 0.875rem;
            border-radius: 9px;
            border: none;
        }

        .bg-danger{
            background-color: #db5c68 !important;
        }

        .sound-wave-bars {
            display: flex;
            height: 100px;
            align-items: center;
            justify-content: center;
            display: none;
        }

        .bar {
            height: 15px;
            width: 2px;
            background-color: #ff6961;
            border-radius: 4px;
            margin: 0 4px;
            animation: largeWaveAnim ease-in-out infinite alternate;
        }

        .custom-audio-player {
            width: 100%;
            max-width: 400px;
            background-color: #ECF5F5;
            border-radius: 8px;
            display: flex;
            flex-direction: column;
            align-items: center;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        .custom-audio-player audio {
            width: 100%;
            outline: none;
            margin-bottom: 10px;
        }

        @keyframes largeWaveAnim {
            0% {
                height: 20px;
                opacity: 0.33;
            }

            100% {
                height: 40px;
                opacity: 1;
            }
        }

        .bar:nth-child(-n+10),
        .bar:nth-last-child(-n+10) {
            background-color:#0D8487;
            animation-name: mediumWaveAnim;
        }

        @keyframes mediumWaveAnim {
            0% {
                height: 20px;
                opacity: 0.33;
            }

            100% {
                height: 75px;
                opacity: 1;
            }
        }

        .bar:nth-child(-n+5),
        .bar:nth-last-child(-n+5) {
            background-color:#aec6cf;
            animation-name: smallWaveAnim;
        }

        @keyframes smallWaveAnim {
            0% {
                height: 15px;
                opacity: 0.33;
            }

            100% {
                height: 35px;
                opacity: 1;
            }
        }

        @media (max-width: 1024px) {
            .custom-button {
                padding-left: 1.25rem;
                padding-right: 1.25rem;
                padding-top: 1rem;
                padding-bottom: 0.75rem;
                font-size: 0.875rem;
            }
        }
    </style>

@endpush
@section('content')
    <section class="tool_bg">
        <div class="tool-top d-flex-column d-flex-jc-ai-g">
            <h1>{{ @$content->main_heading->value }}</h1>
            <p>To use Texty Audio simply add your topic in the input box with essay length and click on the &quot;Write
                Essay&quot; button.</p>
        </div>
        <form action="#" id="SpeechToText">
            <input type="file" id="fileUpload" class="d-none" accept=".txt,.doc,.docx" />
            <div class="main_tool">
                <div class="main_content">
                    <div class="tool-body p-3">
                        <div class="tool-action">
                            {{-- start recording --}}
                            <button type="button" class="custom-button" id="start">
                                <span class="label">
                                    <svg fill="#0D8487" width="800px" height="800px" viewBox="0 0 36 36" version="1.1"  preserveAspectRatio="xMidYMid meet" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <path d="M18,24c3.9,0,7-3.1,7-7V9c0-3.9-3.1-7-7-7s-7,3.1-7,7v8C11,20.9,14.1,24,18,24z M13,9c0-2.8,2.2-5,5-5s5,2.2,5,5v8c0,2.8-2.2,5-5,5s-5-2.2-5-5V9z" class="clr-i-outline clr-i-outline-path-1"></path>
                                            <path d="M30,17h-2c0,5.5-4.5,10-10,10S8,22.5,8,17H6c0,6.3,4.8,11.4,11,11.9V32h-3c-0.6,0-1,0.4-1,1s0.4,1,1,1h8c0.6,0,1-0.4,1-1s-0.4-1-1-1h-3v-3.1C25.2,28.4,30,23.3,30,17z" class="clr-i-outline clr-i-outline-path-2"></path>
                                        <rect x="0" y="0" width="36" height="36" fill-opacity="0"/>
                                    </svg>
                                </span><br>
                                Start Recording
                            </button>
            
                            {{-- stop recording --}}
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
                                <span class="text-white">Stop Recording</span>
                                
                            </button>
                            
                            {{-- cancle button --}}
                            <button type="button" class="custom-button bg-danger hidden" id="cancleBtn" style="display: none">
                                <svg fill="#fff" width="800px" height="800px" viewBox="0 0 24 24" id="cross" data-name="Flat Color" xmlns="http://www.w3.org/2000/svg" class="icon flat-color">
                                    <path id="primary" d="M13.41,12l6.3-6.29a1,1,0,1,0-1.42-1.42L12,10.59,5.71,4.29A1,1,0,0,0,4.29,5.71L10.59,12l-6.3,6.29a1,1,0,0,0,0,1.42,1,1,0,0,0,1.42,0L12,13.41l6.29,6.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42Z" style="fill: #fff;"></path>
                                </svg>
                                <br>
                                <span class="text-white">Cancel Process</span>
                            </button>
            
                            {{-- upload audio File --}}
                            <button type="button" class="uploadFile custom-button">
                                
                                <svg width="28" height="24" viewBox="0 0 28 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M22.4872 17.4658H18.3391C17.7362 17.4658 17.2475 16.9771 17.2475 16.3742C17.2475 15.7713 17.7362 15.2826 18.3391 15.2826H22.4872C24.293 15.2826 25.7621 13.8135 25.7621 12.0077C25.7621 10.1408 24.4481 8.73291 22.7056 8.73291C22.1027 8.73291 21.614 8.24419 21.614 7.6413C21.614 5.83555 20.1449 4.36645 18.3391 4.36645C17.9851 4.36645 17.624 4.43463 17.2352 4.57484C16.7974 4.73275 16.3079 4.59586 16.0156 4.23393C14.9629 2.93066 13.4225 2.18323 11.7894 2.18323C8.77985 2.18323 6.33136 4.63172 6.33136 7.6413C6.33136 8.24419 5.84264 8.73291 5.23975 8.73291C3.49726 8.73291 2.18323 10.1408 2.18323 12.0077C2.18323 13.8135 3.65232 15.2826 5.45807 15.2826H9.6062C10.2091 15.2826 10.6978 15.7713 10.6978 16.3742C10.6978 16.9771 10.2091 17.4658 9.6062 17.4658H5.45807C2.44849 17.4658 0 15.0173 0 12.0077C0 10.55 0.519335 9.18937 1.46238 8.17635C2.2044 7.37925 3.15727 6.85424 4.21237 6.64809C4.70082 2.90233 7.91262 0 11.7894 0C13.8414 0 15.7843 0.833283 17.2229 2.30882C17.5992 2.22531 17.9725 2.18323 18.3391 2.18323C21.0078 2.18323 23.2353 4.1084 23.7056 6.64291C24.7716 6.84529 25.7345 7.37243 26.4829 8.1764C27.4259 9.18937 27.9453 10.55 27.9453 12.0077C27.9453 15.0173 25.4969 17.4658 22.4872 17.4658Z" fill="#0D8487"/>
                                    <path d="M18.0194 11.8754L15.5164 9.3724C15.0984 8.95437 14.5517 8.74216 14.0026 8.73468C13.9926 8.73441 13.9828 8.73315 13.9727 8.73315C13.9626 8.73315 13.9527 8.73441 13.9427 8.73468C13.3937 8.74216 12.8469 8.95437 12.4289 9.3724L9.92595 11.8754C9.49962 12.3017 9.49962 12.9928 9.92595 13.4191C10.3523 13.8454 11.0434 13.8455 11.4697 13.4191L12.881 12.0078V22.9084C12.881 23.5113 13.3697 24 13.9726 24C14.5755 24 15.0642 23.5113 15.0642 22.9084V12.0078L16.4755 13.4191C16.9018 13.8454 17.5931 13.8454 18.0193 13.4191C18.4456 12.9928 18.4456 12.3016 18.0194 11.8754Z" fill="#0D8487"/>
                                </svg>
                                <br>
                                Upload File
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
                            {{-- recorder --}}
                            <audio id="player" controls style="display: none;" ></audio>
                            
                            {{-- uploader --}}
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
                <span>Generate Voice</span>
            </button>

            
        </form>
        <div class="disclaimer">
            <p>
                Generating essays on harmful, dangerous or illegal topics not allowed, we tried our best to prevent these
                topics,if you find any essay topic that is generating any of these types of content, email us at
                <a class="mail" href="#">aiessaywriter.com</a> b/w
                <a class="contact" href="contact-us">contact us</a>
            </p>
        </div>
    </section>

    <section class="container">
        <div class="work-container d-flex">
            <div class="left-works d-flex-g d-flex-column">
                <h2>How to use Texty Audio?</h2>
                <p>Texty Audio make it easy for you to write a effective and informative essay in seconds. The whole writing
                    process takes a few seconds to complete. All you need to do is provide your topic or prompt of your
                    essay.</p>
            </div>
            <div class="right-works d-flex">
                <div class="work-steps-container d-flex-column">
                    <div class="how-container d-flex-column d-flex-jce-aie-g">
                        <ul class="how-container d-flex-column d-flex-jce-aie-g">
                            <li class="step-1 d-flex-jc-ai-g">
                                <img src="{{ asset('assets/frontend/image/step-1.svg') }}" alt="step-1"
                                    class="step-image" />
                                <p><span>Essay Topic: </span> Type or paste the essay topic you need to write about. It can
                                    be anything. It can be a short descriptive topic or a long narrative topic.</p>
                            </li>
                            <li class="step-1 d-flex-jc-ai-g">
                                <img src="{{ asset('assets/frontend/image/step-2.svg') }}" alt="step-2"
                                    class="step-image" />
                                <p><span>Type of Essay: </span> Choose the type of essay, such as argumentative, expository,
                                    narrative, or descriptive, to clarify our essay generator of your need.</p>
                            </li>
                            <li class="step-1 d-flex-jc-ai-g">
                                <img src="{{ asset('assets/frontend/image/step-3.svg') }}" alt="step-3"
                                    class="step-image" />
                                <p><span>Essay Length: </span> Select your essay length to define how many words you want to
                                    generate according to your requirements.</p>
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
                <h3>Features of our Essay Maker ✍️</h3>
                <p class="text-center">Our free essay maker has many useful unique features that set it apart from other
                    essay writers and make it an excellent choice for students.</p>
                <div class="card_flex">
                    <div class="home-features">
                        <div class="feature_card">
                            <div class="card_body">
                                <div class="card_image">
                                    <img src="{{ asset('assets/frontend/image/home-fature1.svg') }}" alt="feature" />
                                </div>
                                <div class="card_content">
                                    <h3>Free for Students</h3>
                                    <p>Our essay maker is free for students to help them enhance their learning and writing
                                        experience to write competitive essays in their academic career.</p>
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
                                    <h3>No Sign-up Required</h3>
                                    <p>Texty Audio will not ask you for any Sign up or registration to write an essay, you
                                        just need to add your topic and start generating essays online.</p>
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
                                    <h3>AI for Essay Writing</h3>
                                    <p>Texty Audio trained with advanced state-of-the-art technology to write unique,
                                        well-structured, and coherent essays with no plagiarism issues.</p>
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
                                    <h3>Bypass AI</h3>
                                    <p>Our essay typer is programmed with a special feature called &quot;Bypass AI&quot;.
                                        Using this feature will help you remove AI detection and provide value to human
                                        readers.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="home-features">
                        <div class="feature_card">
                            <div class="card_body">
                                <div class="card_image">
                                    <img src="{{ asset('assets/frontend/image/home-fature5.svg') }}" alt="feature" />
                                </div>
                                <div class="card_content">
                                    <h3>Provides References</h3>
                                    <p>Our essay typer offers an option that you can select to get references and citations
                                        at the end of the essay with the provided information.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="home-features">
                        <div class="feature_card">
                            <div class="card_body">
                                <div class="card_image">
                                    <img src="{{ asset('assets/frontend/image/home-fature6.svg') }}" alt="feature" />
                                </div>
                                <div class="card_content">
                                    <h3>Types of Essays</h3>
                                    <p>This feature can help you generate different types of essays such as argumentative,
                                        expository, narrative, descriptive, etc., so that you can choose the type according
                                        to your requirements.</p>
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
                <h2>Why our Essay Generator?</h2>
                <p>
                    Our essay generator uses advanced machine learning algorithms, especially deep learning models to
                    understand and generate essays the way humans write.
                    <br />
                    <br />
                </p>
            </div>
        </div>
    </section>

    <section class="container">
        <div class="faq_section d-flex-jc-ai-g d-flex-column">
            <h3>Frequently Asked Questions</h3>
        </div>
        <div class="faq-container d-flex-column d-flex-jc-ai-g">
            <div class="question-container d-flex-column">
                <div class="question-div dropDownIcon cursor-pointer d-flex-column" id="dropDownIcon_1">
                    <div class="question-top d-flex">
                        <div class="question-title" id="title_dropDownIcon_1">
                            <h3>Is it okay to use AI for essays? <span> </span></h3>
                        </div>
                        <div class="drop-icon d-flex-jc-ai">
                            <img id="icon_dropDownIcon_1" src="{{ asset('assets/frontend/image/drop-icon.svg') }}"
                                alt="drop-icon" />
                        </div>
                    </div>
                    <div class="dropdown-content d-none" id="show_dropDownIcon_1">
                        <p>YES! It is perfectly okay to use AI for essays as long as you don&#039;t violate any guidelines.
                            If there are no restrictions on using AI for essay writing, you can use it without any problems.
                        </p>
                    </div>
                </div>

                <div class="question-div dropDownIcon cursor-pointer d-flex-column" id="dropDownIcon_2">
                    <div class="question-top d-flex">
                        <div class="question-title" id="title_dropDownIcon_2">
                            <h3>Is there an AI that writes essays? <span> </span></h3>
                        </div>
                        <div class="drop-icon d-flex-jc-ai">
                            <img id="icon_dropDownIcon_2" src="{{ asset('assets/frontend/image/drop-icon.svg') }}"
                                alt="drop-icon" />
                        </div>
                    </div>
                    <div class="dropdown-content d-none" id="show_dropDownIcon_2">
                        <p>Texty Audio uses modern NLP algorithms to provide valuable information to humans and turn it into
                            an AI that writes essays for you in seconds.</p>
                    </div>
                </div>

                <div class="question-div dropDownIcon cursor-pointer d-flex-column" id="dropDownIcon_3">
                    <div class="question-top d-flex">
                        <div class="question-title" id="title_dropDownIcon_3">
                            <h3>How do you write an AI essay without getting caught? <span> </span></h3>
                        </div>
                        <div class="drop-icon d-flex-jc-ai">
                            <img id="icon_dropDownIcon_3" src="{{ asset('assets/frontend/image/drop-icon.svg') }}"
                                alt="drop-icon" />
                        </div>
                    </div>
                    <div class="dropdown-content d-none" id="show_dropDownIcon_3">
                        <p>To avoid having your essay getting caught as AI, be sure to add some content of your own and also
                            use our “Bypass AI” feature to make the AI undetectable.</p>
                    </div>
                </div>

                <div class="question-div dropDownIcon cursor-pointer d-flex-column" id="dropDownIcon_4">
                    <div class="question-top d-flex">
                        <div class="question-title" id="title_dropDownIcon_4">
                            <h3>How students can write essays online for free? <span> </span></h3>
                        </div>
                        <div class="drop-icon d-flex-jc-ai">
                            <img id="icon_dropDownIcon_4" src="{{ asset('assets/frontend/image/drop-icon.svg') }}"
                                alt="drop-icon" />
                        </div>
                    </div>
                    <div class="dropdown-content d-none" id="show_dropDownIcon_4">
                        <p>Our essay maker is 100% free for students to help them improve their writing skills more
                            effectively and to engage them more deeply with their subjects.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('script')
    
    <script>
        class VoiceRecorder {
            constructor() {
                if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
                } else {
                    alert("getUserMedia is not supported in this browser!");
                    return;
                }

                this.mediaRecorder = null;
                this.stream = null;
                this.chunks = [];
                this.isRecording = false;
                this.interval = null;

                this.startRef = $('#start');
                this.stopRef = $('#stop');
                this.cancelRef = $('#cancleBtn');
                this.barsRef = $('.sound-wave-bars');
                this.parentBarsRef = $('.audio-wave');
                this.playerRef = $('#player');
                this.uploadFileRef = $('.uploadFile');
                this.timerRef = $('.timer');
                this.audioInputRef = $('#audioInput');
                this.audioPlayerRef = $('#audioPlayer');
                this.loaderWrapper = $('<div class="loader-wrapper hidden"><div class="loader"></div></div>');

                $('body').append(this.loaderWrapper);

                this.constraints = { audio: true };

                this.startRef.click(() => this.startRecording());
                this.stopRef.click(() => this.stopRecording());
                this.cancelRef.click(() => this.cancelRecording());

                // File upload logic
                this.audioInputRef.on('change', () => this.handleFileUpload());
                this.uploadFileRef.on('click', () => this.triggerFileUpload());
            }

            startRecording() {
                if (this.isRecording || this.audioInputRef.val()) {
                    const waveBars = document.querySelector('.sound-wave-bars');
                    waveBars.style.display = 'flex';
                    return;
                }

                this.clearUpload();
                this.isRecording = true;
                this.toggleLoader(true);

                this.startRef.hide();
                this.stopRef.show();
                this.uploadFileRef.hide();
                this.cancelRef.show();

                this.parentBarsRef.css('height', '100px');
                this.barsRef.css('display', 'flex');

                navigator.mediaDevices.getUserMedia(this.constraints)
                    .then(stream => this.handleSuccess(stream))
                    .catch(error => this.handleError(error));
            }

            handleSuccess(stream) {
                this.stream = stream;
                this.mediaRecorder = new MediaRecorder(this.stream);
                this.mediaRecorder.ondataavailable = e => this.chunks.push(e.data);
                this.mediaRecorder.onstop = () => this.onMediaRecorderStop();
                this.mediaRecorder.start();
                this.visualizeAudio(stream);
                this.toggleLoader(false);
                this.startTimer();
            }

            stopRecording() {
                if (!this.isRecording) return;
                this.isRecording = false;
                this.stopTimer();
                this.stopRef.hide();
                this.cancelRef.hide();
                this.barsRef.hide();
                this.parentBarsRef.css('height', '0px');
                this.mediaRecorder.stop();
                this.stream.getAudioTracks().forEach(track => track.stop());
                const waveBars = document.querySelector('.sound-wave-bars');
                waveBars.style.display = 'none';
                if (mediaRecorder && mediaRecorder.state === 'recording') {
                    mediaRecorder.stop();
                    waveBars.style.display = 'none';
                }
                audioElement.src = '';
            }

            onMediaRecorderStop() {
                const blob = new Blob(this.chunks, { 'type': 'audio/wav' });
                const audioURL = window.URL.createObjectURL(blob);
                this.playerRef.attr('src', audioURL).show();
                this.startRef.show();
                this.uploadFileRef.hide(); // Hide upload after recording
                this.chunks = [];

                this.downloadAudio(blob);
            }

            cancelRecording() {
                this.isRecording = false;
                this.stopTimer();
                this.barsRef.hide();
                this.stopRef.hide();
                this.playerRef.hide();
                this.audioPlayerRef.hide();
                this.parentBarsRef.css('height', '0px');
                this.cancelRef.hide();
                this.startRef.show();
                this.uploadFileRef.show(); // Allow upload after cancel

                // Clear chunks and file input
                this.chunks = [];
                this.clearUpload();
            }

            clearUpload() {
                this.audioInputRef.val('');  // Reset the file input
                this.audioPlayerRef.hide().attr('src', '');  // Hide and reset audio player
            }

            toggleLoader(isLoading) {
                if (isLoading) {
                    this.loaderWrapper.removeClass('hidden');
                } else {
                    this.loaderWrapper.addClass('hidden');
                }
            }

            startTimer() {
                let counter = 0;
                this.timerRef.text('00:00');
                this.interval = setInterval(() => {
                    counter++;
                    this.timerRef.text(this.formatTime(counter));
                }, 1000);
            }

            stopTimer() {
                clearInterval(this.interval);
                this.timerRef.text('00:00');
            }

            formatTime(seconds) {
                let minutes = Math.floor(seconds / 60);
                let remainingSeconds = seconds % 60;
                minutes = minutes < 10 ? '0' + minutes : minutes;
                remainingSeconds = remainingSeconds < 10 ? '0' + remainingSeconds : remainingSeconds;
                return minutes + ':' + remainingSeconds;
            }

            visualizeAudio(stream) {
                const audioContext = new (window.AudioContext || window.webkitAudioContext)();
                const analyser = audioContext.createAnalyser();
                const source = audioContext.createMediaStreamSource(stream);
                source.connect(analyser);
                analyser.fftSize = 256;

                const bufferLength = analyser.frequencyBinCount;
                const dataArray = new Uint8Array(bufferLength);

                const bars = $('.sound-wave-bars');

                const draw = () => {
                    analyser.getByteFrequencyData(dataArray);
                    bars.each((index, bar) => {
                        const value = dataArray[index];
                        $(bar).css('height', `${value / 2}px`);
                    });

                    if (this.isRecording) {
                        requestAnimationFrame(draw);
                    }
                };

                draw();
            }

            downloadAudio(blob) {
                const url = window.URL.createObjectURL(blob);
                const formData = new FormData();
                formData.append('audio_data', blob, 'recording_' + Date.now() + '.wav');

                // Perform AJAX request
                $.ajax({
                    url: '/download-audio',
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        console.log(response.message);
                        $('#audio_file').val('');
                        $('#audio_file').val(response.file_path);
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.error('Error uploading audio:', textStatus, errorThrown);
                    }
                });
            }

            triggerFileUpload() {
                if (this.isRecording) return;
                this.startRef.hide();
                this.uploadFileRef.hide();
                this.audioInputRef.click();
                this.cancelRef.show();
            }

            handleFileUpload() {
                const file = this.audioInputRef[0].files[0];
                if (file) {
                    const fileType = file.type;
                    const supportedTypes = ['audio/mp3', 'audio/ogg', 'audio/wav'];

                    if (supportedTypes.includes(fileType)) {
                        const audioURL = URL.createObjectURL(file);
                        this.audioPlayerRef.attr('src', audioURL).show();
                        this.audioPlayerRef[0].play();
                        this.startRef.hide();
                        this.uploadFileRef.hide();

                        const formData = new FormData();
                        formData.append('audio_data', file, file.name);

                        $.ajax({
                            url: '/upload-audio',
                            type: 'POST',
                            data: formData,
                            processData: false,
                            contentType: false,
                            success: (response) => {
                                console.log('Audio uploaded successfully:', response.message);
                                $('#audio_file').val('');
                                $('#audio_file').val(response.file_path);
                                this.cancelRef.hide();
                                this.startRef.show();
                            },
                            error: (jqXHR, textStatus, errorThrown) => {
                                console.error('Error uploading audio:', textStatus, errorThrown);
                                alert('There was an error uploading the file.');
                            }
                        });

                    } else {
                        alert('Unsupported audio format. Please upload an MP3, OGG, or WAV file.');
                    }
                }
            }

        }

        $(document).ready(function() {
            const voiceRecorder = new VoiceRecorder();
            $('#start').show();
        });
    </script>

@endpush
