<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class PagesController extends Controller {

	public function about()
	{
		//$name = 'Jeffry <span style="color: red;"> Way</span>';
		//return view('pages.about')->withName($name);

		//return view('pages.about')->with([
		//	'first' => 'Jeffrey',
		//	'last' => 'Way'
		//]);

		//$data = [];
		//$data['first'] = 'Douglas';
		//$data['last'] = 'Qualt';
		//return view('pages.about',$data);

		//$first = 'Fox';
		//$last = 'Mulder';
		//return view('pages.about', compact('first','last'))->withPagetitle('About');
	
		$people = ['Taylor Otwell', 'Dayle Rees', 'Eric Barnes'];
		return view('pages.about', compact('people'))->withPagetitle('About');
	}

	public function contact()
	{
		return view('pages.contact')->withPagetitle('Contact');
	}
}