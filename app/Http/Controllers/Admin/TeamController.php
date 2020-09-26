<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Team;
use Image;
class TeamController extends Controller {

    public function index(Request $request) {

    $models = Team::sortable()->paginate(20);



        return view('admin.teams.index', compact('models', 'category'));
    }

    public function create() {
        return view('admin.teams.create');
    }

    public function store(Request $request) {
         $request->validate([
            'name' => 'required|max:255',
            'role' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'bio' => 'required',
            'image' => 'required|mimes:jpeg,png,jpg',
        ]);
        try {

            $input = $request->all();
            $image = $request->file('image');
            $input['photo'] = time() . "-" . uniqid() . '.' . $image->getClientOriginalExtension();
            $ogImagePath = public_path('images/teams');
            $img = Image::make($image->getRealPath());
            $img->resize(500, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($ogImagePath . '/' . $input['photo']);
            
            Team::create($input);
            $request->session()->flash('success', 'Teams has been successfully added!');

            return redirect(route('teams.index'));
        } catch (Exception $e) {
            $request->session()->flash('error', 'Oops something went wrong try again !');
        }
    }

    public function show($id) {

        $model = Team::find($id);
        return view('admin.teams.show', ['model' => $model]);
    }

    public function edit($id) {
        $model = Team::find($id);
        return view('admin.teams.edit', compact('model'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'name' => 'required|max:255',
            'role' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'bio' => 'required',
            'image' => 'mimes:jpeg,png,jpg',
        ]);
        try {
            $model = Team::find($id);
            $input = $request->all();
            //pr($request->file('image'));exit;
            $image = $request->file('image');
            if ($image) {
                $input['photo'] = time() . "-" . uniqid() . '.' . $image->getClientOriginalExtension();
                $ogImagePath = public_path('images/teams');
                $img = Image::make($image->getRealPath());
                $img->resize(500, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($ogImagePath . '/' . $input['photo']);
            } else {
                unset($input['image']);
            }
            //pr($model->toarray());exit;
            $model->update($input);
            $request->session()->flash('success', 'Teams has been successfully Updated!');
            return redirect(route('teams.index'));
        } catch (Exception $e) {
            $request->session()->flash('error', 'Oops something went wrong try again !');
        }
    }

    public function destroy($id) {
        $role = Team::findOrFail($id);
        $role->forceDelete();
        return redirect()->back();
    }

}
