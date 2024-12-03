<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <style>
        :root {
            --bg-color-light: #f7fafc;
            --text-color-light: #1a202c;
            --card-bg-color-light: #ffffff;
            --input-bg-color-light: #ffffff;
            --border-color-light: #e2e8f0;
            --button-bg-color-light: #B100FF;
            --button-text-color-light: #ffffff;

            --bg-color-dark: #1a202c;
            --text-color-dark: #f7fafc;
            --card-bg-color-dark: #2d3748;
            --input-bg-color-dark: #2d3748;
            --border-color-dark: #4a5568;
            --button-bg-color-dark: #B100FF;
            --button-text-color-dark: #ffffff;
        }

        /* Default to light mode */
        body {
            background-color: var(--bg-color-light);
            color: var(--text-color-light);
            font-family: Arial, sans-serif;
            transition: background-color 0.3s, color 0.3s;
        }

        table {
            max-width: 700px;
            margin: 0 auto;
            background-color: var(--card-bg-color-light);
            padding: 20px;
            border-radius: 8px;
            transition: background-color 0.3s;
        }

        input {
            width: 100%;
            padding: 10px;
            border: 1px solid var(--border-color-light);
            border-radius: 6px;
            font-size: 16px;
            color: var(--text-color-light);
            background-color: var(--input-bg-color-light);
            transition: background-color 0.3s, border-color 0.3s, color 0.3s;
        }

        button {
            display: inline-block;
            padding: 12px 24px;
            background-color: var(--button-bg-color-light);
            color: var(--button-text-color-light);
            border-radius: 8px;
            font-size: 16px;
            font-weight: bold;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s, color 0.3s;
        }

        /* Dark Mode Styles (will be applied when user's device prefers dark mode) */
        @media (prefers-color-scheme: dark) {
            body {
                background-color: var(--bg-color-dark);
                color: var(--text-color-dark);
            }

            table {
                background-color: var(--card-bg-color-dark);
            }

            input {
                background-color: var(--input-bg-color-dark);
                border-color: var(--border-color-dark);
                color: var(--text-color-dark);
            }

            button {
                background-color: var(--button-bg-color-dark);
                color: var(--button-text-color-dark);
            }
        }
    </style>
</head>

<body>
    <!-- Main Section -->
    <table>
        <tr>
            <td>
                <header style="text-align: center;">
                    <a href="#">
                        <img src="https://i.imgur.com/yM4JiDF.png" alt="Moners" style="width: auto; height: 60px;">
                    </a>
                </header>

                <main style="margin-top: 20px;">
                    <h2 style="color: inherit; font-size: 20px; text-align: center;">Reset Your Password</h2>

                    <p style="margin-top: 10px; font-size: 16px; line-height: 1.5; text-align: center;">
                        Please enter your new password below to reset your account.
                    </p>

                    <form action="{{ url('api/reset-password') }}" method="POST" style="margin-top: 20px;">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">

                        <div style="margin-bottom: 15px;">
                            <label for="password" style="display: block; font-size: 16px; margin-bottom: 5px;">New
                                Password:</label>
                            <input type="password" name="password" id="password" required>
                        </div>

                        <div style="margin-bottom: 15px;">
                            <label for="password_confirmation"
                                style="display: block; font-size: 16px; margin-bottom: 5px;">Confirm New
                                Password:</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" required>
                        </div>

                        <div style="text-align: center; margin-top: 20px;">
                            <button type="submit">Reset Password</button>
                        </div>
                    </form>

                    <p style="margin-top: 20px; font-size: 16px; text-align: center;">
                        If you did not request this, you can safely ignore this email.
                    </p>
                </main>
            </td>
        </tr>
    </table>

</body>

</html>
