<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, User $users)
    {
        $q = $request->input('q');

        $active = 'Users';

        //fungsi pencarian
        $users = $users->when($q, function ($query) use ($q) {
            return $query
                ->where('name', 'like', '%' . $q . '%')
                ->orWhere('email', 'like', '%' . $q . '%');
        })
            ->paginate(15);

        $request = $request->all();

        return view('dashboard/users/list', [
            'users' => $users,
            'request' => $request,
            'active' => $active
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = USER::find($id);
        $active = 'Users';
        return view('dashboard/users/form', ['user' => $user, 'active' => $active]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //fungsi update data
    public function update(Request $request, $id)
    {
        $user = USER::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->save();
        return redirect('dashboard/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //fungsi delete data
    public function destroy($id)
    {
        $user = USER::find($id);
        $user->delete();
        return redirect('dashboard/users');
    }
}
