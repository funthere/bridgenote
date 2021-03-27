<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        $data['users'] = \DB::table('users')->paginate(10);
        return view('dashboard', $data)->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function index()
    {
        $members = Member::all();
        return response(['status' => true, 'members' => $members]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'status' => 'required|in:active,inactive',
            'position' => 'required',
        ]);
        if ($validator->fails()) {
            return response(['error' => $validator->errors(), 'Validation Error'], 400);
        }
    
        $member = Member::create($request->all());
     
        return response(['status' => true, 'message' => 'Created successfully', 'member' => $member], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function show($userId)
    {
        $member = Member::where('user_id', $userId)->first();
        return response(['status' => true, 'member' => $member]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function edit($userId)
    {
        $member = Member::where('user_id', $userId)->first();
        // dd($member);
        return view('members.edit',compact('member'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $userId)
    {
        $member = Member::where('user_id', $userId)->first();
        if(!$member) {
            return response(['status' => false, 'message' => 'Not found']);
        }
        $validator = Validator::make($request->all(), [
            'status' => 'in:active,inactive',
        ]);
        if ($validator->fails()) {
            return response(['error' => $validator->errors(), 'Validation Error'], 400);
        }
    
        $member->update($request->all());
    
        return response(['status' => true, 'message' => 'Updated successfully', 'member' => $member]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy($userId)
    {
        $member = Member::where('user_id', $userId)->first();

        if(!$member) {
            return response(['status' => false, 'message' => 'Not found']);
        }
        $member->delete();

        return response(['status' => true, 'message' => 'Deleted']);
    }
}
