public function register()
{
    // Champs obligatoires
    $required = ['prenom','nom','email','telephone','adresse','ville','pays','password','password_confirm','rgpd'];
    foreach ($required as $field) {
        if (empty($_POST[$field])) {
            $error = "Tous les champs sont obligatoires.";
            include 'src/views/auth/register.php';
            return;
        }
    }

    // Vérification RGPD (plus clair)
    if (!isset($_POST['rgpd'])) {
        $error = "Vous devez accepter la politique de confidentialité.";
        include 'src/views/auth/register.php';
        return;
    }

    $prenom    = trim($_POST['prenom']);
    $nom       = trim($_POST['nom']);
    $email     = trim($_POST['email']);
    $telephone = trim($_POST['telephone']);
    $adresse   = trim($_POST['adresse']);
    $ville     = trim($_POST['ville']);
    $pays      = trim($_POST['pays']);
    $password  = $_POST['password'];
    $password2 = $_POST['password_confirm'];

    // Email valide ?
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Email invalide.";
        include 'src/views/auth/register.php';
        return;
    }

    // Mots de passe identiques ?
    if ($password !== $password2) {
        $error = "Les mots de passe ne correspondent pas.";
        include 'src/views/auth/register.php';
        return;
    }

    // Mot de passe sécurisé
    $pattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{10,}$/';
    if (!preg_match($pattern, $password)) {
        $error = "Mot de passe trop faible (10 caractères, maj, min, chiffre, spécial).";
        include 'src/views/auth/register.php';
        return;
    }

    // Email déjà utilisé ?
    if (UserModel::emailExists($email)) {
        $error = "Un compte existe déjà avec cet email.";
        include 'src/views/auth/register.php';
        return;
    }

    // Hash du mot de passe
    $hash = password_hash($password, PASSWORD_DEFAULT);

    // Création utilisateur
    $userId = UserModel::createUser([
        'prenom'    => $prenom,
        'nom'       => $nom,
        'email'     => $email,
        'telephone' => $telephone,
        'adresse'   => $adresse,
        'ville'     => $ville,
        'pays'      => $pays,
        'password'  => $hash,
        'role'      => 'utilisateur'
    ]);

    if (!$userId) {
        $error = "Erreur lors de la création du compte.";
        include 'src/views/auth/register.php';
        return;
    }

    // Mail de bienvenue
    $subject = "Bienvenue chez Vite & Gourmand";
    $message = "
Bonjour $prenom,

Votre compte a bien été créé.

Vous pouvez maintenant vous connecter et passer vos commandes.

À très vite,
L'équipe Vite & Gourmand
";
    @mail($email, $subject, $message);

    header("Location: index.php?page=login&register=ok");
    exit;
}
