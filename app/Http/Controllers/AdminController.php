<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Metodo per visualizzare la dashboard Admin
    public function dashboard()
    {
    // Racchiudo tutti gli utenti con stato null in variabili di appoggio per poterli successivamente rendere admin revisor e scrittore
        $adminRequests = User::where('is_admin', null)->get();
        $revisorRequests = User::where('is_revisor', null)->get();
        $writerRequests = User::where('is_writer', null)->get();
        return view('admin.dashboard', compact('adminRequests', 'revisorRequests', 'writerRequests'));
    }

    // Metodo per cambiare lo stato di un utente da null a true , in base al ruolo
    public function setAdmin(User $user)
    {
        $user->is_admin = true;
        $user->save();
        return redirect(route('admin.dashboard'))->with('message', "Hai reso $user->name amministratore");
    }

    public function setRevisor(User $user)
    {
        $user->is_revisor = true;
        $user->save();
        return redirect(route('admin.dashboard'))->with('message', "Hai reso $user->name revisore");
    }
    public function setWriter(User $user)
    {
        $user->is_writer = true;
        $user->save();
        return redirect(route('admin.dashboard'))->with('message', "Hai reso $user->name scrittore");
    }

    // Metodo per modificare un tag
    public function editTag(Request $request, Tag $tag)
    {

        $request->validate([
            'name' => 'required|unique:tags',
        ]);

        $tag->update([
            'name' => strtolower($request->name),
        ]);

        return redirect()->back()->with('message', 'Tag modificato correttamente');
    }

    // Metodo per eliminare un tag
    public function deleteTag(Tag $tag)
    {

        foreach ($tag->articles as $article) {
            $article->tags()->detach($tag);
        }

        $tag->delete();

        return redirect()->back()->with('message', 'Tag eliminato correttamente');
    }

    // Metodo per modificare una categoria
    public function editCategory(Request $request, Category $category)
    {

        $request->validate([
            'name' => 'required|unique:categories',
        ]);

        $category->update([
            'name' => strtolower($request->name),
        ]);

        return redirect()->back()->with('message', 'Categoria modificato correttamente');
    }

    // Metodo per eliminare un categoria
    public function deleteCategory(Category $category)
    {

        foreach ($category->articles as $article) {
            $article->tags()->detach($category);
        }

        $category->delete();

        return redirect()->back()->with('message', 'Categoria eliminato correttamente');
    }

    public function storeCategory(Request $request)
    {
        Category::create([
            'name' => strtolower($request->name),
        ]);

        return redirect()->back()->with('message', 'Categoria aggiunta correttamente');
    }
}
