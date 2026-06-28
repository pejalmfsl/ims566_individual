<?php

namespace App\Controllers;

use App\Models\UserModel;

class AuthController extends BaseController
{
    private const DEMO_USERNAME = 'admin';
    private const DEMO_PASSWORD = '123456';

    public function index()
    {
        if ($this->session->get('isLoggedIn') === true) {
            return redirect()->to(site_url('dashboard'));
        }

        return view('auth/login', [
            'pageTitle' => 'UiTM Library Management System - Login',
            'error' => $this->session->getFlashdata('error') ?? '',
            'username' => $this->session->getFlashdata('username') ?? '',
        ]);
    }

    public function attempt()
    {
        $username = trim((string) $this->request->getPost('username'));
        $password = (string) $this->request->getPost('password');

        $user = $this->findUser($username);

        if ($user === null) {
            return redirect()
                ->to(site_url('login'))
                ->with('error', 'Invalid username or password.')
                ->with('username', $username);
        }

        $isValid = isset($user['password_hash'])
            ? password_verify($password, $user['password_hash'])
            : hash_equals(self::DEMO_PASSWORD, $password);

        if (! $isValid) {
            return redirect()
                ->to(site_url('login'))
                ->with('error', 'Invalid username or password.')
                ->with('username', $username);
        }

        $this->session->set([
            'isLoggedIn' => true,
            'username' => $username,
            'role' => $user['role'] ?? 'Administrator',
            'fullName' => $user['full_name'] ?? 'System Administrator',
        ]);

        return redirect()->to(site_url('dashboard'));
    }

    public function logout()
    {
        $this->session->destroy();

        return redirect()->to(site_url('login'));
    }

    private function findUser(string $username): ?array
    {
        try {
            $db = db_connect();
            $db->initialize();

            if ($db->isConnected() && $db->tableExists('library_users')) {
                $user = (new UserModel())
                    ->where('username', $username)
                    ->where('status', 'Active')
                    ->first();

                if ($user !== null) {
                    return $user;
                }
            }
        } catch (\Throwable) {
            // Fall back to demo credentials below.
        }

        if ($username === self::DEMO_USERNAME) {
            return [
                'username' => self::DEMO_USERNAME,
                'password_hash' => password_hash(self::DEMO_PASSWORD, PASSWORD_DEFAULT),
                'full_name' => 'System Administrator',
                'role' => 'Administrator',
                'status' => 'Active',
            ];
        }

        return null;
    }
}
