<?php

namespace App\Controllers;

class Menu extends BaseController
{
    public function index()
    {
        $data['user'] = $this->db->table('user')->getWhere(['id' => session('id')])->getRow();
        //cara 1: query builder
        $builder = $this->db->table('user_menu');
        $query   = $builder->get();

        //cara 2: query manual
        // $query = $this->db->query("SELECT * FROM gawe");

        $data['menu'] = $query->getResult();
        return view('menu/get', $data);
    }

    public function create()
    {
        return view('menu/add');
    }

    public function store()
    {
        $data = $this->request->getPost();
        $data['user'] = $this->db->table('user')->getWhere(['id' => session('id')])->getRow();
        $this->db->table('user_menu')->insert($data);

        if ($this->db->affectedRows() > 0) {
            return redirect()->to(site_url('menu'))->with('success', 'Data Berhasil Disimpan');
        }
    }

    public function edit($id = null)
    {
        $data['user'] = $this->db->table('user')->getWhere(['id' => session('id')])->getRow();
        if ($id != null) {
            $query = $this->db->table('user_menu')->getWhere(['id' => $id]);
            if ($query->resultID->num_rows > 0) {
                $data['menu'] = $query->getRow();
                return view('menu/edit', $data);
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
        unset($data['_method']);

        $this->db->table('user_menu')->where(['id' => $id])->update($data);
        return redirect()->to(site_url('menu'))->with('success', 'Data Berhasil Diedit');
    }

    public function destroy($id)
    {
        $this->db->table('user_menu')->where(['id' => $id])->delete();
        return redirect()->to(site_url('menu'))->with('success', 'Data Berhasil Dihapus');
    }
}
