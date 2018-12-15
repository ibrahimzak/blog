<?php

namespace App\Http\Controllers;
use Auth;
use App\Consultation;
use Illuminate\Http\Request;

class ConsultationController extends Controller
{
    public function index() {
        return view('consultations.create');
    }

    public function store() {
        $this->validate(request(), [
            'title' => 'required',
            'body' => 'required'
        ]);
//        \request(['user_id']) = Auth::id();
        $consultation = new Consultation(\request(['title', 'body']));
        $consultation->user_id = Auth::id();
        $consultation->save();
        return redirect()->home();
    }
}
