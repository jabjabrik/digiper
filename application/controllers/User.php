<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		authorize();
	}

	public function index()
	{
		$data['user'] = $this->db->get('user')->result();
		$data['title'] = 'User';
		$this->load->view('user/index', $data);
	}

	public function edit()
	{
		$id_user = $this->input->post('id_user');
		$nama = $this->input->post('nama');
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		if (strlen($username) < 5) {
			set_toasts('Username harus minimal 8 karakter.', 'danger');
			redirect('user');
			return;
		}


		$data = array(
			'nama' => $nama,
			'username' => $username,
		);

		if (!empty($password)) {
			if (strlen($password) < 8) {
				set_toasts('Password harus minimal 8 karakter.', 'danger');
				redirect('user');
				return;
			} else {
				$data['password'] = password_hash($password, PASSWORD_DEFAULT);
			}
		}

		$is_exist_username = $this->db->get_where('user', array('username' => $username))->num_rows() > 0;
		$is_current_username = $this->db->get_where('user', array('id_user' => $id_user))->row('username') == $username;

		if ($is_exist_username && !$is_current_username) {
			set_toasts("Username '$username' telah terpakai, Mohon gunakan username baru.", 'danger');
		} else {
			$this->db->where('id_user', $id_user);
			$result = $this->db->update('user', $data);

			if ($result) {
				set_toasts('User Berhasil di Update', 'success');
			} else {
				set_toasts('User Gagal di Update', 'danger');
			}
		}

		redirect('user');
	}
}
