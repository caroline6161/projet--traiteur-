public function updateStatus()
{
    if (!isset($_GET['id']) || !isset($_GET['status'])) {
        header("Location: index.php?page=admin-commandes");
        exit;
    }

    $commandeId = $_GET['id'];
    $newStatus = $_GET['status'];

    // Mise à jour du statut
    CommandeModel::updateStatus($commandeId, $newStatus);

    // Récupérer la commande
    $commande = CommandeModel::getOrderById($commandeId);
    $email = $commande['email'];

    // MAILS AUTOMATIQUES SELON LE STATUT
    if ($newStatus === "en_attente_retour_materiel") {

        $subject = "Retour du matériel - Vite & Gourmand";
        $message = "
Bonjour,

Du matériel vous a été prêté pour votre prestation.

Merci de le restituer sous 10 jours ouvrés.
Sans retour dans ce délai, des frais de 600€ seront appliqués (voir CGV).

Pour organiser le retour, merci de contacter notre équipe.

Cordialement,
L'équipe Vite & Gourmand
";

        @mail($email, $subject, $message);
    }

    if ($newStatus === "terminee") {

        $subject = "Votre commande est terminée - Vite & Gourmand";
        $message = "
Bonjour,

Votre commande est maintenant terminée !

Vous pouvez vous connecter à votre compte pour laisser un avis.

Merci pour votre confiance.
";

        @mail($email, $subject, $message);
    }

    header("Location: index.php?page=admin-commandes");
    exit;
}
