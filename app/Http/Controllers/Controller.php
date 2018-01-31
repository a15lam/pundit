<?php

namespace Pundit\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Pundit\Rating;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function listReviews()
    {
        $reviews = Rating::orderBy('rating', 'desc')->orderBy('created_at', 'desc')->get();

        return view('list', ['reviews' => $reviews]);
    }

    public function newReview(Request $request)
    {
        $data = $request->json()->all();

        $this->validate($request, [
            'fundraiser_name' => 'required|unique:rating,fundraiser_name,null,id,reviewer_email,'.$data['reviewer_email'],
            'rating' => 'required|integer|between:1,5',
            'review' => 'required',
            'reviewer_name' => 'required',
            'reviewer_email' => 'required|email',
        ], [
            'fundraiser_name.unique' => 'You have already posted a review for this fundraiser!'
        ]);

        $data['review_date'] = date('Y-m-d', time());

        Rating::create($data);

        return ['success' => true];
    }
}
