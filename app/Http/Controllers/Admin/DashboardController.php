<?php
    namespace App\Http\Controllers\Admin;
    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;
    use App\User;
    class DashboardController extends Controller
    {
             
        public function __construct(){
            $this->middleware("auth");
        }
        /**
         * Show the application dashboard.
         *
         * @return \Illuminate\Contracts\Support\Renderable
         */
         public function index() 
         {
             $users = User::count();
             return view('admin.dashboard', ['users' => $users]);
         }
    }