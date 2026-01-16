<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales Tracking</title>

    <style>
        /* Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(to right, #1c92d2, #f2fcfe);
        }

        /* Main layout */
        .container {
            display: flex;
            max-width: 1100px;
            width: 95%;
            background: #fff;
            border-radius: 18px;
            overflow: hidden;
            box-shadow: 0 25px 50px rgba(0,0,0,0.18);
        }

        /* LEFT IMAGE SECTION */
        .image-section {
            flex: 1;
            background: url("your-image.jpg") center/cover no-repeat;
            position: relative;
        }

        .image-section::after {
            content: "";
            position: absolute;
            inset: 0;
            background: rgba(0,0,0,0.35);
        }

        .image-text {
            position: relative;
            z-index: 1;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 50px;
            color: #fff;
        }

        .image-text h2 {
            font-size: 36px;
            margin-bottom: 15px;
        }

        .image-text p {
            font-size: 17px;
            line-height: 1.6;
            opacity: 0.95;
        }

        /* RIGHT AUTH SECTION */
        .auth-section {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 40px 30px;
        }

        .card {
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        .card h1 {
            font-size: 32px;
            margin-bottom: 10px;
            color: #222;
        }

        .card p {
            font-size: 16px;
            color: #555;
            margin-bottom: 30px;
        }

        .actions {
            display: flex;
            justify-content: center;
            gap: 15px;
        }

        .btn {
            text-decoration: none;
            padding: 12px 28px;
            border-radius: 8px;
            font-size: 15px;
            font-weight: 600;
            color: #fff;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(0,0,0,0.12);
        }

        .btn-login {
            background: linear-gradient(135deg, #2dda6c, #28b463);
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 22px rgba(0,0,0,0.18);
        }

        .btn-register {
            background: linear-gradient(135deg, #3498db, #2c81c0);
        }

        .btn-register:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 22px rgba(0,0,0,0.18);
        }

        /* RESPONSIVE */
        @media (max-width: 900px) {
            .container {
                flex-direction: column;
            }

            .image-section {
                height: 260px;
            }

            .image-text {
                padding: 30px;
                text-align: center;
            }
        }
    </style>
</head>
<body>

<div class="container">

    <!-- LEFT IMAGE -->
    <div class="image-section">
        <div class="image-text">
            <h2>Petrol Station</h2>
            <p>Smart fuel sales tracking, reporting, and management system for modern stations.</p>
        </div>
    </div>

    <!-- RIGHT AUTH -->
    <div class="auth-section">
        <div class="card">
            <h1>Sales Tracking</h1>
            <p>Secure fuel sales monitoring & management</p>

            <div class="actions">
                <a href="{{ route('login') }}" class="btn btn-login">Login</a>
                <a href="{{ route('register') }}" class="btn btn-register">Register</a>
            </div>
        </div>
    </div>

</div>

</body>
</html>
