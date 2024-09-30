<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kayıt Ol</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 300px;
        }
        h1 {
            text-align: center;
            color: #060606;
        }
        label {
            margin-bottom: 5px;
            display: block;
        }
        input {
            width: 100%;
            padding: 10px;
            margin: 5px 0 20px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }
        button:hover {
            background-color: #45a049;
        }
        .success {
            background-color: green;
            color: white;
            padding: 10px;
            margin-bottom: 20px;
            text-align: center;
            border-radius: 4px;
        }
        .error {
            background-color: red;
            color: white;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 4px;
        }
        ul {
            padding-left: 20px;
            margin: 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Kullanıcı Kaydı</h1>

        <!-- başarı mesajını göster -->
        @if(session('success'))
            <div class="success">
                {{ session('success') }}
            </div>
        @endif

        <!-- hata mesajlarını göster -->
        @if($errors->any())
            <div class="error">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ url('/register') }}" method="POST">
            @csrf
            <label for="name">Ad Soyad:</label>
            <input type="text" name="name" id="name" autocomplete="name" required>

            <label for="email">E-posta:</label>
            <input type="email" name="email" id="email" autocomplete="email" required>

            <label for="password">Şifre:</label>
            <input type="password" name="password" id="password" autocomplete="new-password" required>

            <label for="password_confirmation">Şifre Onayı:</label>
            <input type="password" name="password_confirmation" id="password_confirmation" autocomplete="new-password" required>

            <button type="submit">Kayıt Ol</button>
        </form>
    </div>
</body>
</html>
