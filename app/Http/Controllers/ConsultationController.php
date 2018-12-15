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

    public function __construct()
    {
        $this->middleware('auth:admin')->except('store', 'index', 'userConsultations');
        $this->middleware('auth')->except('list', 'answer', 'show');
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

    public function list() {
        $cons = Consultation::all()->where('answered', '=', 0)->reverse();
        return view('dashboard.consultations.index', compact('cons'));
    }

    public function answer(Consultation $consultation) {

        $this->validate(request(), [
            'answer' => 'required'
        ]);
        $data = request()->all();
        $consultation->answer = $data['answer'];
        $consultation->answered = 1;
        $consultation->save();
        return redirect('/consultations');
    }

    public function show(Consultation $consultation) {
        return view('dashboard.consultations.show', compact('consultation'));
    }

    public function userConsultations() {
        $cons = Consultation::all()->where('user_id', '=', Auth::id())->reverse();
        return view('consultations.user_consultations', compact('cons'));

    }
}
