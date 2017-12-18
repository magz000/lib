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

    public function groupchat(){
        return $this->hasMany('App\Groupchat');
    }


    public function pending_groupchat() {
        return $this->groupchat()->where('status', '=', 0);
    }

    public function accepted_groupchat() {
        return $this->groupchat()->where('status', '=', 1);
    }

    public function declined_groupchat() {
        return $this->groupchat()->where('status', '=', 2);
    }

    public function removed_groupchat() {
        return $this->groupchat()->where('status', '=', 3);
    }

    public function user_already_accepted($id){
        return $this->groupchat()->where('status', '=', 1)->where('user_id', '=', $id)->count() > 0;
    }

    public function user_already_pending($id){
        return $this->groupchat()->where('status', '=', 0)->where('user_id', '=', $id)->count() > 0;
    }





}
