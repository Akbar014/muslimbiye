<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Password Reset</title>
  <style>
    body {
      margin: 0;
      padding: 0;
      background: #f8fafc;
      font-family: "Inter", Arial, sans-serif;
      color: #222;
      line-height: 1.6;
    }
    .wrapper {
      width: 100%;
      padding: 40px 16px;
      box-sizing: border-box;
    }
    .email {
      max-width: 560px;
      margin: 0 auto;
      background: #fff;
      border-radius: 12px;
      padding: 32px;
      box-shadow: 0 4px 24px rgba(0, 0, 0, 0.06);
    }
    h1 {
      font-size: 24px;
      margin: 0 0 16px;
      color: #111827;
      text-align: center;
    }
    p {
      margin: 0 0 16px;
      font-size: 15px;
    }
    a.button {
      display: inline-block;
      background: linear-gradient(135deg, #2563eb, #3b82f6);
      color: #fff !important;
      padding: 12px 28px;
      border-radius: 8px;
      text-decoration: none;
      font-weight: 600;
      letter-spacing: 0.3px;
      text-align: center;
      transition: background 0.2s ease;
    }
    a.button:hover {
      background: linear-gradient(135deg, #1d4ed8, #2563eb);
    }
    .footer {
      text-align: center;
      margin-top: 32px;
      font-size: 13px;
      color: #6b7280;
    }
  </style>
</head>
<body>
  <div class="wrapper">
    <div class="email">
      <h1>Reset Your Password</h1>
      <p>Hi there,</p>
      <p>
        We received a request to reset your password for your
        <strong>{{ config('app.name', 'muslimbiye') }}</strong> account.
        Click the button below to choose a new password.
      </p>

      <p style="text-align:center;margin:32px 0;">
        <a href="{{ $actionLink }}" class="button">Reset Password</a>
      </p>

      <p>
        If you didn’t request a password reset, please ignore this email — your
        password will remain unchanged.
      </p>

      <div class="footer">
        © {{ date('Y') }} {{ config('app.name', 'muslimbiye') }}. All rights reserved.
      </div>
    </div>
  </div>
</body>
</html>
