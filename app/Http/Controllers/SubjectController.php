<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tutor;
use App\Models\Subject;

class SubjectController extends Controller
{
    public function dashboard() {
        if (Tutor::check()) {
            return view('dashboard', ['listSubjects' => Subject::all()]);
        }
        return redirect("login")->withSuccess('You do not have a access!');
    }

    public function saveSubject(Request $request) {
        echo json_encode($request->all());
        $newSubject = new Subject();
        $newSubject->title = $request->title;
        $newSubject->description = $request->description;
        $newSubject->price = $request->price;
        $newSubject->learning_hours = $request->learning_hours;
        $newSubject->save();
        return redirect('dashboard')->with('success', 'Data saved successfully.')->withErrors('fail', 'Data failed to save!');
    }

    public function markDelete($id) {
        $listSubject = Subject::find($id);
        $listSubject->delete();
        return redirect('dashboard');
    }

    public function markUpdate($id, Request $request) {
        $listSubject = Subject::find($id);
        $listSubject->title = $request->title;
        $listSubject->description = $request->description;
        $listSubject->price = $request->price;
        $listSubject->learning_hours = $request->learning_hours;
        $listSubject->update();
        return redirect('dashboard');
    }
}
