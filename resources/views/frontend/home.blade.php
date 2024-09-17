@extends('layouts.frontend.main')
@section('title', @$tool->title)
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
            <h1>Texty Audio</h1>
            <p>To use Texty Audio simply add your topic in the input box with essay length and click on the &quot;Write Essay&quot; button.</p>
        </div>
        <form action="#" method="POST">
            <div class="main_tool">
                <div class="main_content">
                    <div class="tool_action">
                        <div>
                            <h3>Text to Speech</h3>
                        </div>
                        <div class="clear">
                            <img class="clear-input cursor-pointer" src="{{ asset('assets/frontend/image/delete.svg') }}" alt="delete" />
                        </div>
                        <div class="error">
                            <img src="{{ asset('assets/frontend/image/error.svg') }}" alt="error icon" />
                            <span></span>
                        </div>
                    </div>
                    <div class="functional_tool">
                        <textarea class="input-content-div" name="essay_content" contenteditable="true" id="editableDiv" placeholder="What your text that ypu want to convert it?"></textarea>

                        <input type="hidden" class="allowed_word" name="word_limit" value="500" />
                    </div>
                    <div class="lower_tool_action">
                        <div class="type-selector">
                            <label for="essay-type">Language</label>
                            <div class="custom-select fix-height">
                                <div class="select-selected" id="typeSelectors">
                                    <span>English</span>
                                    <div class="g-1">
                                        <img src="{{ asset('assets/frontend/image/select_icon.svg') }}" alt="select_icon" />
                                        <img src="{{ asset('assets/frontend/image/arrows_down.svg') }}" alt="arrows" />
                                    </div>
                                </div>
                                <span class="d-none" id="typeSelected"></span>
                                <input type="hidden" name="essay_type" id="typeSelectedInput" value="Basic" />
                                <ul class="select-items" id="typeItem">
                                    <li>English</li>
                                    <li>Spanish</li>
                                    <li>Greman</li>
                                    <li>French</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn-generate btn-11 d-flex-jc-ai-g" id="EssaySubmit">
                <span>Generate Text</span>
            </button>
        </form>
        <div class="disclaimer">
            <p>
                Generating essays on harmful, dangerous or illegal topics not allowed, we tried our best to prevent these topics,if you find any essay topic that is generating any of these types of content, email us at
                <a class="mail" href="#">aiessaywriter.com</a> b/w
                <a class="contact" href="contact-us">contact us</a>
            </p>
        </div>
    </section>

    <section class="container">
        <div class="work-container d-flex">
            <div class="left-works d-flex-g d-flex-column">
                <h2>How to use Texty Audio?</h2>
                <p>Texty Audio make it easy for you to write a effective and informative essay in seconds. The whole writing process takes a few seconds to complete. All you need to do is provide your topic or prompt of your essay.</p>
            </div>
            <div class="right-works d-flex">
                <div class="work-steps-container d-flex-column">
                    <div class="how-container d-flex-column d-flex-jce-aie-g">
                        <ul class="how-container d-flex-column d-flex-jce-aie-g">
                            <li class="step-1 d-flex-jc-ai-g">
                                <img src="{{ asset('assets/frontend/image/step-1.svg') }}" alt="step-1" class="step-image" />
                                <p><span>Essay Topic: </span> Type or paste the essay topic you need to write about. It can be anything. It can be a short descriptive topic or a long narrative topic.</p>
                            </li>
                            <li class="step-1 d-flex-jc-ai-g">
                                <img src="{{ asset('assets/frontend/image/step-2.svg') }}" alt="step-2" class="step-image" />
                                <p><span>Type of Essay: </span> Choose the type of essay, such as argumentative, expository, narrative, or descriptive, to clarify our essay generator of your need.</p>
                            </li>
                            <li class="step-1 d-flex-jc-ai-g">
                                <img src="{{ asset('assets/frontend/image/step-3.svg') }}" alt="step-3" class="step-image" />
                                <p><span>Essay Length: </span> Select your essay length to define how many words you want to generate according to your requirements.</p>
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
                <p class="text-center">Our free essay maker has many useful unique features that set it apart from other essay writers and make it an excellent choice for students.</p>
                <div class="card_flex">
                    <div class="home-features">
                        <div class="feature_card">
                            <div class="card_body">
                                <div class="card_image">
                                    <img src="{{ asset('assets/frontend/image/home-fature1.svg') }}" alt="feature" />
                                </div>
                                <div class="card_content">
                                    <h3>Free for Students</h3>
                                    <p>Our essay maker is free for students to help them enhance their learning and writing experience to write competitive essays in their academic career.</p>
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
                                    <p>Texty Audio will not ask you for any Sign up or registration to write an essay, you just need to add your topic and start generating essays online.</p>
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
                                    <p>Texty Audio trained with advanced state-of-the-art technology to write unique, well-structured, and coherent essays with no plagiarism issues.</p>
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
                                    <p>Our essay typer is programmed with a special feature called &quot;Bypass AI&quot;. Using this feature will help you remove AI detection and provide value to human readers.</p>
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
                                    <p>Our essay typer offers an option that you can select to get references and citations at the end of the essay with the provided information.</p>
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
                                    <p>This feature can help you generate different types of essays such as argumentative, expository, narrative, descriptive, etc., so that you can choose the type according to your requirements.</p>
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
                    Our essay generator uses advanced machine learning algorithms, especially deep learning models to understand and generate essays the way humans write.
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
                            <img id="icon_dropDownIcon_1" src="{{ asset('assets/frontend/image/drop-icon.svg') }}" alt="drop-icon" />
                        </div>
                    </div>
                    <div class="dropdown-content d-none" id="show_dropDownIcon_1">
                        <p>YES! It is perfectly okay to use AI for essays as long as you don&#039;t violate any guidelines. If there are no restrictions on using AI for essay writing, you can use it without any problems.</p>
                    </div>
                </div>

                <div class="question-div dropDownIcon cursor-pointer d-flex-column" id="dropDownIcon_2">
                    <div class="question-top d-flex">
                        <div class="question-title" id="title_dropDownIcon_2">
                            <h3>Is there an AI that writes essays? <span> </span></h3>
                        </div>
                        <div class="drop-icon d-flex-jc-ai">
                            <img id="icon_dropDownIcon_2" src="{{ asset('assets/frontend/image/drop-icon.svg') }}" alt="drop-icon" />
                        </div>
                    </div>
                    <div class="dropdown-content d-none" id="show_dropDownIcon_2">
                        <p>Texty Audio uses modern NLP algorithms to provide valuable information to humans and turn it into an AI that writes essays for you in seconds.</p>
                    </div>
                </div>

                <div class="question-div dropDownIcon cursor-pointer d-flex-column" id="dropDownIcon_3">
                    <div class="question-top d-flex">
                        <div class="question-title" id="title_dropDownIcon_3">
                            <h3>How do you write an AI essay without getting caught? <span> </span></h3>
                        </div>
                        <div class="drop-icon d-flex-jc-ai">
                            <img id="icon_dropDownIcon_3" src="{{ asset('assets/frontend/image/drop-icon.svg') }}" alt="drop-icon" />
                        </div>
                    </div>
                    <div class="dropdown-content d-none" id="show_dropDownIcon_3">
                        <p>To avoid having your essay getting caught as AI, be sure to add some content of your own and also use our “Bypass AI” feature to make the AI undetectable.</p>
                    </div>
                </div>

                <div class="question-div dropDownIcon cursor-pointer d-flex-column" id="dropDownIcon_4">
                    <div class="question-top d-flex">
                        <div class="question-title" id="title_dropDownIcon_4">
                            <h3>How students can write essays online for free? <span> </span></h3>
                        </div>
                        <div class="drop-icon d-flex-jc-ai">
                            <img id="icon_dropDownIcon_4" src="{{ asset('assets/frontend/image/drop-icon.svg') }}" alt="drop-icon" />
                        </div>
                    </div>
                    <div class="dropdown-content d-none" id="show_dropDownIcon_4">
                        <p>Our essay maker is 100% free for students to help them improve their writing skills more effectively and to engage them more deeply with their subjects.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
@endsection