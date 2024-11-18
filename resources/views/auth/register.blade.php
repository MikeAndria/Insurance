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
            <h3 class="text-center mb-4">Inscription</h3>
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="username" class="form-label">Nom d'utilisateur</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Entrez votre nom d'uitilisateur" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Adresse Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Entrez votre email" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Mot de passe</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder=" Entrez votre mot de passe" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Confirmer le mot de passe</label>
                    <input type="password" class="form-control" id="c_password" name="c_password" placeholder="Entrez à nouveau votre mot de passe" required>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                  
                    <button type="submit" class="btn btn-primary">S'inscrire</button>
                </div>
            </form>
            <div class="text-center mt-3">
                <p>Vous avez déjà un compte ? <a href="{{ route ('login')}}" style="color: #007bff;">Se connecter</a></p>
            </div>
        </div>
    </div>
</div>
</body>
</html>





