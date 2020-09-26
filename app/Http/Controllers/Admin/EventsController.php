<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Events;
use Illuminate\Support\Facades\Validator;

class EventsController extends Controller {

    public function index(Request $request) {

        $userType=Auth::user()->user_type;

        //$models = Events::whereNull('franchisees_id')->where("event_for",$userType)->paginate(20);

        $models = Events::where('event_for',6)->orWhere("event_for",$userType)->Sortable()->paginate(20);
        return view('admin.events.index', compact('models'));
    }

    public function create(Request $request) {

        return view('admin.events.create');
    }

    public function store(Request $request) {
        try {
            $this->validate($request, [
                'title' => 'required',
                'description' => 'required',
                'posted_date' => 'required',
            ]);
            Events::create();
            $model = new Events($request->all());
            $model->users_id = Auth::user()->id;
            if (isSuperAdmin()) {
                $model->franchisees_id = selectedFranchisees();
            } else {
                $model->franchisees_id = Auth::user()->franchisees_id;
            }
            $model->save();
            ///Events::create($request->all());
            $request->session()->flash('success', 'Events has been successfully added!');

            return redirect(route('events.index'));
        } catch (Exception $e) {
            $request->session()->flash('error', 'Oops something went wrong try again !');
        }
    }

    public function show($id) {

        $model = Events::find($id);
        return view('admin.events.show', ['model' => $model]);
    }

    public function edit($id) {
        $model = Events::find($id);
        return view('admin.events.edit', compact('model'));
    }

    public function update(Request $request, $id) {
        try {
            $this->validate($request, [
                'title' => 'required',
                'description' => 'required',
                'posted_date' => 'required',
            ]);
            $model = Events::find($id);
            $input = $request->all();
            $model->update($input);
            $request->session()->flash('success', 'Events has been successfully Updated!');
            return redirect(route('events.index'));
        } catch (Exception $e) {
            $request->session()->flash('error', 'Oops something went wrong try again !');
        }
    }

    public function destroy($id) {
//        $request->session()->flash('error', 'Action not allow!');
//        return redirect()->back();
        $role = Events::findOrFail($id);
        $role->delete();

        \Session::flash('success', 'Event has been successfully deleted!');
        //return redirect()->back();
        echo true;
    }

    public function details(Request $request, $id) {

        $model = Events::findOrFail($id);
        return view('admin.events.details', compact('model'));
    }

}
