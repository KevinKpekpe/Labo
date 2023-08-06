<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserDocteurFormRequest;
use App\Http\Requests\UserFormRequest;
use App\Models\Docteur;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DocteurController extends Controller
{
    public function index()
    {
        return view('admin.docteurs.index', ['docteurs' => User::where('role', '=', 'docteur')->get()]);
    }
    public function create()
    {
        return view('admin.docteurs.form', ['docteur' => new User()]);
    }
    public function store(UserDocteurFormRequest $request)
    {
        //dd($request->validated());
        // Les données ont été validées, vous pouvez les utiliser pour créer un nouvel utilisateur
        $user = User::create([
            'name' => $request->input('name'),
            'matricule' => $request->input('matricule'),
            'postnom' => $request->input('postnom'),
            'prenom' => $request->input('prenom'),
            'adresse' => $request->input('adresse'),
            'telephone' => $request->input('telephone'),
            'sexe' => $request->input('sexe', 'M'), // Par défaut, 'M' si le champ est vide
            'date_de_naissance' => $request->input('date_de_naissance'),
            'role' => 'docteur', // Rôle par défaut "docteur"
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);

        // Gérer le téléchargement de l'avatar s'il est présent
        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $avatarPath = $avatar->store('avatars', 'public');
            $user->avatar = $avatarPath;
            $user->save();
        }

        // Ajouter l'utilisateur à la table "docteurs"
        $docteur = Docteur::create([
            'cnom' => $request->input('cnom'),
            'user_id' => $user->id,
            'specialite' => $request->input('specialite'),
        ]);

        // Retourner une réponse ou rediriger l'utilisateur

        // Exemple de redirection vers une route nommée "home"
        return redirect()->route('admin.docteurs.index');
    }
    public function edit(User $docteur)
    {
        return view('admin.docteurs.form', ['docteur' => $docteur]);
    }
    public function update(UserFormRequest $request, User $docteur)
    {

        // Les données ont été validées, vous pouvez les utiliser pour mettre à jour l'utilisateur existant
        $data = [
            'name' => $request->input('name'),
            'matricule' => $request->input('matricule'),
            'postnom' => $request->input('postnom'),
            'prenom' => $request->input('prenom'),
            'adresse' => $request->input('adresse'),
            'telephone' => $request->input('telephone'),
            'sexe' => $request->input('sexe', 'M'), // Par défaut, 'M' si le champ est vide
            'date_de_naissance' => $request->input('date_de_naissance'),
            'role' => 'docteur', // Rôle par défaut "docteur"
            'email' => $request->input('email'),
        ];

        if ($request->filled('password')) {
            $data['password'] = bcrypt($request->input('password'));
        }

        // Gérer le téléchargement de la nouvelle photo de profil
    if ($request->hasFile('avatar')) {
        $avatar = $request->file('avatar');
        $avatarPath = $avatar->store('avatars', 'public');
        $data['avatar'] = $avatarPath;

        // Supprimer l'ancienne photo de profil de l'utilisateur s'il en a une
        if ($docteur->avatar) {
            Storage::disk('public')->delete($docteur->avatar);
        }
    }
        //dd($data);
        $docteur->update($data);

        // Retourner une réponse ou rediriger l'utilisateur

        // Exemple de redirection vers une route nommée "home"
        return redirect()->route('admin.docteurs.index');
    }
    public function destroy(User $docteur)
    {
        //dd($docteur);
        // Supprimer la photo de l'utilisateur s'il en a une
        if ($docteur->avatar) {
            Storage::disk('public')->delete($docteur->avatar);
        }

        // Supprimer l'utilisateur de la base de données
        $docteur->delete();

        // Retourner une réponse ou rediriger l'utilisateur

        // Exemple de redirection vers une route nommée "home"
        return redirect()->route('admin.docteurs.index');
    }
}
