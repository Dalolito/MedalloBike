<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReviewRequest;
use App\Models\Review;
use Illuminate\Http\RedirectResponse;

class ReviewController extends Controller
{
    public function save(ReviewRequest $request): RedirectResponse
    {

        Review::create($request->validated());

        return back()->with('success', __('messages.success.review_created'));

    }
}
