# CheatSheets Laravel 6

  ## Création de l'api

    ### Créer un modèle :
      - php artisan make:model {nameofmodel}  -m
      - ça créé un fichier {nameofmodel}.php et je lui indique : sa table, ses fillable, ses hidden etc...
      - dans database/migration j'indique les différents champs de ma table dans la bdd
      - ensuite je fais un php artisan migrate ()
      
    ### Création des routes :
      - php artisan make:controller {Apiname}
      - app\http\controllers écriture des fonctions qui vont me donner ce que je veux de la bdd
      - api.php création des routes ex: Route::get('articles', 'ApiController@getAllArticles');


  ## Création du système d'authentification / Oauth2

    ### Système login / register :
       - composer require laravel/ui -dev
       - php artisan ui vue --auth 
       - npm i
       - npm run dev
       - php artisan migrate
       - php artisan serve

    ### Mise en place de l'oauth2 :
      - Route::middleware('auth:api')->get('user', function (Request $request) {return $request->user();});
      - composer require laravel/passport
      - auth.php | 'api' => ['driver' => 'passport']
      - php artisan migrate
      - php artisan passport:install
      - User.php | use Laravel\Passport\HasApiTokens; | in User class |  use Notifiable, HasApiTokens;
      - AuthServiceProvider.php | dans la fonction boot | Passport::routes();
      - php artisan route:list (pour vérifier que ça à bien fonctionné)
      - php artisan vendor:publish --tag=passport-components
      - resources/assets/js/app.js copy / paste "Vue.component" https://laravel.com/docs/5.4/passport#frontend-quickstart
      - npm run dev 
      - home.blade.php import components :
        <passport-clients></passport-clients> 
        <passport-authorized-clients></passport-authorized-clients> 
        <passport-personal-access-tokens></passport-personal-access-tokens>
      - app.blade.php remplacer asset par mix dans les balises <link> et <script> pour src
      - npm run dev