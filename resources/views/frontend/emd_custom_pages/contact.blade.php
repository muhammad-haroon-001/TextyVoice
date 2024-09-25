@extends('layouts.frontend.main')
@section('title', @$content->page_title->value)
@section('content')
    <div class="container">
        <div class="contact_us d-flex-jc-ai-g d-flex-column">
            <div class="top_badge">
                <span>{{ @$content->badge_heading->value }}</span>
            </div>
            <div class="top_heading">
                <h3>{{ @$content->main_heading->value }}</h3>
                <h3>{{ @$content->get_in_touch->value }}</h3>
            </div>
        </div>

        <form id="form-element" action="{{ route('contact.store') }}" method="POST">
            <div class="contact-form d-flex-column">
                <div class="messages">
                    <div class="alert alert-danger" id="fail"><strong class="fail_error"></strong><span
                            class="fail_message"></span></div>
                    <div class="alert alert-success" id="success"><strong class="success_data"></strong><span
                            class="success_message"></span></div>
                </div>
                <div class="d-flex-column">
                    <label for="name">{{ @$content->name_label->value }}</label>
                    <input type="text" name="name" id="name"
                        placeholder="{{ @$content->name_placeholder->value }}" />
                </div>
                <div class="d-flex-column">
                    <label for="email">{{ @$content->email_label->value }}</label>
                    <input class="bg-white" type="text" name="email" id="email"
                        placeholder="{{ @$content->email_placeholder->value }}" />
                </div>
                <div class="d-flex-column">
                    <label for="message">{{ @$content->message_label->value }}</label>
                    <textarea name="message" id="message" placeholder="{{ @$content->message_placeholder->value }}"></textarea>
                </div>
                <div class="d-flex terms">
                    <label class="checkbox-label">
                        <input type="checkbox" class="toggle-checkbox">
                        <div class="toggle-switch"></div>
                    </label>
                    <p>{{ @$content->term_condition->value }}</p>
                </div>
                <button type="submit" class="btn-generate btn-11 d-flex-jc-ai-g" id="contactus">
                    <p>{{ @$content->submit_btn->value }}</p>
                </button>
            </div>
        </form>
    </div>
@endsection
@push('script')
    <script src="{{ asset('assets/frontend/js/contact.js') }}?v={{ config('setting_key.project_version') }}"></script>
@endpush
