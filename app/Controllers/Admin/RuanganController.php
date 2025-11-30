<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\RuanganModel;

class RuanganController extends BaseController
{
    protected $ruanganModel;
    
    public function __construct()
    {
        $this->ruanganModel = new RuanganModel();
    }
    
    public function index()
    {
        // Disable cache
        $this->response->setHeader('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0');
        $this->response->setHeader('Pragma', 'no-cache');
        
        $db = \Config\Database::connect();
        
        $data['ruangan'] = $this->ruanganModel->orderBy('id_ruangan', 'ASC')->paginate(10);
        $data['pager'] = $this->ruanganModel->pager;
        $data['total'] = $db->table('ruangan')->countAll();
        
        return view('admin/ruangan/index', $data);
    }
    
    public function create()
    {
        return view('admin/ruangan/create');
    }
    
    public function store()
    {
        $this->ruanganModel->save([
            'nama_ruangan' => $this->request->getPost('nama_ruangan')
        ]);
        
        return redirect()->to('/admin/ruangan')->with('success', 'Data ruangan berhasil ditambahkan');
    }
    
    public function edit($id)
    {
        $data['ruangan'] = $this->ruanganModel->find($id);
        return view('admin/ruangan/edit', $data);
    }
    
    public function update($id)
    {
        $this->ruanganModel->update($id, [
            'nama_ruangan' => $this->request->getPost('nama_ruangan')
        ]);
        
        return redirect()->to('/admin/ruangan')->with('success', 'Data ruangan berhasil diupdate');
    }
    
    public function delete($id)
    {
        $this->ruanganModel->delete($id);
        return redirect()->to('/admin/ruangan')->with('success', 'Data ruangan berhasil dihapus');
    }
}
