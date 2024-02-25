<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	function __construct()
	{
	parent::__construct();
	$this->load->model('MSudi');
	}
	
	public function index()
	{
		  // Set a default value for $content
		  $data['content'] = 'beranda'; // Replace 'welcome_content' with the actual content view name you want to load.

		  // Load the 'welcome_message' view with the $data array
		  $this->load->view('welcome_message', $data);
	}
	public function kavling()
	{
		// Memuat model MSudi
		$this->load->model('MSudi');

		// Mengakses data dari model
		$data['DataBlokKavling'] = $this->MSudi->GetData('blok_kavling');
		$data['content'] = 'kavling/blok_kavling';
		$this->load->view('welcome_message', $data);

	}
	public function addDataBlok() {
		$add['kd_blok'] = $this->input->post('kd_blok');
		$add['nama_blok'] = $this->input->post('nama_blok');
		$add['no_blok'] = $this->input->post('no_blok');
		

		$this->MSudi->AddData('blok_kavling', $add);


		redirect(site_url('Welcome/kavling'));
	}
	public function updateDataBlok()
	{
				$a = $this->input->post('kd_blok');
				$update['nama_blok'] = $this->input->post('nama_blok');
				$update['no_blok'] = $this->input->post('no_blok');

				$this->MSudi->UpdateData('blok_kavling', 'kd_blok', $a, $update);


				redirect(site_url('Welcome/kavling'));
	}
	public function deleteDataBlok($kd_blok)
	{ 
		$this->load->model('MSudi');
	
		$this->MSudi->DeleteData('blok_kavling', 'kd_blok', $kd_blok);
	
		// Redirect ke halaman master setelah penghapusan
		redirect(site_url('Welcome/kavling'));
	}

	public function penduduk()
	{
		// Memuat model MSudi
		$this->load->model('MSudi');

		// Mengakses data dari model
		$data['DataPenduduk'] = $this->MSudi->GetData('penduduk');
		$data['KodeBlok']	=$this->MSudi->GetblokKavling('penduduk');
		$data['content'] = 'kavling/penduduk';
		$this->load->view('welcome_message', $data);

	}
	public function addDataPenduduk() {
		$add['kd_penduduk'] = $this->input->post('kd_penduduk');
		$add['nik'] = $this->input->post('nik');
		$add['kk'] = $this->input->post('kk');
		$add['foto'] = $this->input->post('foto');
		$add['nama'] = $this->input->post('nama');
		$add['tempat_lahir'] = $this->input->post('tempat_lahir');			
		$add['tgl_lahir'] = $this->input->post('tgl_lahir');			
		$add['agama'] = $this->input->post('agama');			
		$add['status_perkawinan'] = $this->input->post('status_perkawinan');			
		$add['status_keluarga'] = $this->input->post('status_keluarga');
		$add['status_pekerjaan'] = $this->input->post('status_pekerjaan');
		$add['status_kewarganegaraan'] = $this->input->post('status_kewarganegaraan');
		$add['kd_blok'] = $this->input->post('kd_blok');
		$add['status_kavling'] = $this->input->post('status_kavling');
		$add['tgl_masuk'] = $this->input->post('tgl_masuk');
		$add['status_huni'] = $this->input->post('status_huni');
		$this->MSudi->AddData('penduduk', $add);
		redirect(site_url('Welcome/penduduk'));
	}
	public function updateDataPenduduk()
	{
		$kd_penduduk = $this->input->post('kd_penduduk');
		$update['nik'] = $this->input->post('nik');
		$update['kk'] = $this->input->post('kk');
		$update['foto'] = $this->input->post('foto');
		$update['nama'] = $this->input->post('nama');
		$update['tempat_lahir'] = $this->input->post('tempat_lahir');			
		$update['tgl_lahir'] = $this->input->post('tgl_lahir');			
		$update['agama'] = $this->input->post('agama');			
		$update['status_perkawinan'] = $this->input->post('status_perkawinan');			
		$update['status_keluarga'] = $this->input->post('status_keluarga');
		$update['status_pekerjaan'] = $this->input->post('status_pekerjaan');
		$update['status_kewarganegaraan'] = $this->input->post('status_kewarganegaraan');
		$update['kd_blok'] = $this->input->post('kd_blok');
		$update['status_kavling'] = $this->input->post('status_kavling');
		$update['tgl_masuk'] = $this->input->post('tgl_masuk');
		$update['status_huni'] = $this->input->post('status_huni');
		$this->MSudi->UpdateData('penduduk','kd_penduduk',$kd_penduduk, $update);
		redirect(site_url('Welcome/penduduk'));
	}
	public function deleteDataPenduduk($kd_penduduk)
	{ 
		$this->load->model('MSudi');
	
		$this->MSudi->DeleteData('penduduk', 'kd_penduduk', $kd_penduduk);
	
		// Redirect ke halaman master setelah penghapusan
		redirect(site_url('Welcome/penduduk'));
	}

	public function suratKeluar()
	{
		// Memuat model MSudi
		$this->load->model('MSudi');

		// Mengakses data dari model
		$data['DataSuratKeluar'] = $this->MSudi->GetData('surat_keluar');
		$data['content'] = 'kavling/surat_keluar';
		$this->load->view('welcome_message', $data);

	}
	public function addDataSuratKeluar() {
		$add['kd_surat_keluar'] = $this->input->post('kd_surat_keluar');
		$add['nik'] = $this->input->post('nik');
		$add['nomor_surat'] = $this->input->post('nomor_surat');
		$add['keterangan'] = $this->input->post('keterangan');
		$add['tanggal_surat'] = $this->input->post('tanggal_surat');
		$this->MSudi->AddData('surat_keluar', $add);
		redirect(site_url('Welcome/suratKeluar'));
	}
	public function updateDataSuratKeluar()
	{
		$kd_surat_keluar = $this->input->post('kd_surat_keluar');
		$update['nik'] = $this->input->post('nik');
		$update['nomor_surat'] = $this->input->post('nomor_surat');
		$update['keterangan'] = $this->input->post('keterangan');
		$update['tanggal_surat'] = $this->input->post('tanggal_surat');
		$this->MSudi->UpdateData('surat_keluar','kd_surat_keluar',$kd_surat_keluar, $update);
		redirect(site_url('Welcome/suratKeluar'));
	}
	public function deleteDataSuratKeluar($kd_surat_keluar)
	{ 
		$this->load->model('MSudi');
	
		$this->MSudi->DeleteData('surat_keluar', 'kd_surat_keluar', $kd_surat_keluar);
	
		// Redirect ke halaman master setelah penghapusan
		redirect(site_url('Welcome/suratKeluar'));
	}

	public function informasi()
{
    // Memuat model MSudi
    $this->load->model('MSudi');

    // Mengakses data dari model
    $data['DataInformasi'] = $this->MSudi->GetData('info_warga');
    $data['content'] = 'kavling/informasi';
	$this->load->view('welcome_message', $data);

}
public function addDataInformasi() {
	$add['kd_info'] = $this->input->post('kd_info');
	$add['judul_info'] = $this->input->post('judul_info');
	$add['informasi'] = $this->input->post('informasi');
	$add['tgl_info'] = $this->input->post('tgl_info');
	

	$this->MSudi->AddData('info_warga', $add);


	redirect(site_url('Welcome/informasi'));
}
public function updateDataInformasi()
	{
				$a = $this->input->post('kd_info');
				$update['judul_info'] = $this->input->post('judul_info');
				$update['informasi'] = $this->input->post('informasi');
				$update['tgl_info'] = $this->input->post('tgl_info');

				$this->MSudi->UpdateData('info_warga', 'kd_info', $a, $update);


				redirect(site_url('Welcome/informasi'));
	}
	public function deleteDataInformasi($kd_info)
	{ 
		$this->load->model('MSudi');
	
		$this->MSudi->DeleteData('info_warga', 'kd_info', $kd_info);
	
		// Redirect ke halaman master setelah penghapusan
		redirect(site_url('Welcome/informasi'));
	}


	public function pesan()
	{
    // Memuat model MSudi
    $this->load->model('MSudi');

    // Mengakses data dari model
    $data['DataPesan'] = $this->MSudi->GetData('pesan_warga');
    $data['content'] = 'kavling/pesan_masuk';
	$this->load->view('welcome_message', $data);

	}
	public function addDataPesan() {
		$add['kd_pesan'] = $this->input->post('kd_pesan');
		$add['nik'] = $this->input->post('nik');
		$add['pesan'] = $this->input->post('pesan');
		$add['tgl_pesan'] = $this->input->post('tgl_pesan');
		

		$this->MSudi->AddData('pesan_warga', $add);


		redirect(site_url('Welcome/pesan'));
	}
	public function updateDataPesan()
	{
		$a = $this->input->post('kd_pesan');
		$update['nik'] = $this->input->post('nik');
		$update['pesan'] = $this->input->post('pesan');
		$update['tgl_pesan'] = $this->input->post('tgl_pesan');

		$this->MSudi->UpdateData('pesan_warga', 'kd_pesan', $a, $update);


		redirect(site_url('Welcome/pesan'));
	}
	public function deleteDataPesan($kd_pesan)
	{ 
		$this->load->model('MSudi');
	
		$this->MSudi->DeleteData('pesan_warga', 'kd_pesan', $kd_pesan);
	
		// Redirect ke halaman master setelah penghapusan
		redirect(site_url('Welcome/pesan'));
	}

}
