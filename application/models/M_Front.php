<?php
defined('BASEPATH') or exit('No direct script access allowed');
#[AllowDynamicProperties]
class M_Front extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $bulan = array(1 => "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
        $hari = array("Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu");
        $this->get_today_date = $hari[(int)date("w")] . ', ' . date("j ") . $bulan[(int)date('m')] . date(" Y");
        $this->get_datasess = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();
        $this->appsetting = $this->db->get_where('db_setting', ['status_setting' => 1])->row_array();
    }

    public function fetchsetupapp()
    {
        return $this->db->get_where('db_setting')->row_array();
    }

    public function fetchdashboard()
    {
        return $this->db->get_where('user')->row_array();
    }

    public function fetchdbabsen($kode_pegawai)
    {
        $today = $this->get_today_date;
        return $this->db->get_where('db_absensi', ['kode_pegawai' => $kode_pegawai, 'tgl_absen' => $today])->row_array();
    }

    public function crudabs($typesend)
    {
        if ($typesend == 'delabs') {
            $this->db->delete('db_absensi', ['id_absen' => htmlspecialchars($this->input->post('absen_id', true))]);
        } elseif ($typesend == 'delallabs') {
            $this->db->truncate('db_absensi');
        }
    }

    public function do_absen($existing_data)
    {
        $appsettings = $this->appsetting;
        $today = $this->get_today_date;
        $clocknow = date("H:i:s");
        if ($existing_data) {
            $data = [
                'jam_masuk' => $clocknow
            ];
            $this->db->where('tgl_absen', $today)->where('kode_pegawai', $this->get_datasess['kode_pegawai']);
            $this->db->update('db_absensi', $data);
        } else {
            $data = [
                'nama_pegawai' => $this->get_datasess['nama_lengkap'],
                'kode_pegawai' => $this->get_datasess['kode_pegawai'],
                'jam_masuk' => $clocknow,
                'kode_absen' => 'absen_' . date('Ym') . mt_rand(11111, 99999),
                'tgl_absen' => date('Y-m-d'),
                'keterangan_absen' => htmlspecialchars($this->input->post('ket_absen', true)),
                'status_pegawai' => 1,
                'maps_absen' => 'CENAH HQ'
            ];
            $this->db->insert('db_absensi', $data);
        }
    }
}
