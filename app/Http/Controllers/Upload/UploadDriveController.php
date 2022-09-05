<?php

namespace App\Http\Controllers\Upload;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Google\Client;
use Google\Service\Drive;

class UploadDriveController extends Controller
{
    public $gClient;

    function __construct(){
        
        $this->gClient = new \Google_Client();
        
        $this->gClient->setApplicationName('Makin Mahir Upload'); // ADD YOUR AUTH2 APPLICATION NAME (WHEN YOUR GENERATE SECRATE KEY)
        $this->gClient->setClientId('289204401373-qua8npaks62fd61h8845pgmnill6j55i.apps.googleusercontent.com');
        $this->gClient->setClientSecret('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');
        $this->gClient->setRedirectUri(route('google.login'));
        $this->gClient->setDeveloperKey('AIzaSyBCS-YdSvs3bac8V1wCeHSfJuJVkDGlOvA');
        $this->gClient->setScopes(array(               
            'https://www.googleapis.com/auth/drive.file',
            'https://www.googleapis.com/auth/drive'
        ));
        
        $this->gClient->setAccessType("offline");
        
        $this->gClient->setApprovalPrompt("force");
    }
    
    // public function googleLogin(Request $request)  {
        
    //     $google_oauthV2 = new \Google_Service_Oauth2($this->gClient);

    //     if ($request->get('code')){

    //         $this->gClient->authenticate($request->get('code'));

    //         $request->session()->put('token', $this->gClient->getAccessToken());
    //     }

    //     if ($request->session()->get('token')){

    //         $this->gClient->setAccessToken($request->session()->get('token'));
    //     }

    //     if ($this->gClient->getAccessToken()){

    //         //FOR LOGGED IN USER, GET DETAILS FROM GOOGLE USING ACCES
    //         $user = Admin::find(1);

    //         $user->access_token = json_encode($request->session()->get('token'));

    //         $user->save();       

    //         dd("Successfully authenticated");
        
    //     } else{
            
    //         // FOR GUEST USER, GET GOOGLE LOGIN URL
    //         $authUrl = $this->gClient->createAuthUrl();

    //         return redirect()->to($authUrl);
    //     }
    // }

    public function googleDriveFileUpload($tipe,$file,$nama = null){

        //Cek apakah simpan sebagai file tambahan atau bukti tranfers

        switch ($tipe) {
            case 'cv':
                $tipeFile = [
                    'name' => $nama. '- CV -'. auth()->user()->nama .'-'. date('d/m/Y'),             // ADD YOUR GOOGLE DRIVE FOLDER NAME
                    'parents' => ['125guea0280wXH1Sfj9kvHgK9ByKPxceS'],
                ];

                break;
            case 'bukti':
                $tipeFile = [
                    'name' => 'BUKTI BAYAR -'.$nama. '-'. auth()->user()->nama .'-'. date('d/m/Y'),             // ADD YOUR GOOGLE DRIVE FOLDER NAME
                    'parents' => ['17ka9SqPFBMh9Wtxf14s0TFdWsTNEOXtn'],
                ];
                
                break;
            default:
                return 'error';
                
        }

        $service = new \Google_Service_Drive($this->gClient);

        $code = '
        {"access_token":"ya29.a0AVA9y1txKDKmCWUQU8K_br5dCXhnh0WENVLKp3AlcPKTIN6j8Su1RkJRovoeLt8f0FrA8xmn0OKUuwGw-j6UU0q0aFrriMX2ejC7krlG-jLrNnSaweRmwzefFmRUDKKd2LSxUsJ8cuUBEvfsYkUlbYAZKLqEaCgYKATASAQASFQE65dr8tZoqnm881RHxqZavWH8CWQ0163","expires_in":3599,"scope":"https:\/\/www.googleapis.com\/auth\/drive.file https:\/\/www.googleapis.com\/auth\/drive","token_type":"Bearer","created":1662106470,"refresh_token":"1\/\/0gkt_knquqWq2CgYIARAAGBASNwF-L9IrMwITrjW_JM-N6kLzZVZx-J7sH_vX_DXPaDCgSyj8y8nzd6Ce7TWUn3kA8jAL5jrNQEs"}
        ';

        $this->gClient->setAccessToken(json_decode($code,true));

        
        $fileMetadata = new \Google_Service_Drive_DriveFile($tipeFile);
        $files = file_get_contents($file);

        $result = $service->files->create($fileMetadata, array(
            'data' => $files, // ADD YOUR FILE PATH WHICH YOU WANT TO UPLOAD ON GOOGLE DRIVE
            'mimeType' => 'application/octet-stream',
            'uploadType' => 'media',
            'fields' => 'id'
        ));

        // GET URL OF UPLOADED FILE

        $url='https://drive.google.com/open?id='.$result->id;

        return $url;
    }

    // public function index(){
    //     try {
    //         $client = new Client();
    //         $client->useApplicationDefaultCredentials();
    //         $client->addScope(Drive::DRIVE);
    //         $driveService = new Drive($client);

    //         $fileMetadata = new Drive\DriveFile([
    //             'name' => 'konsultasi',             // ADD YOUR GOOGLE DRIVE FOLDER NAME
    //             'parents' => array('125guea0280wXH1Sfj9kvHgK9ByKPxceS'),
    //             //'mimeType' => 'application/vnd.google-apps.folder'
    //         ]);

    //         $content = file_get_contents(public_path('asset/home/home-banner.png'));
            
    //         $file = $driveService->files->create($fileMetadata, array([
    //             'data' => $content,
    //             'mimeType' => 'application/octet-stream',
    //             'uploadType' => 'media',
    //             'fields' => 'id',
    //         ]));

    //         $url='https://drive.google.com/open?id='.$file->id;

    //         dd($url);
    //     } catch(Exception $e) {
    //         dd($e);
    //     } 
    // }

}
