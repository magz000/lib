<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Store extends Model
{
    //
    public function distance($lat2, $lon2)
    {
        $lat1 = $this->latitude;

        $lon1 = $this->longitude;

        $theta = $lon1 - $lon2;
        $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
        $dist = acos($dist);
        $dist = rad2deg($dist);
        $miles = $dist * 60 * 1.1515;

        return ($miles * 1.609344);

    }

    public function user(){
        return $this->hasMany('App\User');
    }

    public function groupchat(){
        return $this->hasMany('App\Groupchat');
    }

    public function photo(){
        return $this->hasMany('App\Photo');
    }

    public function getGroupchatWithStatus($status){
        return $this->groupchat()->where('status', '=', $status)->get();
    }


    public function user_already_accepted($id){
        return $this->groupchat()->where('status', '=', 1)->where('user_id', '=', $id)->count() > 0;
    }

    public function user_already_pending($id){
        return $this->groupchat()->where('status', '=', 0)->where('user_id', '=', $id)->count() > 0;
    }





}
