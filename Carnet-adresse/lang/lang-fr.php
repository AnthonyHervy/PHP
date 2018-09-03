<?php
 
    //START functions.php
        //checkPassword
    define('ERR_PASSWORD_TOSHORT', "Le mot de passe doit contenir au moins 8 caractères");
    define('ERR_PASSWORD_NONUMBER', "Le mot de passe doit contenir au moins 1 chiffre");
    define('ERR_PASSWORD_NOLETTER', "Le mot de passe doit contenir au moins 1 lettre");
        //mailRegister
    define('MES_MAIL_FORVALIDADRESS', "Pour confirmer votre inscription, merci de cliquer sur le lien ci-dessous
    ou le copier/coller dans votre navigateur internet.
    
    ");
    define('MES_HTML_MAIL_FORVALIDADRESS', "Bonjour,<br /><br />Pour confirmer votre inscription à la lettre d'informations, merci de cliquer sur le lien ci-dessous ou le copier/coller dans votre navigateur internet. <br /><br />");
    define('MES_MAIL_SUBJECT', "Carnet d'adresses : confirmez votre inscription");
    //END functions.php

    //START index.php

    define('MES_LOGIN', "S'identifier");
    define('MES_ACCOUNT_CREATION', "Créer un compte");
    define('MES_MAIL_ADR', "Adresse email");
    define('MES_PASSWORD', "Mot de passe");
    define('MES_PASSWORD_CONFIRM', "Confirmation du mot de passe");
    define('MES_REMEMBER_ME', "Se souvenir de moi (not include)");
    define('MES_LOGIN', "S'identifier");
    define('MES_PASSWORD_FORGOT', "Mot de passe oublié ?");
    define('MES_USERNAME', "Nom d'utilisateur");
    define('MES_ACCOUNT_CREATION', "Créer un compte");

        //START Register
            // Errors
    define('ERR_ACCOUNT_CREATION', "Erreur lors de la création du compte");
    define('ERR_REG_USER', "Le nom d'utilisateur est recquis");
    define('ERR_REG_MAIL', "L'adresse e-mail recquise");
    define('ERR_REG_PASSWORD', "Le mot de passe est recquis");
    define('ERR_REG_PASSWORD_CONFIRM', "La confirmation du mot de passe est recquise");
    define('ERR_REG_PASSWORDS_NOTEQUAL', "Le mot de passe et sa vérification ne correspondent pas");
    define('ERR_MAIL_ALREADY_EXIST', "Cette adresse email est déjà utilisée");
    define('ERR_USERNAME_ALREADY_EXIST', "Ce nom d'utilisateur est déjà utilisé");
            // Validate
    define('OK_ACCOUNT_CREATION', "Pour terminer votre inscription, veuillez cliquer sur le lien d'activation envoyé sur l'adresse email ");
        //END Register

        //START Email Link Register Check
    define('OK_MAIL_VERIFICATION', " : l'adresse est maintenant vérifiée, vous pouvez vous connecter.");
    define('ERR_MAIL_VERIFICATION', " : cette clé n'est pas présente dans notre base");
        //END Email Link Register Check

        //START LOGIN
    define('ERR_LOGIN', "Erreur lors de l'authentification : ");
    define('ERR_LOG_MAIL', "L'adresse e-mail recquise");
    define('ERR_LOG_IS_NOT_MAIL', " : n'est pas une adresse email valide");
    define('ERR_LOG_PASSWORD', "Le mot de passe est recquis");
    define('ERR_LOG_NO_MAIL_IN_DATABASE', " : cette adresse email n'est pas enregistrée");
    define('ERR_WRONG_PASSWORD', "Mot de passe erroné");

        //END LOGIN
 
    //END index.php

    //START admin.php
    define('ADM_TITLE', "Dashboard");
    define('MSG_ADM_WELCOME', "Bienvenue dans votre interface de gestion");
    define('MSG_NAME', "Nom d'utilisateur");
    define('MSG_MAIL', "Adresse email");
    define('MSG_NBR_ENTRIES', "Nombre d'entrées");
        // Header.Menu
    define('MSG_ADM_HOME', "Accueil");
    define('MSG_ADM_ADD', "Ajouter une entrée");
    define('MSG_ADM_UPDATE', "Mettre à jour une entrée");
    define('MSG_ADM_DELETE', "Supprimer une entrée");
    define('MSG_ADM_VIEWALL', "Liste des entrées");
    define('MSG_ADM_LOGOUT', "Deconnexion");
        // Add Entry
    define('MSG_ADM_ID', "Id");
    define('MSG_ADM_ADD_PREFIX', "Préfixe");
    define('MSG_ADM_ADD_PREFIX_M', "M");
    define('MSG_ADM_ADD_PREFIX_F', "Mme");
    define('MSG_ADM_ADD_LASTNAME', "Nom");
    define('MSG_ADM_ADD_FIRSTNAME', "Prénom");
    define('MSG_ADM_ADD_ADRESS', "Adresse");
    define('MSG_ADM_ADD_POSTCODE', "Code Postal");
    define('MSG_ADM_ADD_CITY', "Ville");
    define('MSG_ADM_ADD_COUNTRY', "Pays");
    define('MSG_ADM_ADD_PHONENUMBER', "Numéro de téléphone");
    define('MSG_ADM_ADD_ADDBUTTON', "Ajouter");
    define('MSG_ADM_ADD_RESETBUTTON', "Reset");
    define('MSG_ADM_ADD_ENTRY', "L'entrée a bien été ajoutée dans la base");
        // Show Entries
    $fieldlist = ["Id", "Préfixe", "Nom", "Prénom", "Adresse", "Adresse 2", "Code Postal", "Ville", "Pays", "Numéro de téléphone", "Id_User"];
    define('BTN_EXPORT2CSV', "Exporter les données au format CSV");
    define('MSG_ADMIN_THEFILE', "Le fichier");
    define('MSG_ADMIN_DOWNLOAD_OK', "a été généré et téléchargé avec succès");
        // Edit Entries
    define('MSG_ADMIN_UPDATE_BTN', "Modifier");
    define('MSG_ADMIN_SELECT_ENTRY', "Sélectionnez une entrée");
    define('MSG_ADMIN_SELECT_NOENTRY_FOUND', "Aucune entrée trouvée");
    define('MSG_ADMIN_SELECT_CHOOSE', "Selection");
    define('MSG_ADMIN_UPDATE_OK1', "La mise a jour de l'entrée ");
    define('MSG_ADMIN_UPDATE_OK2', " a été effectuée avec succès");
    define('MSG_ADMIN_UPDATE_FAIL', "Erreur : aucun entrée à modifier a été selectionnée");
        // Delete Entry
    define('MSG_ADMIN_DELETE_BTN', "Supprimer");  
    define('MSG_ADMIN_DELETE_FAIL', "Erreur : aucun entrée à supprimer a été selectionnée");
    define('MSG_ADMIN_DELETE_OK', "L'entrée a été supprimée de la base avec succès");    

    //END admin.php



?>
