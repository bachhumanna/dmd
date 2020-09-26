<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\EmailTemplate;
use App\Http\Requests\EmailTemplateUpdate;

class EmailTemplateController extends Controller {

    public function index(Request $request) {

        $query = EmailTemplate::query();
         
        $models = $query->orderBy('id', 'DESC')->paginate(20);


        return view('admin.email-template.index', compact('models'));
    }

    public function create(Request $request) {
        $request->session()->flash('error', 'Action not allow!');
        return redirect()->back();
        $category = BlogCategory::all()->pluck('title', 'id');
        return view('admin.email-template.create', compact('category'));
    }

    public function store(Request $request) {
        
        $request->session()->flash('error', 'Action not allow!');
        return redirect()->back();
        try {

            $input = $request->all();
            Blogs::create($input);
            $request->session()->flash('success', 'Email Template has been successfully added!');

            return redirect(route('email-template.index'));
        } catch (Exception $e) {
            $request->session()->flash('error', 'Oops something went wrong try again !');
        }
    }

    public function show($id) {

        $model = EmailTemplate::find($id);
        return view('admin.email-template.show', ['model' => $model]);
    }

    public function edit($id) {
        $model = EmailTemplate::find($id);
        return view('admin.email-template.edit', compact('model'));
    }

    public function update(EmailTemplateUpdate $request, $id) {
        try {
            $model = EmailTemplate::find($id);
            $input = $request->all();
            $model->update($input);
            $request->session()->flash('success', 'Email Template has been successfully Updated!');
            return redirect(route('email-template.index'));
        } catch (Exception $e) {
            $request->session()->flash('error', 'Oops something went wrong try again !');
        }
    }

    public function destroy($id) {
        $request->session()->flash('error', 'Action not allow!');
        return redirect()->back();
        $role = EmailTemplate::findOrFail($id);
        $role->forceDelete();
        return redirect()->back();
    }

}
