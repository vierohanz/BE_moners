<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
</head>

<body style="background-color: #f7fafc; color: #1a202c; font-family: Arial, sans-serif;">

    <!-- Main Section -->
    <table style="max-width: 700px; margin: 0 auto; background-color: #ffffff; padding: 20px; border-radius: 8px;">
        <tr>
            <td>
                <header style="text-align: center;">
                    <a href="#">
                        <img src="https://i.imgur.com/yM4JiDF.png" alt="Moners" style="width: auto; height: 60px;">
                    </a>
                </header>

                <main style="margin-top: 20px;">
                    <h2 style="color: #B100FF; font-size: 20px;">Hi, {{ $user->name }}</h2>

                    <p style="margin-top: 10px; font-size: 16px; color: #4a5568; line-height: 1.5;">
                        We received a request to reset your password. Click the button below to reset your password:
                    </p>

                    <!-- Reset Password Button -->
                    <div style="text-align: center; margin-top: 30px;">
                        <a href="{{ $resetUrl }}"
                            style="display: inline-block; padding: 12px 24px; background-color: #B100FF; color: #ffffff; border-radius: 8px; font-size: 16px; text-decoration: none; font-weight: bold; transition: background-color 0.3s;">
                            Reset Password
                        </a>
                    </div>

                    <p style="margin-top: 20px; font-size: 16px; color: #4a5568;">
                        If you did not request a password reset, you can safely ignore this email.
                    </p>

                    <p style="margin-top: 20px; font-size: 16px; color: #4a5568;">
                        Thanks, <br>
                        CEO of Moners
                    </p>
                    <br>
                    <p style="margin-top: 20px; font-size: 16px; color: #4a5568;">Rais Hannan Rizanto</p>
                </main>
            </td>
        </tr>
    </table>

</body>

</html>
