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
        return view('admin.docteurs.form', ['docteur' => new User(), 'tb_docteur' => new Docteur()]);
    }
    public function store(UserDocteurFormRequest $request)
    {
        $user = User::create([
            'name' => $request->input('name'),
            'matricule' => $request->input('matricule'),
            'postnom' => $request->input('postnom'),
            'prenom' => $request->input('prenom'),
            'adresse' => $request->input('adresse'),
            'telephone' => $request->input('telephone'),
            'sexe' => $request->input('sexe', 'M'),
            'date_de_naissance' => $request->input('date_de_naissance'),
            'role' => 'docteur',
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);
        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $avatarPath = $avatar->store('avatars', 'public');
            $user->avatar = $avatarPath;
            $user->save();
        }
        $docteur = Docteur::create([
            'cnom' => $request->input('cnom'),
            'user_id' => $user->id,
            'specialite' => $request->input('specialite'),
        ]);
        return redirect()->route('admin.docteurs.index')->with('success','Insertion Successfully');
    }
    public function edit(User $docteur)
    {
        $tb_docteur = $docteur->docteur;
        return view('admin.docteurs.form', ['docteur' => $docteur, 'tb_docteur' => $tb_docteur]);
    }
    public function update(UserDocteurFormRequest $request, User $docteur)
    {
        //dd($request->validated());
        $docteur->update([
            'name' => $request->input('name'),
            'matricule' => $request->input('matricule'),
            'postnom' => $request->input('postnom'),
            'prenom' => $request->input('prenom'),
            'adresse' => $request->input('adresse'),
            'telephone' => $request->input('telephone'),
            'sexe' => $request->input('sexe', 'M'),
            'date_de_naissance' => $request->input('date_de_naissance'),
            'role' => 'docteur',
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);
        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $avatarPath = $avatar->store('avatars', 'public');
            $docteur->avatar = $avatarPath;
            $docteur->save();
        }
        $docteurData = $request->only([
            'cnom', 'specialite'
        ]);

        $docteur->docteur()->update($docteurData);
        return redirect()->route('admin.docteurs.index')->with('success','Modified Successfully');
    }
    public function destroy(User $docteur)
    {
        if ($docteur->avatar) {
            Storage::disk('public')->delete($docteur->avatar);
        }
        $docteur->delete();
        return redirect()->route('admin.docteurs.index')->with('success','Suppression Successfully');
    }
}
