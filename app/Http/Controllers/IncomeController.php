<?php

namespace App\Http\Controllers;

use App\Models\categoryIncome;
use App\Models\income;
use Illuminate\Http\Request;
use App\Http\Controllers\CategoryIncomeController;

class IncomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lsincome = income::all();
        $lscategoryincome = categoryIncome::all();

        return view('income.index')->with('lsincome', $lsincome)
                                        ->with('lscategoryincome', $lscategoryincome);;

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('income.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        $this->validate($request,[
//            'name'=> 'required |min:5|max:500'
//        ]);

        $dateTime = $request->dateTime;
//      $income = $request->income;
        $categoryExpenseld = $request->categoryExpenseld;
        $amount = $request->amount;
//        $note = $request->note;
        $note = $request->input('note');

        $cate =new income();
        $cate ->dateTime = $dateTime;
//        $cate ->income = $income;
        $cate ->categoryExpenseld = $categoryExpenseld;
        $cate ->amount = $amount;
        $cate ->note = $note;
        $cate-> save();
        $request->session()->flash('success', 'Income created sucessfully');
        return redirect(route('income.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\income  $income
     * @return \Illuminate\Http\Response
     */
    public function show(income $income)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\income  $income
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
//        $this->validate($request,[
//            'name'=> 'required |min:5|max:500'
//        ]);
        $dateTime = $request->dateTime;
//      $income = $request->income;
        $categoryExpenseld = $request->categoryExpenseld;
        $amount = $request->amount;
//        $note = $request->note;
        $note = $request->input('note');

        $cate = income::find($id);
        $cate ->dateTime = $dateTime;
//        $cate ->income = $income;
        $cate ->categoryExpenseld = $categoryExpenseld;
        $cate ->amount = $amount;
        $cate ->note = $note;
        $cate-> save();
        $request->session()->flash('success', 'Update sucessfully');
        return redirect(route('income.index'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\income  $income
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, income $income)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\income  $income
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $cate = income::find($id);
        $cate->delete();
        // action([CategoryController::class, 'category.index']);
        //   $cate-> save();
        $request->session()->flash('success', 'Delete sucessfully');
        //  return Redirect::action([CategoryController::class, 'category.index']);
        return redirect(route('income.index'));
    }



    public function search(Request $request){
        $title = $request->input('title');
        if(is_null($title)){
            $lsincome = income::all();
            return view('income.index',compact('lsincome'));
        }else{
            $lsincome = income::all()->where('title',$title);
            return view('income.index',compact('lsincome'));
        }

    }
}
