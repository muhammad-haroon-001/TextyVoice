@component('mail::message')
# Contact Form Submission

You have received a new message from the contact form.

**Name:** {{ $contact['name'] }}

**Email:** {{ $contact['email'] }}

**Message:**  
{{ $contact['message'] }}

Thanks,  
{{ config('app.name') }}
@endcomponent