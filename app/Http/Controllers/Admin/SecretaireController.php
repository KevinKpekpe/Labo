<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserFormRequest;
use App\Mail\InscriptionMail;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class SecretaireController extends Controller
{
    public function index()
    {
        return view('admin.secretaires.index', ['secretaires' => User::where('role', '=', 'secretaire')->get()]);
    }
    public function create()
    {
        return view('admin.secretaires.form', ['secretaire' => new User()]);
    }
    public function store(UserFormRequest $request)
    {
        DB::beginTransaction();
        try{
            $user = User::create([
                'name' => $request->input('name'),
                'matricule' => $request->input('matricule'),
                'postnom' => $request->input('postnom'),
                'prenom' => $request->input('prenom'),
                'adresse' => $request->input('adresse'),
                'telephone' => $request->input('telephone'),
                'sexe' => $request->input('sexe', 'M'), // Par défaut, 'M' si le champ est vide
                'date_de_naissance' => $request->input('date_de_naissance'),
                'role' => 'secretaire', // Rôle par défaut "secretaire"
                'email' => $request->input('email'),
                'password' => bcrypt($request->input('password')),
            ]);
            if ($request->hasFile('avatar')) {
                $avatar = $request->file('avatar');
                $avatarPath = $avatar->store('avatars', 'public');
                $user->avatar = $avatarPath;
                $user->save();
            }
            $info = [
                "name" => $request->input('name'),
                "email" => $request->input('email'),
                "password" => $request->input('password'),
            ];
            Mail::to($request->input('email'))->send(new InscriptionMail($info));
            DB::commit();
            return redirect()->route('admin.secretaires.index');
        }catch(Exception $e){
            DB::rollback();
            return redirect()->back()->with('error', 'Une erreur s\'est produite lors de la création de l\'utilisateur. Veuillez réessayer.');
        }
    }
    public function edit(User $secretaire)
    {
        return view('admin.secretaires.form', ['secretaire' => $secretaire]);
    }
    public function update(UserFormRequest $request, User $secretaire)
    {
        $data = [
            'name' => $request->input('name'),
            'matricule' => $request->input('matricule'),
            'postnom' => $request->input('postnom'),
            'prenom' => $request->input('prenom'),
            'adresse' => $request->input('adresse'),
            'telephone' => $request->input('telephone'),
            'sexe' => $request->input('sexe', 'M'),
            'date_de_naissance' => $request->input('date_de_naissance'),
            'role' => 'secretaire',
            'email' => $request->input('email'),
        ];

        if ($request->filled('password')) {
            $data['password'] = bcrypt($request->input('password'));
        }
    if ($request->hasFile('avatar')) {
        $avatar = $request->file('avatar');
        $avatarPath = $avatar->store('avatars', 'public');
        $data['avatar'] = $avatarPath;
        if ($secretaire->avatar) {
            Storage::disk('public')->delete($secretaire->avatar);
        }
    }
        //dd($data);
        $secretaire->update($data);

        // Retourner une réponse ou rediriger l'utilisateur

        // Exemple de redirection vers une route nommée "home"
        return redirect()->route('admin.secretaires.index');
    }
    public function destroy(User $secretaire)
    {
        //dd($secretaire);
        // Supprimer la photo de l'utilisateur s'il en a une
        if ($secretaire->avatar) {
            Storage::disk('public')->delete($secretaire->avatar);
        }

        // Supprimer l'utilisateur de la base de données
        $secretaire->delete();

        // Retourner une réponse ou rediriger l'utilisateur

        // Exemple de redirection vers une route nommée "home"
        return redirect()->route('admin.secretaires.index');
    }
}
