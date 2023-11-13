<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PharIo\Manifest\Exception;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $reviews = Review::where('status',1)->paginate(12);
        return view('front.all_reviews',compact('reviews'));
    }
    public function index_dashboard(){
        $reviews = Review::paginate(15);
        return view('reviews.index',compact('reviews'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('reviews.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        try {
            $review = new Review();
            $review->content = $request->content;
            $review->created_by = Auth::user()->id;

            if($review->save()) {
                $this->showSuccessNotification('Review saved successfully');
                return redirect()->route('home')
                    ->with(['success'=> __('global.success_save')]);
            }
            else {
                return redirect()->back()->with(['error'=> __('global.error_save')]);
            }

        }
        catch (\Exception $e){
            return redirect()->route('dashboard.question.index')->
            with(['error'=> __('global.data_error')]);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    private function showSuccessNotification($message)
    {
        // Use PNotify to show a success notification
        echo "<script>
            PNotify.success({
                text: '{$message}',
                delay: 2000 // Milliseconds before the notice closes
            });
        </script>";
    }
    public function changeStatus($id): \Illuminate\Http\RedirectResponse
    {
        try {
            $review = Review::find($id);
            $status = $review->status == 0 ? 1 : 0;

            $review->update(['status' => $status]);

            return redirect()->route('dashboard.review.index')->with(['success'=>__('global.status_changed')]);

        }
        catch (\Exception $e) {

            return redirect()->route('dashboard.review.index')->with(['error'=>__('global.try_again')]);
        }
    }
}
