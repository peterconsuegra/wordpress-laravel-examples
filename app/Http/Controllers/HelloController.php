<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class HelloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	
	public function __construct()
	{
	     $this->middleware('auth.wp');
	}
		
	public function wordpress_code_example(){
		
		return view('wordpress_code_example');
	}
	
	public function list_users(){
		
		$blogusers = get_users( array( 'fields' => array( 'display_name','user_email','ID') ) );
		return view('hello.list_users',compact('blogusers'));
	}
	
	public function list_posts(){
		
		return view('hello.list_posts');
	}
	
	public function list_orders(){
		
		return view('hello.list_orders');
	}
	
	public function edit_posts(){
		
		return view('hello.edit_posts');
	}

   
}
