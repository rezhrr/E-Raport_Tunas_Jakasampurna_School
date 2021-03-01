<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model extends CI_Model
{
  public function GetSubMenu()
  {
    $query = "SELECT `pengguna_sub_menu`.*, `pengguna_menu`.`Menu`
                FROM `pengguna_sub_menu` JOIN `pengguna_menu`
                  ON `pengguna_sub_menu`.`Menu_ID` = `pengguna_menu`.`ID`
              ";
    return $this->db->query($query)->result_array();
  }

  public function GetPengguna()
  {
    $query = "SELECT `pengguna`.*, `pengguna_hakakses`.`HakAkses`
                FROM `pengguna` JOIN `pengguna_hakakses`
                  ON `pengguna`.`HakAkses_ID` = `pengguna_hakakses`.`ID`
              ";
    return $this->db->query($query)->result_array();
  }

  public function GetKelas()
  {
    $query = "SELECT `kelas`.*, `jurusan`.`Kode_Jurusan`
                FROM `kelas` JOIN `jurusan`
                  ON `kelas`.`Jurusan_ID` = `jurusan`.`ID`
              ";
    return $this->db->query($query)->result_array();
  }

  public function GetMataPelajaran()
  {
    $query = "SELECT `matapelajaran`.*, `guru`.`Nama_Guru`
                FROM `matapelajaran` JOIN `guru`
                  ON `matapelajaran`.`Guru_ID` = `guru`.`ID`
              ";
    return $this->db->query($query)->result_array();
  }

  public function GetInputDataSiswa()
  {
    $query = "SELECT `siswa`.* , `orangtua`.`Nama_Bapak`
                FROM `siswa`
                JOIN `orangtua` ON `siswa`.`Orangtua_ID` = `orangtua`.`ID`
            ";
    return $this->db->query($query)->result_array();
  }

  public function GetInputNilaiSiswa()
  {
    $query = "SELECT `nilai_siswa`.`NIS` , `siswa`.`Nama_Siswa` , `kelas`.`Kode_Kelas` , `matapelajaran`.`Nama_Mapel`
              FROM `nilai_siswa`
              JOIN `siswa` ON `nilai_siswa`.`NIS` = `siswa`.`NIS` OR `nilai_siswa`.`Nama_Siswa` = `siswa`.`Nama_Siswa`
              JOIN `kelas` ON `nilai_siswa`.`Kelas_ID` = `kelas`.`Kode_Kelas`
              JOIN `matapelajaran` ON `nilai_siswa`.`Matapelajaran_ID` = `matapelajaran`.`Nama_Mapel`
            ";
    return $this->db->query($query)->result_array();
  }

  public function GetInputRaportSiswa()
  {
    $query = "SELECT `siswa`.`NIS` , `siswa`.`Nama_Siswa` , `kelas`.`Kode_Kelas` , `matapelajaran`.`Nama_Mapel`
              FROM `raport`
              JOIN `siswa` ON `raport`.`NIS` = `siswa`.`NIS` OR `raport`.`Nama_Siswa` = `siswa`.`Nama_Siswa`
              JOIN `kelas` ON `raport`.`Kelas_ID` = `kelas`.`Kode_Kelas`
              JOIN `matapelajaran` ON `raport`.`Matapelajaran_ID` = `matapelajaran`.`Nama_Mapel`
            ";
    return $this->db->query($query)->result_array();
  }
}
