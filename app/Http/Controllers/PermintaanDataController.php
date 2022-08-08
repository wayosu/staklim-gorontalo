<?php

namespace App\Http\Controllers;

use App\Mail\SedangProsesMail;
use App\Mail\TolakMail;
use App\Mail\VerifikasiMail;
use App\Models\PermintaanData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;

class PermintaanDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        if (Auth::user()->hasRole('admin')) {
            $permintaandatas = PermintaanData::orderby('created_at', 'desc')
                                            ->get();
        } else if (Auth::user()->hasRole('kepalabidang')) {
            $permintaandatas = PermintaanData::where('status', "=", 1)
                                            ->orWhere('status', "=", 2)
                                            ->orderby('created_at', 'desc')
                                            ->get();
        } else {
            $permintaandatas = PermintaanData::where('user_id', Auth::user()->id)
                                            ->orderby('created_at', 'desc')
                                            ->get();
        }
        return view('user.user-login.permintaan-data.index', compact('permintaandatas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.user-login.permintaan-data.create');  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => ['required'],
            'pengantar' => ['required', 'mimes:doc,docx,pdf', 'max:2000'],
            'proposal' => ['required', 'mimes:doc,docx,pdf', 'max:2000'],
            'pernyataan' => ['required', 'mimes:doc,docx,pdf', 'max:2000'],
            'pendukung1' => ['mimes:doc,docx,pdf', 'max:2000'],
            'pendukung2' => ['mimes:doc,docx,pdf', 'max:2000'],
            'unsur_iklim' => ['required'],
        ],
        [
            'pengantar.max' => 'Ukuran file melebihi 2 MB.',
            'proposal.max' => 'Ukuran file melebihi 2 MB.',
            'pernyataan.max' => 'Ukuran file melebihi 2 MB.',
            'pendukung1.max' => 'Ukuran file melebihi 2 MB.',
            'pendukung2.max' => 'Ukuran file melebihi 2 MB.',
        ]);

        if ($request->has('pendukung1')) {
            $pendukung1 = $request->pendukung1;
            $new_pendukung1 = time().$pendukung1->getClientOriginalName();
            $pendukung1->move('uploads/user/permintaandata/pendukung1/', $new_pendukung1);
        }

        if ($request->has('pendukung2')) {
            $pendukung2 = $request->pendukung2;
            $new_pendukung2 = time().$pendukung2->getClientOriginalName();
            $pendukung2->move('uploads/user/permintaandata/pendukung2/', $new_pendukung2);
        }

        $pengantar = $request->pengantar;
        $proposal = $request->proposal;
        $pernyataan = $request->pernyataan;
        $new_pengantar  = time().$pengantar->getClientOriginalName();
        $new_proposal  = time().$proposal->getClientOriginalName();
        $new_pernyataan  = time().$pernyataan->getClientOriginalName();

        $permintaan_data = [
            'user_id' => Auth::user()->id,
            'judul' => $request->judul,
            'pengantar' => 'uploads/user/permintaandata/pengantar/'.$new_pengantar,
            'proposal' => 'uploads/user/permintaandata/proposal/'.$new_proposal,
            'pernyataan' => 'uploads/user/permintaandata/pernyataan/'.$new_pernyataan,
            'unsur_iklim' => $request->unsur_iklim,
            'status' => 0,
        ];

         if ($request->has('pendukung1')) {
            $reqpen1 = [
                'file_pendukung_satu' => 'uploads/user/permintaandata/pendukung1/'.$new_pendukung1,
            ];
            $permintaan_data = array_merge($permintaan_data, $reqpen1);
        }
        
        if ($request->has('pendukung2')) {
            $reqpen2 = [
                'file_pendukung_dua' => 'uploads/user/permintaandata/pendukung2/'.$new_pendukung2,
            ];
            $permintaan_data = array_merge($permintaan_data, $reqpen2);
        }

        $reqdata = PermintaanData::create($permintaan_data);

        if ($reqdata)
        {
            $pengantar->move('uploads/user/permintaandata/pengantar/', $new_pengantar);
            $proposal->move('uploads/user/permintaandata/proposal/', $new_proposal);
            $pernyataan->move('uploads/user/permintaandata/pernyataan/', $new_pernyataan);
            return redirect()->route('user.permintaan-data');
        }
        else
        {
            return redirect()->route('user.permintaan-data');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PermintaanData  $permintaanData
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pd = PermintaanData::findorfail($id);
        return view('user.user-login.permintaan-data.show', compact('pd'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PermintaanData  $permintaanData
     * @return \Illuminate\Http\Response
     */
    public function edit(PermintaanData $permintaanData)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PermintaanData  $permintaanData
     * @return \Illuminate\Http\Response
     */
    public function teruskan($id)
    {
        $pd = PermintaanData::findorfail($id);

        $pd->update([
            'status' => 1,
        ]);

        $emailData = $pd;

        Mail::to($pd->user->email)->send(new SedangProsesMail($emailData));

        return redirect()->route('admin.permintaan-data');
    }

    public function tolak(Request $request, $id)
    {
        $pd = PermintaanData::findorfail($id);

        $pd->update([
            'status' => 3,
            'alasan' => $request->alasan
        ]);

        $emailData = $pd;

        Mail::to($pd->user->email)->send(new TolakMail($emailData));

        return redirect()->route('admin.permintaan-data');
    }

    public function verifikasi($id)
    {
        $pd = PermintaanData::findorfail($id);

        $pd->update([
            'status' => 2,
        ]);

        $emailData = $pd;

        Mail::to($pd->user->email)->send(new VerifikasiMail($emailData));

        return redirect()->route('kepalabidang.permintaan-data');
    }

    // public function testemail()
    // {
    //     $mailData = PermintaanData::findorfail(2);
    //     return view('emails.sedangProsesMail', compact('mailData'));
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PermintaanData  $permintaanData
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $infohb = PermintaanData::findOrFail($id);
        $pengantar = $infohb->pengantar;
        if (File::exists($pengantar)) {
            File::delete($pengantar);
        }

        $proposal = $infohb->proposal;
        if (File::exists($proposal)) {
            File::delete($proposal);
        }

        $pernyataan = $infohb->pernyataan;
        if (File::exists($pernyataan)) {
            File::delete($pernyataan);
        }

        $file_pendukung_satu = $infohb->file_pendukung_satu;
        if (File::exists($file_pendukung_satu)) {
            File::delete($file_pendukung_satu);
        }

        $file_pendukung_dua = $infohb->file_pendukung_dua;
        if (File::exists($file_pendukung_dua)) {
            File::delete($file_pendukung_dua);
        }

        $infohb = PermintaanData::where('id', $id)->delete();

        return redirect()->route('user.permintaan-data');
    }

    public function senddata($id)
    {
        $data = PermintaanData::findorfail($id);
        return view('user.user-login.permintaan-data.senddata', compact('data'));
    }

    public function sendingdata(Request $request, $id)
    {
        $request->validate([
            'pesan' => ['required'],
            'file_data' => ['required','max:4000']
        ],
        [
            'file_data.max' => 'File yang anda masukkan melebihi 4 MB.'
        ]);

        $data = PermintaanData::findorfail($id);

        $file_data = $request->file_data;
        $new_file_data  = time().$file_data->getClientOriginalName();
        $file_data->move('uploads/user/permintaandata/filepermintaan/', $new_file_data);

        $data->update([
            'file_data' => 'uploads/user/permintaandata/filepermintaan/'.$new_file_data,
            'pesan' => $request->pesan
        ]);

        return redirect()->route('admin.permintaan-data');
    }
}
