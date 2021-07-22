<?php

namespace App\Controllers;

class Admin extends BaseController
{

    // public function __construct()
    // {
    //     parent::__construct();
    //     $query = $this->db->table('user')->getWhere(['id' => session('id')]);
    //     $data['user'] = $query->getRow();
    // }



    public function index()
    {
        $data['user'] = $this->db->table('user')->getWhere(['id' => session('id')])->getRow();
        $data['title'] = 'Dashboard';
        return view('home', $data);
    }

    public function role()
    {
        $data['user'] = $this->db->table('user')->getWhere(['id' => session('id')])->getRow();

        //cara 1: query builder
        $builder = $this->db->table('user_role');
        $query   = $builder->get();

        $data['title'] = 'Role';
        $data['role'] = $query->getResult();
        return view('admin/role', $data);
    }




    public function role_access($id = null)
    {
        $data['title'] = 'Role';
        $data['user'] = $this->db->table('user')->getWhere(['id' => session('id')])->getRow();

        $query = $this->db->table('user_role')->getWhere(['id' => $id]);
        $data['role'] = $query->getRow();
        $data['menu'] = $this->db->table('user_menu')->get()->getResult();
        return view('admin/role_access', $data);
    }

    public function changeAccess()
    {

        // $menu_id = $this->input->post('menuId');
        $menu_id = $this->request->getPost('menuId');
        $role_id = $this->request->getPost('roleId');

        // $role_id = $this->input->post('roleId');


        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id

        ];
        $result = $this->db->table('user_access_menu')->getWhere(['role_id' => $role_id, 'menu_id' => $menu_id]);
        // $result = $this->db->table('user_access_menu')->getWhere($data);
        // $result = $this->db->get_where('user_access_menu', $data);

        if ($result->resultID->num_rows < 1) {
            $this->db->table('user_access_menu')->insert($data);
        } else {
            $this->db->table('user_access_menu')->delete($data);
        }
        $this->session->set_flashdata('success', '<div class="alert alert-success" role="alert">Access changed!</div>');
    }

    public function create()
    {
        return view('gawe/add');
    }

    public function store()
    {
        //cara 1
        $data = $this->request->getPost();

        //cara 2
        // $data = [
        //     'name_gawe' => $this->request->getVar('name_gawe'),
        //     'date_gawe' => $this->request->getVar('date_gawe'),
        //     'info_gawe' => $this->request->getVar('info_gawe'),
        // ];


        $this->db->table('gawe')->insert($data);

        if ($this->db->affectedRows() > 0) {
            return redirect()->to(site_url('gawe'))->with('success', 'Data Berhasil Disimpan');
        }
    }

    public function edit($id = null)
    {
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
