<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel='stylesheet' href="{{ asset('css/auth/bootstrap.min.css')}}">
    <style>
        body {
            background-color: #1a3b3a; /* Couleur de fond */
        }

        .card {
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
            border: none;
        }

        .btn-primary {
            background-color: #007b5e; /* Vert pour le bouton */
            border: none;
        }

        .btn-primary:hover {
            background-color: #005946;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">
            <div class="card p-4" style="width: 400px; background-color: #F0F4F8; border-radius: 10px;">
                <h3 class="text-center mb-4">Connexion</h3>
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Adresse Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Entrez votre email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Mot de passe</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Entrez votre mot de passe" required>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <a href="# style="color: #007bff;">Mot de passe oublié ?</a>
                        <button type="submit" class="btn btn-primary">Se connecter</button>
                    </div>
                </form>
                <div class="text-center mt-3">
                    <p>Vous n'avez pas de compte ? <a href="{{ route ('register') }}" style="color: #007bff;">S'inscrire</a></p>
                </div>
            </div>
        </div>
    </div>

</body>
</html>