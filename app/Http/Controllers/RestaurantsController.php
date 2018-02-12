<?php namespace App\Http\Controllers;

	use App\Restaurants;
	use App\Menus;
	use App\Reviews;
	use App\Users;
	use App\Http\Controllers\Controller;
	use Illuminate\Http\Request;
	use Illuminate\Hashing\BcryptHasher;
	use DB;

	class RestaurantsController extends Controller
		{
			//method to create a new restaurant
			public function add(Request $request)
				{
					$restaurant = Restaurants::create($request->all());

					return response()->json($restaurant);
				}

			//method to view an restaurant based on the given 'id'
			public function view($id)
				{
					$score = 0;
					$price = 0;
					$user_count = 0;

					$restaurant = Restaurants::find($id);
					$reviews = Reviews::where('id_res', $id)->get();
					$menus = Menus::where('id_res', $id)->get();
					foreach ($reviews as $rev) 
						{
							$score += $rev['score'];
							$reviews[$user_count]->name = Users::find($rev->id_user)->name;  
							$user_count++;
						}

					foreach ($menus as $menu)
						{
							$price += $menu['price'];
						}

					$score = $score / count($reviews);
					$price = $price / count($menus);

					$restaurant->avg_rating = $score;
					$restaurant->avg_cost = $price;
					$restaurant->menus = $menus;
					$restaurant->reviews = $reviews;

					return response()->json($restaurant);
				}

			//method to edit an restaurant based on the given 'id'
			public function edit(Request $request, $id)
				{
					$restaurant = Restaurants::find($id);
					$restaurant->update($request->all());

					return response()->json($restaurant);
				}

			//method to delete an restaurant based on the given 'id'
			public function delete($id)
				{
					Menus::where('id_res', $id)->delete();
					Reviews::where('id_res', $id)->delete();
					Restaurants::find($id)->delete();

					return response()->json('Removed successfully.');
				}

			//method to display all restaurants in the database
			public function allrestaurant()
				{
					// $restaurants = restaurants::all();
					$restaurants = DB::table('restaurants')->get();
					return response()->json($restaurants);
				}
		}
 ?>