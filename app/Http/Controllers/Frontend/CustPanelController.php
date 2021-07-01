<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustPanelController extends Controller
{
    public function custPanel()
    {
        $data['title'] = 'Customer Panel';
        return  view('Frontend.CustPanel.CustPanel',$data);
    }
}
