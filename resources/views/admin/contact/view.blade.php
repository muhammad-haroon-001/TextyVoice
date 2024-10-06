@extends('layouts/adminLayout')
@section('title', 'Contact Details')
@section('content')
    <section class="contact-detail py-5">
        <div class="container">
            <div class="white-bg p-4 shadow-sm rounded">
                <div class="blog-page-heading mb-4">
                    <h3 class="mb-5">Contact Details</h3>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <strong>Name:</strong> <span class="text-capitalize">{{ $contact->name }}</span>
                        </div>
                        <div class="col-md-6">
                            <strong>Email:</strong> <span>{{ $contact->email }}</span>
                        </div>
                    </div>
                    <div class="message-detail">
                        <strong>Message:</strong>
                        <p class="mt-2">{{ $contact->message }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection