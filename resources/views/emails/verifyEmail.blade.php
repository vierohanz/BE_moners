<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Moners</title>
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
                    <h2 style="color: #B100FF; font-size: 20px;">Hi , {{ $user->name }}</h2>

                    <p style="margin-top: 10px; font-size: 16px; color: #4a5568; line-height: 1.5;">
                        Welcome to Moners! You’re already on your way to simplifying your financial management. We've
                        designed a platform that makes managing finances easier and more efficient than ever. If you
                        have any questions, feel free to reach out, <a href="#"
                            style="color: #B100FF; text-decoration: none; font-weight: bold;">please get in touch</a>.
                    </p>


                    <!-- Verify Email Button -->
                    <div style="text-align: center; margin-top: 30px;">
                        <a href='{{ $url }}'
                            style="display: inline-block; padding: 12px 24px; background-color: #B100FF; color: #ffffff; border-radius: 8px; font-size: 16px; text-decoration: none; font-weight: bold; transition: background-color 0.3s;">
                            Verify Your Email
                        </a>
                    </div>

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
