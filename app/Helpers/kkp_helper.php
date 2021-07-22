<?php


function check_access($role_id, $menu_id)
{

    $db = \Config\Database::connect();
    // $db->table('user_role')->getWhere(['role_id' => $role_id]);
    // $db->table('menu_id')->getWhere(['menu_id' => $menu_id]);
    // $ci->db->where('role_id', $role_id);
    // $ci->db->where('menu_id', $menu_id);
    // $result = $db->table('user_access_menu')->getRow();

    $query = $db->table('user_access_menu')->getWhere(['role_id' => $role_id, 'menu_id' => $menu_id]);
    // $result = $query->getRow();


    if ($query->resultID->num_rows > 0) {
        return "checked='checked'";
    }

    // if ($query->resultID->num_rows > 0) {
    //     $data['gawe'] = $query->getRow();
    //     return view('gawe/edit', $data);
    // }
}
