<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MSudi extends CI_Model
{
    function AddData($tabel, $data=array())
    {
        $this->db->insert($tabel,$data);
    }

    function UpdateData($tabel,$fieldid,$fieldvalue,$data=array())
    {
        $this->db->where($fieldid,$fieldvalue)->update($tabel,$data);
    }

    function DeleteData($tabel,$fieldid,$fieldvalue)
    {
        $this->db->where($fieldid,$fieldvalue)->delete($tabel);
    }

    function GetData($tabel)
    {
        $query= $this->db->get($tabel);
        return $query->result();
    }

    function GetDataWhere($tabel,$id,$nilai)
    {
        $this->db->where($id,$nilai);
        $query= $this->db->get($tabel);
        return $query;
    }
    function GetCariInformasi($cari)
    {
        $query = $this->db->query("Select * From info_warga where proposal like '%$cari%' ");
        return $query;
    }
	function GetblokKavling($tabel)
	{
		$query = $this->db->query(
			"SELECT bk.kd_blok, bk.nama_blok, bk.no_blok
			FROM blok_kavling as bk"
		);
		return $query->result();
	}
	function GetPenduduk($tabel)
	{
		$query = $this->db->query(
			"SELECT pd.kd_penduduk, pd.nik, pd.nama
			FROM penduduk as pd"
		);
		return $query->result();
	}
}

