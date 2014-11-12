MailChimp Sync PrestaShop module
Auteur : Sébastien Jousse
Email : s.jousse@naerys.fr
Site web : http://naerys.fr

FONCTIONNEMENT
Ce module synchronise la liste des abonnés à votre newsletter Prestashop avec une liste d'abonnés MailChimp.
En dehors d'automatiser la mise à jour de votre liste MailChimp et de supprimer la fastidieuse manipulation d'export des abonnés sur PrestaShop puis l'import sur MailChimp, le gros avantage de ce module réside dans sa synchronisation dans les 2 sens :
- PrestaShop avec MailChimp : lors de la création d'un compte client, lors de la modification d'un compte client
- MailChimp avec Prestashop : à de l'abonnement à la newsletter en utilisant le formulaire d'abonnement MailChimp, à la désinscription de la newsletter en cliquant sur le lien de désinscription obligatoirement affiché dans les emails
Cette synchronisation est effectuée en temps réel et ne nécessite pas de tache cron.
Et le petit bonus est l'ajout d'un bloc affichant un lien vers votre formulaire d'inscription MailChimp.
De plus, votre hébergement n'aura pas besoin de l'extension cURL car elle n'est pas utilisée par ce module.

PREREQUIS
Si vous n'en avez pas, vous devez créer un compte MailChimp sur leur site internet : http://mailchimp.com/
Vous pouvez ensuite paramétrer votre compte MailChimp comme vous le souhaitez. La seule condition pour que la synchronisation des abonnés avec PrestaShop fonctionne est de créer une liste : http://eepurl.com/gOHY
Vous aurez ensuite besoin d'une clef API MailChimp. Pour savoir comment la créer, vous pouvez consulter cette page d'aide : http://eepurl.com/im9k

INSTALLATION
Décompresser le fichier "mailchimp.zip" dans un dossier de votre ordinateur.
Copiez le dossier "mailchimp" dans le dossier "modules" de votre installation PrestaShop.
Connectez-vous à l'administration de votre boutique et installez le module "MailChimp Sync" dans l'onglet "Modules", rubrique "Publicité & Marketing".
Si les droits sur le dossier le permettent, l'installation du module va copier le contenu du fichier "Customer.php" dans le dossier "/override/classes/" de votre boutique.

Du fait d'une particularité du thème par défaut de PrestaShop, vous devrez aussi installer le module de base "Bloc newsletter" afin d'activer les inscriptions à la newsletter pour les comptes client.
Il vous faudra ensuite supprimer le bloc maintenant inutile qui apparaît dans la colonne gauche, allez dans l'onglet "Modules > Positions" et supprimez le module "Bloc newsletter".
Selon comment vous avez développé votre propre thème, ces étapes seront peut-être inutiles.

CONFIGURATION
Saisissez d'abord votre clef API MailChimp que vous aurez récupérée auparavant, puis validez
Sélectionnez ensuite la liste d'abonnés MailChimp avec laquelle vous voulez synchroniser celle de PrestaShop, puis validez

Le module ajoute automatiquement dans la colonne gauche de votre boutique un bloc avec lien pour que les internautes puissent s'inscrire à la newsletter.