<?php

namespace App\Controllers;

// use App\Models\GroupModel;
use CodeIgniter\RESTful\ResourcePresenter;

class Groups extends ResourcePresenter
{
	public function __construct()
	{
		$this->db      = \Config\Database::connect();
	}

	protected $modelName = 'App\Models\GroupModel';

	/**
	 * Present a view of resource objects
	 *
	 * @return mixed
	 */
	public function index()
	{
		$data['user'] = $this->db->table('user')->getWhere(['id' => session('id')])->getRow();
		$data['groups'] = $this->model->findAll();
		return view('group/index', $data);
	}

	/**
	 * Present a view to present a specific resource object
	 *
	 * @param mixed $id
	 *
	 * @return mixed
	 */
	public function show($id = null)
	{
		//
	}

	/**
	 * Present a view to present a new single resource object
	 *
	 * @return mixed
	 */
	public function new()
	{
		$data['user'] = $this->db->table('user')->getWhere(['id' => session('id')])->getRow();
		return view('group/new', $data);
	}

	/**
	 * Process the creation/insertion of a new resource object.
	 * This should be a POST.
	 *
	 * @return mixed
	 */
	public function create()
	{
		$data = $this->request->getPost();
		$this->model->insert($data);
		return redirect()->to(site_url('groups'))->with('success', 'Data Berhasil Disimpan');
	}

	/**
	 * Present a view to edit the properties of a specific resource object
	 *
	 * @param mixed $id
	 *
	 * @return mixed
	 */
	public function edit($id = null)
	{
		$data['user'] = $this->db->table('user')->getWhere(['id' => session('id')])->getRow();
		return view('group/edit', $data);
	}

	/**
	 * Process the updating, full or partial, of a specific resource object.
	 * This should be a POST.
	 *
	 * @param mixed $id
	 *
	 * @return mixed
	 */
	public function update($id = null)
	{
		//
	}

	/**
	 * Present a view to confirm the deletion of a specific resource object
	 *
	 * @param mixed $id
	 *
	 * @return mixed
	 */
	public function remove($id = null)
	{
		//
	}

	/**
	 * Process the deletion of a specific resource object
	 *
	 * @param mixed $id
	 *
	 * @return mixed
	 */
	public function delete($id = null)
	{
		//
	}
}
