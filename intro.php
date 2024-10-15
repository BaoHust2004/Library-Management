<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Html Generated</title>
    <meta name="description" content="Figma htmlGenerator">
    <meta name="author" content="htmlGenerator">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Inria+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Inter&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Inika&display=swap" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to bottom right, rgba(223, 235, 246, 1), rgba(255, 255, 255, 1));
            margin: 0;
            font-family: 'Inria Sans', sans-serif;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            position: relative;
            color: rgba(41, 53, 60, 1);
        }
        .container {
            width: 80vw;
            max-width: 600px;
            height: auto;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 40px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 15px;
        }
        .title {
            font-size: 3rem;
            margin-bottom: 40px; 
            font-family: 'Inika', serif;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1);
        }
        .buttons {
            display: flex;
            justify-content: center;
            gap: 2rem;
            margin-top: 40px;
        }
        .button {
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
            background-color: rgba(68, 87, 109, 1);
            width: 150px;
            height: 50px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.3s;
        }
        .button:hover {
            background-color: rgba(50, 70, 90, 1);
            transform: translateY(-2px);
        }
        .button span {
            color: rgba(230, 230, 230, 1);
            font-family: 'Inter', sans-serif;
            font-size: 1.5rem;
        }
        .footer {
            color: rgba(41, 53, 60, 1);
            position: absolute;
            bottom: 20px;
            font-size: 1rem;
            text-align: center;
        }
    </style>
    <script>
        function redirectToLogin() {
            window.location.href = 'http://localhost/webqltv/login.php';
        }

        function redirectToSignUp() {
            window.location.href = 'http://localhost/webqltv/signup.php';
        }
    </script>
</head>
<body>
    <div class="container">
        <span class="title">BKM LIBRARY</span>
        <div class="buttons">
            <div class="button" onclick="redirectToLogin()">
                <span>LOG IN</span>
            </div>
            <div class="button" onclick="redirectToSignUp()">
                <span>SIGN UP</span>
            </div>
        </div>
    </div>
    <span class="footer">Library Management System by Group 13</span>
</body>
</html>
