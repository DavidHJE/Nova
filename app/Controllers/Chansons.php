<?php
/**
 * Chansons controller
 *
 * @author David Carr - dave@novaframework.com
 * @version 3.0
 */

namespace App\Controllers;

use App\Core\Controller;
use App\Models\Chanson;

use App\Models\Playlist;
use App\Modules\Users;

use Nova\Support\Facades\Auth;
use Nova\Support\Facades\Redirect;
use Nova\Support\Facades\Input;
use Nova\Support\Facades\Request;

use View;


/**
 * Sample controller showing 2 methods and their typical usage.
 */
class Chansons extends Controller {

    /**
     * Create and return a View instance.
     */
    public function index() {
    	if(Auth::id() == false)
            return Redirect::to('/login');

    	$all = Chanson::all();
    	if (Auth::id()) 
    	    //$playlists = Playlist::whereRaw('utilisateur_id=?', array(Auth::id()))->get();
             $playlists = Playlist::all();
    	else
    	    $playlists = false;

        return View::make('Chansons/Home')
            ->shares('title', __('Accueil'))
            ->with('all', $all)
            ->with('playlists', $playlists);
    }


    public function creechanson() { 
        if (Auth::id() == false) {
            return Redirect::to('/login');
        }

        if (Input::has('nom') &&
            Input::has('style') &&
            Input::hasFile('chanson') &&
            Input::file('chanson')->isValid()) {
                $file = str_replace(' ', '', Input::file('chanson')->getClientOriginalName());
                $f = Input::file("chanson")->move("assets/chansons/".Auth::user()->username, $file);
                echo "<script>console.log($f);</script>";

                $c = new Chanson();
                $c->nom = Input::get('nom');
                $c->style = Input::get('style');
                $c->fichier ="/".$f;
                $c->utilisateur_id = Auth::id();
                $c->duree="";
                $c-> post_date = date('Y-m-d h:i:s');
                echo "<script>console.log($c);</script>";
                $c->save();

        }

/*        if(\Nova\Support\Facades\Request::ajax()) {
            $all = Chanson::whereRaw('utilisateur_id=?', array(Auth::id()))->get();
            return View::fetch('Chansons/LesChansons', array('all'=>$all));
            return Input::get('nom');
        }*/
        

        //return Redirect::to('/');
    }

    public function creeplaylist() {
        if(Auth::id() == false)
                return Redirect::to('/login');

        if (Input::has('playlist')) {
            $p = new Playlist();
            $p->nom =Input::get('playlist');
            $p ->utilisateur_id = Auth::id();
            $p ->save();
        }

        if(\Nova\Support\Facades\Request::ajax()) {
            //$playlists = Playlist::whereRaw('utilisateur_id=?', array(Auth::id()))->get();
            $playlists = Playlist::all();
            return View::fetch('Chansons/Playlist', array('playlists'=>$playlists));
    	}
            
        return Redirect::to('/');
	}

    public function compte($id) {
        if(Auth::id() == false)
            return Redirect::to('/login');

        $chansons = Chanson::whereRaw('utilisateur_id=?',array($id))->get();
        $playlist = Playlist::whereRaw('utilisateur_id=?', array($id))->get();
        return View::make('Chansons/Compte')
            ->shares('title', __('Votre Compte'))
            ->with('all', $chansons)
            ->with('playlists', $playlist);
    }

    public function addtoplaylist($plid,$chid){
        $pl = Playlist::find($plid);
        $pl->chansons()->attach($chid);
    }

    public function formmudic() {
        if(Auth::id() == false)
            return Redirect::to('/login');

        return View::make('Chansons/Formaddmusic')
        ->shares('title', __('Ajout music'));
    }
}
