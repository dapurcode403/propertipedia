<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Auth_filter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if (!session('id')) {
            return redirect()->to('/login');
        } else {
            if (session('access_root') != 'prptpda') {
                return redirect()->to('/login');
            }
        }
    }

    //--------------------------------------------------------------------

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}