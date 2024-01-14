<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    //Show Faq
    public function show()
    {
        return view('faq.faq',
            ['faqs' => Faq::all()]);
    
    }
    //Show Faq Edit
    public function showFaqEdit(Faq $faq){
        return view('faq.faq-edit'
        ,['faq' => $faq]);
    
}
    
    //Update
    public function updateFaq(Request $request, Faq $faq)
    {
        $formFields = $request->validate([
            'question' => 'required',
            'answer' => 'required',
        ]);
        Faq::where('id', $faq->id)
            ->update($formFields);
        return redirect('/faq')->with('message', 'Faq Updated Successfully');
    }
    //Delete
    public function destroyFaq(Faq $faq)
    {
        $faq->delete();
        return redirect('/faq')->with('message', 'Faq Deleted Successfully');
    }
    

}
