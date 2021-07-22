<?php

namespace App\Controllers;

class Gawe extends BaseController
{
    public function index()
    {
        //cara 1: query builder
        $builder = $this->db->table('gawe');
        $query   = $builder->get();

        $data['user'] = $this->db->table('user')->getWhere(['id' => session('id')])->getRow();
        $data['gawe'] = $query->getResult();
        return view('gawe/get', $data);
    }

    public function create()
    {
        $data['user'] = $this->db->table('user')->getWhere(['id' => session('id')])->getRow();
        return view('gawe/add');
    }

    public function store()
    {
        //cara 1
        $data = $this->request->getPost();


        $this->db->table('gawe')->insert($data);

        if ($this->db->affectedRows() > 0) {
            return redirect()->to(site_url('gawe'))->with('success', 'Data Berhasil Disimpan');
        }
    }

    public function edit($id = null)
    {
        $data['user'] = $this->db->table('user')->getWhere(['id' => session('id')])->getRow();
        if ($id != null) {
            $query = $this->db->table('gawe')->getWhere(['id_gawe' => $id]);
            if ($query->resultID->num_rows > 0) {
                $data['gawe'] = $query->getRow();
                return view('gawe/edit', $data);
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

        $this->db->table('gawe')->where(['id_gawe' => $id])->update($data);
        return redirect()->to(site_url('gawe'))->with('success', 'Data Berhasil Diedit');
    }

    public function destroy($id)
    {
        $this->db->table('gawe')->where(['id_gawe' => $id])->delete();
        return redirect()->to(site_url('gawe'))->with('success', 'Data Berhasil Dihapus');
    }
}
