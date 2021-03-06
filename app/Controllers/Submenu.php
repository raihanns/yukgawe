<?php

namespace App\Controllers;

class Submenu extends BaseController
{
    public function index()
    {
        $data['title'] = 'SubMenu Management';
        $data['user'] = $this->db->table('user')->getWhere(['id' => session('id')])->getRow();
        //join submenu dengan menu untuk mengambil nama menu
        $query = $this->db->query("
                SELECT `user_sub_menu`.*, `user_menu`.`menu`
                FROM `user_sub_menu` JOIN `user_menu`
                ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
        ");
        $data['submenu'] = $query->getResult();
        return view('submenu/get', $data);
    }

    public function create()
    {
        $data['user'] = $this->db->table('user')->getWhere(['id' => session('id')])->getRow();
        $data['title'] = 'SubMenu Management';
        $builder = $this->db->table('user_menu');
        $query   = $builder->get();

        $data['menu'] = $query->getResult();
        return view('submenu/add', $data);
    }

    public function store()
    {
        $data = $this->request->getPost();
        $this->db->table('user_sub_menu')->insert($data);

        if ($this->db->affectedRows() > 0) {
            return redirect()->to(site_url('submenu'))->with('success', 'Data Berhasil Disimpan');
        }
    }

    public function edit($id = null)
    {
        $data['title'] = 'SubMenu Management';
        $data['user'] = $this->db->table('user')->getWhere(['id' => session('id')])->getRow();
        if ($id != null) {
            $query = $this->db->table('user_sub_menu')->getWhere(['id' => $id]);

            if ($query->resultID->num_rows > 0) {
                $data['submenu'] = $query->getRow();
                $query = $this->db->query("
                    SELECT `user_sub_menu`.*, `user_menu`.`menu`
                    FROM `user_sub_menu` JOIN `user_menu`
                    ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
                ");
                $data['subjoin'] = $query->getRow();

                $builder = $this->db->table('user_menu');
                $query   = $builder->get();

                $data['menu'] = $query->getResult();
                return view('submenu/edit', $data);
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

        $this->db->table('user_sub_menu')->where(['id' => $id])->update($data);
        return redirect()->to(site_url('submenu'))->with('success', 'Data Berhasil Diedit');
    }

    public function destroy($id)
    {
        $this->db->table('user_sub_menu')->where(['id' => $id])->delete();
        return redirect()->to(site_url('submenu'))->with('success', 'Data Berhasil Dihapus');
    }
}
