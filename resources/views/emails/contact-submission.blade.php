<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ny kontaktförfrågan</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f4f4f4;
            padding: 20px;
        }

        .email-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .email-header {
            background: linear-gradient(135deg, #4CAF50 0%, #388E3C 100%);
            color: white;
            padding: 40px 30px;
            text-align: center;
        }

        .email-header h1 {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .email-header p {
            font-size: 16px;
            opacity: 0.95;
        }

        .email-body {
            padding: 40px 30px;
        }

        .info-section {
            margin-bottom: 30px;
        }

        .info-section h2 {
            color: #4CAF50;
            font-size: 20px;
            font-weight: 700;
            margin-bottom: 15px;
            padding-bottom: 10px;
            border-bottom: 2px solid #4CAF50;
        }

        .info-row {
            display: flex;
            padding: 12px 0;
            border-bottom: 1px solid #f0f0f0;
        }

        .info-row:last-child {
            border-bottom: none;
        }

        .info-label {
            font-weight: 600;
            color: #555;
            min-width: 150px;
            flex-shrink: 0;
        }

        .info-value {
            color: #333;
            flex-grow: 1;
        }

        .badge {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: 600;
        }

        .badge-new {
            background-color: #FFF3CD;
            color: #856404;
        }

        .badge-private {
            background-color: #D1ECF1;
            color: #0C5460;
        }

        .badge-company {
            background-color: #D4EDDA;
            color: #155724;
        }

        .message-box {
            background-color: #f8f9fa;
            border-left: 4px solid #4CAF50;
            padding: 20px;
            border-radius: 8px;
            margin-top: 10px;
        }

        .attachments-list {
            list-style: none;
            padding: 0;
            margin-top: 10px;
        }

        .attachments-list li {
            background-color: #f8f9fa;
            padding: 12px 15px;
            margin-bottom: 8px;
            border-radius: 6px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .attachment-icon {
            font-size: 20px;
        }

        .email-footer {
            background-color: #f8f9fa;
            padding: 30px;
            text-align: center;
            border-top: 1px solid #e0e0e0;
        }

        .email-footer p {
            color: #666;
            font-size: 14px;
            margin-bottom: 10px;
        }

        .btn {
            display: inline-block;
            padding: 12px 30px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 50px;
            font-weight: 600;
            margin-top: 15px;
        }

        .btn:hover {
            background-color: #388E3C;
        }

        @media only screen and (max-width: 600px) {
            .email-body {
                padding: 20px;
            }

            .info-row {
                flex-direction: column;
            }

            .info-label {
                min-width: auto;
                margin-bottom: 5px;
            }
        }
    </style>
</head>
<body>
<div class="email-container">
    <!-- Header -->
    <div class="email-header">
        <h1>🌿 Ny Kontaktförfrågan</h1>
        <p>Mottagen {{ $submission->created_at->format('Y-m-d H:i') }}</p>
    </div>

    <!-- Body -->
    <div class="email-body">
        <!-- Status Badge -->
        <div style="text-align: center; margin-bottom: 30px;">
            <span class="badge badge-new">📩 Ny förfrågan</span>
        </div>

        <!-- Contact Information -->
        <div class="info-section">
            <h2>👤 Kontaktinformation</h2>
            <div class="info-row">
                <span class="info-label">Namn:</span>
                <span class="info-value"><strong>{{ $submission->full_name }}</strong></span>
            </div>
            <div class="info-row">
                <span class="info-label">E-post:</span>
                <span class="info-value">
                    <a href="mailto:{{ $submission->email }}" style="color: #4CAF50; text-decoration: none;">
                        {{ $submission->email }}
                    </a>
                </span>
            </div>
            <div class="info-row">
                <span class="info-label">Telefon:</span>
                <span class="info-value">
                    <a href="tel:{{ $submission->phone }}" style="color: #4CAF50; text-decoration: none;">
                        {{ $submission->phone }}
                    </a>
                </span>
            </div>
            <div class="info-row">
                <span class="info-label">Kundtyp:</span>
                <span class="info-value">
                    <span class="badge {{ $submission->customer_type === 'private' ? 'badge-private' : 'badge-company' }}">
                        {{ $submission->customer_type === 'private' ? '👤 Privatperson' : '🏢 Företag/Bostadsrättsförening' }}
                    </span>
                </span>
            </div>
        </div>

        <!-- Address Information -->
        <div class="info-section">
            <h2>📍 Adress</h2>
            <div class="info-row">
                <span class="info-label">Gatuadress:</span>
                <span class="info-value">{{ $submission->address }}</span>
            </div>
            <div class="info-row">
                <span class="info-label">Stad:</span>
                <span class="info-value">{{ $submission->city }}</span>
            </div>
            <div class="info-row">
                <span class="info-label">Postnummer:</span>
                <span class="info-value">{{ $submission->postal_code }}</span>
            </div>
        </div>

        <!-- Request Details -->
        <div class="info-section">
            <h2>📝 Förfrågan</h2>
            <div class="info-row">
                <span class="info-label">Behöver hjälp med:</span>
            </div>
            <div class="message-box">
                {{ $submission->help_needed }}
            </div>
        </div>

        @if($submission->measurements)
            <div class="info-section">
                <h2>📏 Mått</h2>
                <div class="message-box">
                    {{ $submission->measurements }}
                </div>
            </div>
        @endif

        @if($submission->message)
            <div class="info-section">
                <h2>💬 Ytterligare meddelande</h2>
                <div class="message-box">
                    {{ $submission->message }}
                </div>
            </div>
        @endif

        <!-- Attachments -->
        @if($submission->hasMedia('attachments'))
            <div class="info-section">
                <h2>📎 Bifogade filer ({{ $submission->getMedia('attachments')->count() }})</h2>
                <ul class="attachments-list">
                    @foreach($submission->getMedia('attachments') as $media)
                        <li>
                            <span class="attachment-icon">
                                {{ str_contains($media->mime_type, 'pdf') ? '📄' : '🖼️' }}
                            </span>
                            <span style="flex-grow: 1;">
                                <strong>{{ $media->file_name }}</strong>
                                <br>
                                <small style="color: #666;">{{ number_format($media->size / 1024, 2) }} KB</small>
                            </span>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Action Button -->
        <div style="text-align: center; margin-top: 40px;">
            <a href="{{ config('app.url') }}/admin/contact-submissions/{{ $submission->id }}/edit" class="btn">
                Visa i Admin Panel
            </a>
        </div>
    </div>

    <!-- Footer -->
    <div class="email-footer">
        <p><strong>Edens Gröna</strong></p>
        <p>Detta är ett automatiskt meddelande från din webbplats kontaktformulär.</p>
        <p style="font-size: 12px; color: #999; margin-top: 15px;">
            © {{ date('Y') }} Edens Gröna. Alla rättigheter förbehållna.
        </p>
    </div>
</div>
</body>
</html>
