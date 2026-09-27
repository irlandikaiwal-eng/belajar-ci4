<?php 
namespace App\Controllers;

class Saya extends BaseController
{
    public function index()
    {
        $data = [
            'nama' => 'Ihwal Irlandika'
        ];

        return view('profil_saya', $data);
    }
}
?>
