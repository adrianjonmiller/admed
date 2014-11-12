MailChimp Sync PrestaShop module
Auteur : S�bastien Jousse
Email : s.jousse@naerys.fr
Site web : http://naerys.fr

FONCTIONNEMENT
Ce module synchronise la liste des abonn�s � votre newsletter Prestashop avec une liste d'abonn�s MailChimp.
En dehors d'automatiser la mise � jour de votre liste MailChimp et de supprimer la fastidieuse manipulation d'export des abonn�s sur PrestaShop puis l'import sur MailChimp, le gros avantage de ce module r�side dans sa synchronisation dans les 2 sens :
- PrestaShop avec MailChimp : lors de la cr�ation d'un compte client, lors de la modification d'un compte client
- MailChimp avec Prestashop : � de l'abonnement � la newsletter en utilisant le formulaire d'abonnement MailChimp, � la d�sinscription de la newsletter en cliquant sur le lien de d�sinscription obligatoirement affich� dans les emails
Cette synchronisation est effectu�e en temps r�el et ne n�cessite pas de tache cron.
Et le petit bonus est l'ajout d'un bloc affichant un lien vers votre formulaire d'inscription MailChimp.
De plus, votre h�bergement n'aura pas besoin de l'extension cURL car elle n'est pas utilis�e par ce module.

PREREQUIS
Si vous n'en avez pas, vous devez cr�er un compte MailChimp sur leur site internet : http://mailchimp.com/
Vous pouvez ensuite param�trer votre compte MailChimp comme vous le souhaitez. La seule condition pour que la synchronisation des abonn�s avec PrestaShop fonctionne est de cr�er une liste : http://eepurl.com/gOHY
Vous aurez ensuite besoin d'une clef API MailChimp. Pour savoir comment la cr�er, vous pouvez consulter cette page d'aide : http://eepurl.com/im9k

INSTALLATION
D�compresser le fichier "mailchimp.zip" dans un dossier de votre ordinateur.
Copiez le dossier "mailchimp" dans le dossier "modules" de votre installation PrestaShop.
Connectez-vous � l'administration de votre boutique et installez le module "MailChimp Sync" dans l'onglet "Modules", rubrique "Publicit� & Marketing".
Si les droits sur le dossier le permettent, l'installation du module va copier le contenu du fichier "Customer.php" dans le dossier "/override/classes/" de votre boutique.

Du fait d'une particularit� du th�me par d�faut de PrestaShop, vous devrez aussi installer le module de base "Bloc newsletter" afin d'activer les inscriptions � la newsletter pour les comptes client.
Il vous faudra ensuite supprimer le bloc maintenant inutile qui appara�t dans la colonne gauche, allez dans l'onglet "Modules > Positions" et supprimez le module "Bloc newsletter".
Selon comment vous avez d�velopp� votre propre th�me, ces �tapes seront peut-�tre inutiles.

CONFIGURATION
Saisissez d'abord votre clef API MailChimp que vous aurez r�cup�r�e auparavant, puis validez
S�lectionnez ensuite la liste d'abonn�s MailChimp avec laquelle vous voulez synchroniser celle de PrestaShop, puis validez

Le module ajoute automatiquement dans la colonne gauche de votre boutique un bloc avec lien pour que les internautes puissent s'inscrire � la newsletter.