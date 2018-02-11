<?php namespace App\Http\Controllers;

	use App\Reviews;
	use App\Http\Controllers\Controller;
	use Illuminate\Http\Request;
	use Illuminate\Hashing\BcryptHasher;
	use DB;

	class ReviewsController extends Controller
		{
			//method to create a new review
			public function add(Request $request)
				{
					$review = Reviews::create($request->all());

					return response()->json($review);
				}

			//method to view an review based on the given 'id'
			public function view($id)
				{
					$review = Reviews::find($id);
					return response()->json($review);
				}

			//method to edit an review based on the given 'id'
			public function edit(Request $request, $id)
				{
					$review = Reviews::find($id);
					$review->update($request->all());

					return response()->json($review);
				}

			//method to delete an review based on the given 'id'
			public function delete($id)
				{
					$review = Reviews::find($id);
					$review->delete();

					return response()->json('Removed successfully.');
				}

			//method to display all reviews in the database
			public function allreview()
				{
					// $reviews = Reviews::all();
					$reviews = DB::table('reviews')->get();
					return response()->json($reviews);
				}
		}
 ?>