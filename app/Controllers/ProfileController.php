<?php

namespace App\Controllers;

use App\Models\UserDetails;

class ProfileController extends BaseController
{
  public function viewProfile()
  {
    $profileModel    = new UserDetails();
    $data['profile'] = $profileModel->where('id_user', session()->get('id_user'))->first();
    return view('profile/view', $data);
  }

  public function editProfile()
  {
    return view('profile/edit');
  }

  public function updateProfile()
  {
    $profileModel = new UserDetails();
    $data         = [
      'alamat_user'    => $this->request->getPost('alamat_user'),
      'informasi_lain' => $this->request->getPost('informasi_lain'),
    ];
    $profileModel->update(session()->get('id_user'), $data);

    return redirect()->to('/profile');
  }
}
