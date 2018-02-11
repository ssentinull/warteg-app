<?php namespace App\Http\Controllers;

	use App\Menus;
	use App\Http\Controllers\Controller;
	use Illuminate\Http\Request;
	use Illuminate\Hashing\BcryptHasher;
	use DB;

	class MenusController extends Controller
		{
			//method to create a new menu
			public function add(Request $request)
				{
					$menu = Menus::create($request->all());

					return response()->json($menu);
				}

			//method to view an menu based on the given 'id'
			public function view($id)
				{
					$menu = Menus::find($id);
					return response()->json($menu);
				}

			//method to edit an menu based on the given 'id'
			public function edit(Request $request, $id)
				{
					$menu = Menus::find($id);
					$menu->update($request->all());

					return response()->json($menu);
				}

			//method to delete an menu based on the given 'id'
			public function delete($id)
				{
					$menu = Menus::find($id);
					$menu->delete();

					return response()->json('Removed successfully.');
				}

			//method to display all menus in the database
			public function allmenu()
				{
					// $menus = Menus::all();
					$menus = DB::table('menus')->get();
					return response()->json($menus);
				}
		}
 ?>