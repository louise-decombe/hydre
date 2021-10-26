# librairie_hydre_a_mille_tetes

Ce projet n'a pas été aboutis mais il a été présenté pour l'obtention de mon titre de développeur web (titre RNCP).

Réalisation d'un site de e-commerce pour la librairie de l'Hydre aux mille tête.

Boutique en ligne avec système de Click and Collect, outils de paiement Stripe et de Mailing avec Mailjet.

Blog et présentation d'événements.

# Pré requis

1. PHP >= 7.4
2. SQL
3. Composer
4. Symfony 5.3


# Installation

1. Clonez le dépôt
2. Rendez vous dans le dossier
3. Ouvrez le projet
4. Installez les dépendances avec `` composer install ``
5. Lancez les migrations en tapant  `` php bin/console doctrine:migrations:migrate ``
6. Lancez les fixtures en tapant  `` php bin/console doctrine:fixtures:load ``
7. Lancez le serveur avec `` php bin/console server:run ``


## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details
