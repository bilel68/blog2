<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Livre;
use App\Genre;
class LivreController extends Controller
{

    public function index()
    {
        $livres = Livre::all();
        return view('livre', ['livres' => $livres]);
    }
  // le construct sert a s'identifier
    public function __construct()
    {
      $this->middleware('auth');
    }
    /* permet de recuperer l'id d'un livre dans la classe livre
     et de retourner la vue livre en affichant la variable livre*/
    public function getOne($id)
    {
      $livre = Livre::find($id);
      return view('livre', ['livre' => $livre]);
    }
    /* la function newlivre permet de creer un nouveau livre
    en recuperant dans la class Genre tous les genres
    creation de deux tableau qui  pour chaque genre ils recuperent l'id et le nom
    Retourne la vue  de deux tableau qui contienent */
    public function newLivreForm()
    {
      $genres = Genre::all();
      $genresArray = Array();
      $genresId = Array();

      foreach ($genres as $genre) {
        $genresId[] = $genre->id;
        $genresArray[$genre->id]= $genre->name;
      }
      return view('newLivre', ['genres' => $genresArray, 'genresId' => $genresId]);
    }
    public function insertOne(Request $request)
    {
      $livre = new Livre;
      $livre->name = $request->name;
      $livre->date = $request->date;
      $livre->save();

      foreach ($request->genres as $key => $value) {
        $existingGenre = Genre::find($value);
        $livre->genres()->attach($existingGenre->id);
      }

      return redirect('/livres');
    }
    public function deleteOne(Request $request, $id)
    {
    Livre::destroy($id);
    return redirect('/livres');
    }
    public function updateOne(Request $request)
    {
      $livre = Livre::find($request->id);
      $livre->name = $request->name;
      $livre->date = $request->date;
      $livre->save();

      if (is_array($request->genres)) {
        $livre->genres()->sync($request->genres);
      }else {
        $livre->genres()->detach();
      }
      return redirect('/livres');
    }
    public function livreUpdate($id)
    {
      $livre = Livre::find($id);
      $genres = Genre::all();
      $genresArray = Array();
      $genresId = Array();

      foreach ($genres as $genre) {
        $genresId[] = $genre->id;
        $genresArray[$genre->id]= $genre->name;
      }
      return view('newLivre', ['updatedLivre' => $livre, 'genres' => $genresArray, 'genresId' => $genresId]);

    }


}
