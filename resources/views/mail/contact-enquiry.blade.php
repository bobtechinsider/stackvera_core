@php
    $brandPurple = '#6304ec';
    $brandPurpleDark = '#5505c8';
    $brandCyan = '#00dffe';
    $brandNavy = '#112138';
    $bodyFont = "'Montserrat', 'Satoshi', Arial, Helvetica, sans-serif";
    $headingFont = "'Satoshi', 'Montserrat', Arial, Helvetica, sans-serif";
@endphp
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="x-apple-disable-message-reformatting">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>New contact enquiry</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://api.fontshare.com/v2/css?f[]=satoshi@700,500,900,400&display=swap" rel="stylesheet">
</head>
<body style="margin:0; padding:0; width:100%; background-color:#f4f5f7; -webkit-font-smoothing:antialiased; font-family:{{ $bodyFont }};">
    <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:#f4f5f7;">
        <tr>
            <td align="center" style="padding:32px 16px;">
                <table role="presentation" width="600" cellpadding="0" cellspacing="0" border="0" style="width:600px; max-width:600px; background-color:#ffffff; border-radius:16px; overflow:hidden; box-shadow:0 1px 24px -12px rgba(17,33,56,0.35);">
                    <tr>
                        <td style="height:4px; background-color:{{ $brandPurple }}; background-image:linear-gradient(90deg, {{ $brandPurple }}, {{ $brandCyan }}); line-height:4px; font-size:0;">&nbsp;</td>
                    </tr>

                    <tr>
                        <td align="center" style="padding:36px 40px 12px 40px;">
                            <img src="{{ asset('images/stackvera-logo-email.png') }}" alt="StackVera Core" width="220" style="display:block; width:220px; max-width:60%; height:auto; border:0;">
                        </td>
                    </tr>

                    <tr>
                        <td style="padding:8px 40px 0 40px;">
                            <h1 style="margin:0; font-family:{{ $headingFont }}; font-size:22px; font-weight:700; color:{{ $brandNavy }};">New contact enquiry</h1>
                            <p style="margin:8px 0 0 0; font-size:14px; line-height:22px; color:rgba(17,33,56,0.6);">
                                Someone reached out through the StackVera Core website on {{ $enquiry->created_at->timezone('Europe/Berlin')->format('d M Y, H:i') }}.
                            </p>
                        </td>
                    </tr>

                    <tr>
                        <td style="padding:24px 40px 8px 40px;">
                            <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" style="border:1px solid #e7e8ec; border-radius:12px;">
                                <tr>
                                    <td style="padding:16px 20px; border-bottom:1px solid #f0f1f4;">
                                        <p style="margin:0 0 2px 0; font-size:11px; font-weight:600; letter-spacing:0.08em; text-transform:uppercase; color:{{ $brandPurple }};">Name</p>
                                        <p style="margin:0; font-size:15px; color:{{ $brandNavy }};">{{ $enquiry->name }}</p>
                                    </td>
                                </tr>
                                @if ($enquiry->company)
                                    <tr>
                                        <td style="padding:16px 20px; border-bottom:1px solid #f0f1f4;">
                                            <p style="margin:0 0 2px 0; font-size:11px; font-weight:600; letter-spacing:0.08em; text-transform:uppercase; color:{{ $brandPurple }};">Company</p>
                                            <p style="margin:0; font-size:15px; color:{{ $brandNavy }};">{{ $enquiry->company }}</p>
                                        </td>
                                    </tr>
                                @endif
                                <tr>
                                    <td style="padding:16px 20px;">
                                        <p style="margin:0 0 2px 0; font-size:11px; font-weight:600; letter-spacing:0.08em; text-transform:uppercase; color:{{ $brandPurple }};">Email</p>
                                        <p style="margin:0; font-size:15px;">
                                            <a href="mailto:{{ $enquiry->email }}" style="color:{{ $brandPurpleDark }}; text-decoration:none;">{{ $enquiry->email }}</a>
                                        </p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <tr>
                        <td style="padding:16px 40px 8px 40px;">
                            <p style="margin:0 0 8px 0; font-size:11px; font-weight:600; letter-spacing:0.08em; text-transform:uppercase; color:{{ $brandPurple }};">Message</p>
                            <div style="padding:18px 20px; background-color:#f7f7fa; border-radius:12px; font-size:15px; line-height:24px; color:{{ $brandNavy }}; white-space:pre-wrap;">{{ $enquiry->message }}</div>
                        </td>
                    </tr>

                    <tr>
                        <td align="center" style="padding:24px 40px 36px 40px;">
                            <a href="mailto:{{ $enquiry->email }}" style="display:inline-block; padding:14px 32px; background-color:{{ $brandPurple }}; color:#ffffff; font-family:{{ $headingFont }}; font-size:15px; font-weight:700; text-decoration:none; border-radius:999px;">Reply to {{ $enquiry->name }}</a>
                        </td>
                    </tr>
                </table>

                <table role="presentation" width="600" cellpadding="0" cellspacing="0" border="0" style="width:600px; max-width:600px;">
                    <tr>
                        <td align="center" style="padding:24px 40px;">
                            <p style="margin:0; font-size:12px; line-height:20px; color:rgba(17,33,56,0.45);">
                                StackVera Core GmbH &middot; European IT consultancy for cloud, AI, security and sovereign platforms.
                            </p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
