<?php

namespace App\Http\Controllers\API;



use Illuminate\Http\Request;
use App\Models\Quiz; // Importa el modelo Quiz
use App\Http\Controllers\Controller;


class QuizApiController extends Controller
{
    public function index()
    {
        $quizs =  Quiz::all();
        return response()->json($quizs, 200);
    }

    

    public function store(Request $request)
    {
        $quizs = new Quiz();
        $quizs->Titulo= $request->Titulo;
        $quizs->Duracion= $request->Duracion;
        $quizs->Pregunta= $request->Pregunta;
        $quizs->Respuesta1= $request->Respuesta1;
        $quizs->Respuesta2= $request->Respuesta2;
        $quizs->Respuesta3= $request->Respuesta3;
        $quizs->Respuesta4= $request->Respuesta4;
        $quizs->save();
        return response()->json($quizs, 200);
        //return redirect()->route('quizs.index');
    }


    public function update(Request $request, $id){
        $quizs = Quiz::find($id);
        $quizs->Duracion= $request->Duracion;
        $quizs->Pregunta= $request->Pregunta;
        $quizs->Respuesta1= $request->Respuesta1;
        $quizs->Respuesta2= $request->Respuesta2;
        $quizs->Respuesta3= $request->Respuesta3;
        $quizs->Respuesta4= $request->Respuesta4;
        $quizs->save();
        return response()->json($user);
        

    }

    public function destroy($id)
    {
        $quizs = Quiz::find($id);
        $quizs ->delete();
        return response()->json($quizs);
        
    }
}
