<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tack för din förfrågan</title>
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
            padding: 50px 30px;
            text-align: center;
        }

        .email-header h1 {
            font-size: 32px;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .email-body {
            padding: 40px 30px;
        }

        .email-body p {
            margin-bottom: 20px;
            font-size: 16px;
        }

        .highlight-box {
            background-color: #f0f8f0;
            border-left: 4px solid #4CAF50;
            padding: 20px;
            border-radius: 8px;
            margin: 30px 0;
        }

        .contact-info {
            background-color: #f8f9fa;
            padding: 25px;
            border-radius: 8px;
            margin: 30px 0;
        }

        .contact-info h3 {
            color: #4CAF50;
            margin-bottom: 15px;
        }

        .contact-info p {
            margin-bottom: 10px;
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
    </style>
</head>
<body>
<div class="email-container">
    <div class="email-header">
        <h1>✅ Tack för din förfrågan!</h1>
        <p>Vi har mottagit ditt meddelande</p>
    </div>

    <div class="email-body">
        <p>Hej <strong>{{ $submission->first_name }}</strong>,</p>

        <p>Tack för att du kontaktade Edens Gröna! Vi har mottagit din förfrågan och kommer att återkomma till dig så snart som möjligt.</p>

        <div class="highlight-box">
            <p style="margin: 0;"><strong>📋 Din förfrågan:</strong></p>
            <p style="margin: 10px 0 0 0;">{{ Str::limit($submission->help_needed, 200) }}</p>
        </div>

        <p>Vi strävar efter att svara på alla förfrågningar inom 24 timmar under vardagar.</p>

        <div class="contact-info">
            <h3>📞 Behöver du kontakta oss direkt?</h3>
            <p><strong>Telefon:</strong> <a href="tel:{{ app(\App\Settings\ContactSettings::class)->phone }}" style="color: #4CAF50; text-decoration: none;">{{ app(\App\Settings\ContactSettings::class)->phone }}</a></p>
            <p><strong>E-post:</strong> <a href="mailto:{{ app(\App\Settings\ContactSettings::class)->email }}" style="color: #4CAF50; text-decoration: none;">{{ app(\App\Settings\ContactSettings::class)->email }}</a></p>
        </div>

        <p>Med vänliga hälsningar,<br><strong>Edens Gröna</strong></p>
    </div>

    <div class="email-footer">
        <p><strong>Edens Gröna</strong></p>
        <p>Din partner för professionella trädgårdstjänster</p>
        <p style="font-size: 12px; color: #999; margin-top: 15px;">
            © {{ date('Y') }} Edens Gröna. Alla rättigheter förbehållna.
        </p>
    </div>
</div>
</body>
</html>
