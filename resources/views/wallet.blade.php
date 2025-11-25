<!DOCTYPE html>
<html>
<head>
    <title>Wallet Demo</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 0;
            padding: 0;
            background: #f7f7f7;
        }

        h1 {
            margin-top: 60px;
            font-size: 32px;
            color: #333;
        }

        .wallet-container {
            margin-top: 40px;
            display: flex;
            justify-content: center;
            gap: 25px;
            flex-wrap: wrap;
        }

        .wallet-btn {
            padding: 15px 30px;
            font-size: 18px;
            font-weight: 600;
            border-radius: 50px;
            border: none;
            cursor: pointer;
            min-width: 220px;
            transition: 0.2s ease;
        }

        /* Apple Wallet Style */
        .apple-btn {
            background: black;
            color: white;
        }
        .apple-btn:hover {
            background: #222;
        }

        /* Google Wallet Style */
        .google-btn {
            background: #4285F4;
            color: white;
        }
        .google-btn:hover {
            background: #2c6fe0;
        }

        /* Responsive */
        @media (max-width: 600px) {
            h1 {
                font-size: 26px;
            }
            .wallet-btn {
                font-size: 16px;
                padding: 12px 25px;
            }
        }
    </style>

</head>

<body>

    <h1>Add to Wallet Demo</h1>

    <div class="wallet-container">
        <a href="{{ route('apple.wallet') }}">
            <button class="wallet-btn apple-btn">Add to Apple Wallet</button>
        </a>

        <a href="{{ route('google.wallet') }}">
            <button class="wallet-btn google-btn">Add to Google Wallet</button>
        </a>
    </div>

</body>
</html>
