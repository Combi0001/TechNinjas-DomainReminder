<html>
    <head>
        <title>Verify account</title>
    </head>
    <body>
        <h1>Click the link to verify your email</h1>

        click the following link to verify your email
        {{ route('verify', ['token' => $user->email_token]) }}
    </body>
</html>