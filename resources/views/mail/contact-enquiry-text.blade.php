New contact enquiry
Received {{ $enquiry->created_at->timezone('Europe/Berlin')->format('d M Y, H:i') }}

Name: {{ $enquiry->name }}
@if ($enquiry->company)
Company: {{ $enquiry->company }}
@endif
Email: {{ $enquiry->email }}

Message:
{{ $enquiry->message }}

--
StackVera Core GmbH
European IT consultancy for cloud, AI, security and sovereign platforms.
