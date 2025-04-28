<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AuthFilter implements FilterInterface
{
  public function before(RequestInterface $request, $arguments = null)
  {
    if (!session()->get('logged_in')) {
      return redirect()->to('/login')->with('error', 'Silakan login terlebih dahulu.');
    }

    if ($arguments) {
      $role = session()->get('role');
      if (!in_array($role, $arguments)) {
        // Kalau role tidak sesuai
        return redirect()->to('/login')->with('error', 'Anda tidak memiliki akses.');
      }
    }
  }

  public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
  {
    // Tidak perlu diisi untuk sekarang
  }
}
