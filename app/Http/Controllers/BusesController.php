<?php

namespace App\Http\Controllers;

use App\Bus;
use App\BusFeature;
use App\BusImage;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;

class BusesController extends Controller
{
    public function index(Bus $bus)
    {
	    return view('admin.buses.index')->with('buses', $bus->all());
    }

	/**
	 * @param Request $request
	 * @param Bus $bus
	 *
	 * @return \Illuminate\Http\RedirectResponse|string
	 */
	public function saveBus(Request $request, Bus $bus)
	{
		$this->validate($request,
			[
				'name'=>'required',
				'features'=>'required',
				'images'=>'required'
			]);

		$input = $request->only('name');

		$bus = $bus->create($input);

		$bus->bus_features()->attach($request->input('features'));

		$images = $request->images;

		$n_o_i = count($images);

		$destinationPath = null;

		if(App::environment() == 'local')
		{
			$destinationPath = base_path().'/public/images/';
		}elseif(App::environment() == 'production')
		{
			$destinationPath = '/home/twokays/public_html/images/';
		}

		if($request->images)
		{
			for($i=0; $i<$n_o_i; $i++)
			{
				if($images[$i]->isValid())
				{
					$input_name = $request->name;
					$img = $images[$i];
					$file = $img;
					$ext = $file->getClientOriginalExtension();
					$destinationPath = $destinationPath;
					$fileName = str_slug($input_name).'_img_'. $i .'.'. $ext;
					$full_path = '/images/'.$fileName;

					$file->move($destinationPath, $fileName); // uploading file to given path

					BusImage::create(['path'=>$full_path, 'bus_id'=>$bus->id]);
				}
			}
		}

		return redirect()->route('bus_rental_index');
	}

	public function addBus()
	{
		$features = BusFeature::all();
		return view('admin.buses.create')->withFeatures($features);
	}

	public function editBus($id)
	{
		$bus = Bus::find($id);
		$features = BusFeature::all();
		$features_l = $bus->bus_features->lists('id');
//		dd($features_l);
		return view('admin.buses.edit', ['bus'=>$bus, 'features' => $features, 'features_l'=> $features_l]);
	}

	public function deleteBus($id)
	{
		Bus::find($id)->delete();
		return redirect()->route('bus_rental_index');
	}

	public function updateBus(Request $request, $id)
	{

//		dd($request->all());
		$this->validate($request, [
			'name'=>'required',
			'images'=>'required',
			'features'=>'required'
		]);
		$bus = Bus::find($id);

		$bus->update($request->only('name'));
		$bus->bus_features()->sync($request->input('features'));

		$images = $request->images;

		$n_o_i = count($images);

//		dd($n_o_i, $images);

		$destinationPath = null;

		if(App::environment() == 'local')
		{
			$destinationPath = base_path().'/public/images/';
		}elseif(App::environment() == 'production')
		{
			$destinationPath = '/home/twokays/public_html/images/';
		}

		for($i = 0; $i < $n_o_i; $i++)
		{
			if($images[$i]->isValid())
			{
				$img = $images[$i];
				$file = $img;
				$ext = $file->getClientOriginalExtension();
				$destinationPath = $destinationPath;
				$fileName = str_slug($request->name).'_img_'. $i .'.'. $ext;
				$full_path = '/images/'.$fileName;

				$file->move($destinationPath, $fileName); // uploading file to given path

				$bus->bus_images()->update(['path'=> $full_path]);

//				$tcl = BusImage::where('bus_id', $bus->id)->where('path', $full_path)->first();
//
//				$tcl->update(['path'=>$full_path]);
			}
		}

		return redirect()->route('bus_rental_index');
	}
}
