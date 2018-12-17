<?php

namespace App\Http\Controllers;
use Auth;
use App\Consultation;
use Illuminate\Http\Request;
use App\Http\Requests\ReCaptchataTestFormRequest;
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

    public function rules()
    {

        return [
            'g-recaptcha-response'=>'required|recaptcha',
            'title' => 'required',
            'body' => 'required'
        ];
    }

    public function store(ReCaptchataTestFormRequest $request) {
//        dd(request());
//        $this->validate();
//        \request(['user_id']) = Auth::id();
//        dd('after val');
        $consultation = new Consultation(\request(['title', 'body']));
        $consultation->user_id = Auth::id();
        $consultation->save();
        return redirect()->home();
    }

    public function list() {
        $cons = Consultation::all()->where('answered', '=', 0);
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
