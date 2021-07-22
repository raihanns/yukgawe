<?php

namespace App\Controllers;

class User extends BaseController
{
    public function index()
    {
        $data['user'] = $this->db->table('user')->getWhere(['id' => session('id')])->getRow();

        return view('user/index', $data);
    }

    public function edit($id = null)
    {
        if ($id != null) {
            $query = $this->db->table('user')->getWhere(['id' => $id]);
            if ($query->resultID->num_rows > 0) {
                $data['user'] = $query->getRow();
                return view('user/edit', $data);
            } else {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function update($id)
    {

        $data = $this->request->getPost();
        $file = $this->request->getFile('image');
        unset($data['_method']);

        $this->db->table('gawe')->where(['id_gawe' => $id])->update($data);
        return redirect()->to(site_url('gawe'))->with('success', 'Data Berhasil Diedit');
    }


    public function changepassword()
    {
        $data['user'] = $this->db->table('user')->getWhere(['id' => session('id')])->getRow();
        return view('user/changepassword', $data);
    }
}
