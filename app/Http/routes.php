<?php



//Route::get('/', function () {
//    return view('welcome');
//});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {

//    Route::get('user/{id}', function ($id) {
//        return 'User '.$id;
//    });

    Route::post('ola', 'HomeController@uploadFile');

    Route::get('/proof/{uuid}/{file_id}', 'HomeController@showSonChallenge');
    Route::post('/vote/proof/{file_id}', 'HomeController@likeFile');
    Route::post('/delete/proof/{file_id}', 'HomeController@deleteProof');
    Route::get('challenge-proofs/{id}', 'HomeController@getSonChallenges');

    Route::get('/user/{name}', 'SocialAuthController@createTemp');
    Route::get('/missing', 'SocialAuthController@missingFB');
    Route::post('/missing', 'SocialAuthController@saveMissingFB');


    Route::get('private-policy', 'HomeController@privatePolicy');
    Route::get('contact-us', 'HomeController@contact');
    Route::post('contact-us', 'HomeController@storeContact');
    Route::get('HIO-Mission', 'HomeController@mission');

    Route::get('challenges/{category?}', 'HomeController@showChallenges');
    Route::get('terms', 'HomeController@terms');

    Route::get('/auth/logout', 'SocialAuthController@logout');
    Route::get('/auth/facebook', 'SocialAuthController@redirectToProvider');
    Route::get('/auth/facebook/callback', 'SocialAuthController@handleProviderCallback');
    Route::get('/', 'HomeController@home');

    Route::get('latest', 'HomeController@latestChallenges');
    Route::get('most-viewed', 'HomeController@mostViewed');
    Route::get('most-participants', 'HomeController@mostParticipants');

    Route::get('challenge/{uuid}/{secret?}', 'HomeController@challengeDetail');

    Route::get('ended-challenges/{id}', 'HomeController@getUserEndedChallenges');
    Route::get('my-challenges/{id}', 'HomeController@getUserCreatedChallenges');
    Route::get('ongoing-challenges/{id}', 'HomeController@getUserOngoingChallenges');
    Route::get('ended-challenges', 'HomeController@getEndedChallenges');
    Route::get('ongoing-challenges', 'HomeController@getOngoingChallenges');


    Route::get('search', 'HomeController@search');
    Route::get('users/search', 'HomeController@searchUsers');

    Route::auth();
    Route::get('user/activation/{token}', 'Auth\AuthController@activateUser')->name('user.activate');

    Route::post('register-brand', 'Auth\AuthController@registerBrand');

    Route::group(['middleware' => 'auth'], function () {

        Route::post('join/{uuid}', 'HomeController@joinChallenge');
//        Route::post('vote/{uuid}', 'HomeController@voteChallenge');

        Route::get('new/challenge/{userFB?}', 'HomeController@createChallenge');
        Route::post('new/challenge', 'HomeController@storeChallenge');
        Route::get('profile/{id}', 'HomeController@userProfile');
        Route::get('profile/me/edit', 'HomeController@editProfile');
        Route::post('profile/me/edit', 'HomeController@post_editProfile');
        Route::post('challenge/{uuid}/close', 'HomeController@closeChallenge');
        Route::get('challenges/{uuid}/edit', 'HomeController@editChallenge');
        Route::post('challenges/{uuid}/edit', 'HomeController@editStoreChallenge');

        Route::get('friends', 'HomeController@getFriends');
        Route::get('friends/search', 'HomeController@searchFriend');
        Route::post('friend', 'HomeController@sendFriendAction');



        Route::get('list', 'HomeController@listFriends');
        Route::get('notifications', 'HomeController@getNotifications');
        Route::get('notifications/{id}', 'HomeController@markRead');


        Route::get('teste', 'HomeController@teste');
        Route::get('amigos', 'SocialAuthController@getFriends');
    });

});


//$this->get('login', 'AuthController@showLoginForm');
//$this->post('login', 'AuthController@login');
//$this->get('logout', 'AuthController@logout');

//Route::get('/home', 'UserAuthController@index');
//Route::get('login', 'SocialAuthController@showLoginForm');
//Route::post('login', 'UserAuthController@login');
//Route::get('logout', 'UserAuthController@logout');
//Route::get('register', 'UserAuthController@showRegistrationForm');
//Route::post('register', 'UserAuthController@register');
//
//// Password Reset Routes...
//Route::get('password/reset/{token?}', 'Auth\PasswordController@showResetForm');
//Route::post('password/email', 'Auth\PasswordController@sendResetLinkEmail');
//Route::post('password/reset', 'Auth\PasswordController@reset');