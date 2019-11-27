# CheatSheets Laravel :

  # Créer un modèle :
    - php artisan make:model {nameofmodel}  -m
    - ça créé un fichier {nameofmodel}.php et je lui indique : sa table, ses fillable, ses hidden etc...
    - dans database/migration j'indique les différents champs de ma table dans la bdd
    - ensuite je fais un php artisan migrate ()
  
  # Création des routes :
    - php artisan make:controller {Apiname}
    - app\http\controllers écriture des fonctions qui vont me donner ce que je veux de la bdd
    - api.php création des routes ex: Route::get('articles', 'ApiController@getAllArticles');