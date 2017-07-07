<?php

namespace App\Http\Controllers;

use App\Http\Requests\StationRequest;
use App\Http\Requests;
use Request;

use App\Workstation;
use App\Mo_item;
use \App\Error;

use View;

class WorkStationController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}
	
	public function editWorkStation($w_id)
	{
		$num=Error::where('r_status','=',0)->count();
		$notification=Error::all();
		$station=Workstation::where('w_id', $w_id)->firstOrFail();
		return View::make('parm',['station'=>$station,'notification'=>$notification,'num'=>$num]);
	}

	public function addWorkStation(StationRequest $request, $w_id)
	{
		$station=Workstation::where('w_id',$w_id)->first();
		$station->fill($request->all());
		$station->save();

		return redirect()->back();
	}

	public function updateTemp()
	{
		$w_id=Request::get('w_id');
		$temp=Request::get('temp');

		$station=Workstation::where('w_id',$w_id)->first();

		$max_temp=$station->s_max_temp;
		$min_temp=$station->s_min_temp;

		$station->s_real_temp=$temp;
		$station->save();

		if($temp>$max_temp)
		{
			$mo_item=Mo_item::where('w_id',$w_id)->where('m_status',0)->update(['m_status' => 2]);
			$station->s_status=2;
			$station->save();
		}
		if($temp<$min_temp)
		{
			$mo_item=Mo_item::where('w_id',$w_id)->where('m_status',0)->update(['m_status' => 2]);
			$station->s_status=1;
			$station->save();
		}
		if($min_temp<$temp && $temp<$max_temp)
		{
			$mo_item=Mo_item::where('w_id',$w_id)->where('m_status',2)->update(['m_status' => 0]);
			$station->s_status=0;
			$station->save();
		}
	}
}