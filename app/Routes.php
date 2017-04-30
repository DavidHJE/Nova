<?php
/**
 * Routes - all standard Routes are defined here.
 *
 * @author David Carr - dave@daveismyname.com
 * @author Virgil-Adrian Teaca - virgil@giulianaeassociati.com
 * @version 3.0
 */


/** Define static routes. */

// The default Routing
Route::get('/', 'Chansons@index');

//Route::get('subpage', 'Welcome@subPage');
//Route::get('test', 'Welcome@test');
//Route::get('login', 'Welcome@login');

Route::post('creechanson', 'Chansons@creechanson');
Route::post('playlist/cree', 'Chansons@creeplaylist');

Route::get('formulaire/music', 'Chansons@formmudic');

Route::get('utilisateur/{id}', 'Chansons@compte') -> where('id', '[0-9]+');

Route::get('addtoplaylist/{plid}/{chid}', 'Chansons@addtoplaylist') -> where('plid', '[0-9]+') -> where('chid', '[0-9]+');
/** End default Routes */
