<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Soap\SoapResponse;
use App\Models\Quaternion;

class SoapController extends Controller
{
    public function sumQuaternions(Request $request)
    {   
        // Obtenha os quatérnions da solicitação
        $quat1 = $request->input('quat1');
        $quat2 = $request->input('quat2');

        // Realize a soma dos quatérnions
        $q1 = explode(',', $quat1);
        $q2 = explode(',', $quat2);

        $quaternion1 = new Quaternion();
        $quaternion1->a = $q1[0];
        $quaternion1->b = $q1[1];
        $quaternion1->c = $q1[2];
        $quaternion1->d = $q1[3];

        $quaternion2 = new Quaternion();
        $quaternion2->a = $q2[0];
        $quaternion2->b = $q2[1];
        $quaternion2->c = $q2[2];
        $quaternion2->d = $q2[3];
        
        $result = [
            'w' => $quaternion1->a + $quaternion2->a,
            'x' => $quaternion1->b + $quaternion2->b,
            'y' => $quaternion1->c + $quaternion2->c,
            'z' => $quaternion1->d + $quaternion2->d
        ];
        
        // Retorne o resultado
        return SoapResponse::create(['result' => $result]);
    }
}