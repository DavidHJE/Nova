<?php
/**
 * Welcome controller
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
//use Symfony\Component\Console\Imput\Input;

use View;


/**
 * Sample controller showing 2 methods and their typical usage.
 */
class Welcome extends Controller
{

    /**
     * Create and return a View instance.
     */
    public function index()
    {
        $message = __('Hello, welcome from the welcome controller! <br/>
this content can be changed in <code>/app/Views/Welcome/Welcome.php</code>');

        return View::make('Welcome/Welcome')
            ->shares('title', __('Welcome'))
            ->with('welcomeMessage', $message);
    }

    /**
     * Create and return a View instance.
     */
    public function subPage()
    {
        $message = __('Hello, welcome from the welcome controller and subpage method! <br/>
This content can be changed in <code>/app/Views/Welcome/SubPage.php</code>');

        return $this->getView()
            ->shares('title', __('Subpage'))
            ->withWelcomeMessage($message);
    }

        public function test()
    {
        $message = __('Hello');

        return View::make('Welcome/untruc')
            ->shares('title', __('Test'))
            ->withWelcomeMessage($message);
    }

    public function chanson()
    {
        $all = Chanson::all();
        if (Auth::id()) 
            $playlists = Playlist::whereRaw('utilisateur_id=?', array(Auth::id()))->get();
        else
            $playlists = false;

        return View::make('Welcome/Chanson')
            ->shares('title', __('Chansons'))
            ->with('all', $all)
            ->with('playlists', $playlists);
    }

    public function add()
    {
        return View::make('Welcome/Addfile')
            ->shares('title', __('Ajouter'));
        
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

                $c = new Chanson();
                $c->nom = Input::get('nom');
                $c->style = Input::get('style');
                $c->fichier ="/".$f;
                $c->utilisateur_id = Auth::id();
                $c->duree="";
                $c-> post_date = date('Y-m-d h:i:s');
                $c->save();
                return Redirect::to('/chanson');
        }
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

            if (Request::ajax()) {
                console.log("ok");
            }

            return Redirect::to('/chanson');
    }
}
