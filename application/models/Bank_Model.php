<?php
class Bank_Model extends CI_Model
{

    public function bank_all($user_id)
    {
        if ($query = $this->db->get_where('account', ['user_id' => $user_id, 'status' => 'active'])) {
            return $query->result();
        } else {
            return false;
        }
    }

    //Insert  New bank into account table
    public function new_bank_in($data)
    {
        $this->db->insert('account', $data);
    }

    public function bank_update($id, $accno, $data)
    {
        $this->db->set($data);
        $this->db->where(['id' => $id, 'bank_account_no' => $accno]);
        $this->db->update('account', $data);
    }

    public function bankDel($id)
    {
        $this->db->where('bank_account_no', $id);
        $this->db->update('account', ['status' => 'deleted']);
    }

    public function bank_one($id)
    {
        if ($query = $this->db->get_where('account', ['id' => $id, 'status' => 'active'])) {
            return $query->result();
        } else {
            return false;
        }
    }
}
