<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class MusicController extends BaseController
{
    public function delete_playlist($id)
{
   
    $playlistModel = new \App\Models\PlaylistModel();

    $playlist = $playlistModel->find($id);

    if ($playlist) {
       
        $playlistModel->delete($id);

     
        return redirect()->to('music/add_playlist');
    } else {

        return redirect()->to('music');
    }
}

    public function add_playlist()
{
    $playlistModel = new \App\Models\PlaylistModel();
        $data['playlist'] = $playlistModel->findAll();

    if ($this->request->getMethod() === 'post') {
      
        $playlistName = $this->request->getPost('playlist_name');

  
        $playlistModel = new \App\Models\PlaylistModel();

        $playlistModel->insert([
            'playlist_name' => $playlistName,
        ]);

        return redirect()->to('music/add_playlist');
    }
    return view('uploadPlaylist', $data);
    
}

    public function uploadform()
    {
        $playlistModel = new \App\Models\PlaylistModel();
        $data['playlist'] = $playlistModel->findAll();
        return view('upload' ,$data);
    }
    public function index()
    {

        $musicModel = new \App\Models\MusicModel();
        $data['music'] = $musicModel->findAll();

        $playlistModel = new \App\Models\PlaylistModel();
        $data['playlist'] = $playlistModel->findAll();

        return view('music_all_in_one', $data);
    }

    public function upload()
{

    $musicModel = new \App\Models\MusicModel();
    $data['music'] = $musicModel->findAll();


    $playlistModel = new \App\Models\PlaylistModel();
    $data['playlist'] = $playlistModel->findAll();

  
    if ($this->request->getMethod() === 'post') {
        $validationRules = [
            'music_file' => 'uploaded[music_file]|mime_in[music_file,audio/mpeg,audio/ogg]',
        ];

        if ($this->validate($validationRules)) {
            $file = $this->request->getFile('music_file');

            $title = $file->getName();

            $newFileName = $file->getRandomName();

            $uploadPath = ROOTPATH . 'public/uploads/';

            if ($file->move($uploadPath, $newFileName)) {
    
                $musicModel->insert([
                    'title' => $title,
                    'file_name' => $newFileName,
                    'playlist' => $this->request->getPost('playlist'),
                ]);

                return redirect()->to('music');
            } else {
     
                return redirect()->to('music/upload')->with('error', 'Failed to upload the file.');
            }
        }
    }

    return view('music_all_in_one', $data);
}


    public function play($id)
    {
 
        $musicModel = new \App\Models\MusicModel();
        $music = $musicModel->find($id);

        if ($music) {
          
            $musicPath = 'uploads/' . $music['file_name'];

           
            return view('music_all_in_one', ['music_to_play' => $music, 'music_path' => $musicPath]);
        } else {
          
            return redirect()->to('music');
        }
    }

    public function delete($id)
    {
      
        $musicModel = new \App\Models\MusicModel(); 
        $music = $musicModel->find($id);

        if ($music) {
            $musicModel->delete($id);
        
            return redirect()->to('music');
        } else {
            
            return redirect()->to('music');
        }
    }

    public function delete_confirm($id)
    {
       
        $musicModel = new \App\Models\MusicModel(); 
        $music = $musicModel->find($id);

        if ($music) {
          
            $musicPath = ROOTPATH . 'public/uploads/' . $music['file_name'];
            if (file_exists($musicPath)) {
                unlink($musicPath);
            }

        
            $musicModel->delete($id);

           
            return redirect()->to('music');
        } else {
          
            return redirect()->to('music');
        }
    }
}