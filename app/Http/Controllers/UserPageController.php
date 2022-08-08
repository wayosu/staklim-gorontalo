<?php

namespace App\Http\Controllers;

use App\Models\BuletinIklim;
use App\Models\IndeksPresipitasiTerstandarisasi;
use App\Models\InfoHth;
use App\Models\InformasiHujanBulanan;
use App\Models\InformasiHujanDasarian;
use App\Models\LogoBmkg;
use App\Models\PotensiBanjirDasarian;
use App\Models\PrakiraanHujanBulanan;
use App\Models\PrakiraanHujanDasarian;
use App\Models\PrakiraanMusim;
use App\Models\Sejarah;
use App\Models\SliderPeta;
use App\Models\StrukturOrganisasi;
use App\Models\TugasFungsi;
use App\Models\VisiMisi;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class UserPageController extends Controller
{
	public function beranda()
	{
		$sliderpeta = SliderPeta::get();
		
		$pram = DB::table('prakiraan_musims')
				->orderBy('created_at', 'desc')
				->first();

		$prahd = DB::table('prakiraan_hujan_dasarians')
				->orderBy('created_at', 'desc')
				->first();

		$ptnbd = DB::table('potensi_banjir_dasarians')
				->orderBy('created_at', 'desc')
				->first();

		$infohth = DB::table('info_hths')
				->orderBy('created_at', 'desc')
				->first();

		$infohb = DB::table('informasi_hujan_bulanans')
				->orderBy('created_at', 'desc')
				->first();

		$infohd = DB::table('informasi_hujan_dasarians')
				->orderBy('created_at', 'desc')
				->first();

		$indekspt = DB::table('indeks_presipitasi_terstandarisasis')
				->orderBy('created_at', 'desc')
				->first();

		return view('user.home', compact('sliderpeta', 'pram', 'prahd', 'ptnbd', 'infohth', 'infohb', 'infohd', 'indekspt'));
	}

	public function sejarah()
	{
		$data = Sejarah::first();

		$infohth = DB::table('info_hths')
				->orderBy('created_at', 'desc')
				->first();

		$buletin = DB::table('buletin_iklims')
				->orderBy('created_at', 'desc')
				->first();

		$pram = DB::table('prakiraan_musims')
				->orderBy('created_at', 'desc')
				->first();

		$prahd = DB::table('prakiraan_hujan_dasarians')
				->orderBy('created_at', 'desc')
				->first();

		$ptnbd = DB::table('potensi_banjir_dasarians')
				->orderBy('created_at', 'desc')
				->first();

		return view('user.profil', compact('data', 'infohth', 'buletin', 'pram', 'prahd', 'ptnbd'));
	}

	public function visimisi()
	{
		$data = VisiMisi::first();

		$infohth = DB::table('info_hths')
				->orderBy('created_at', 'desc')
				->first();

		$buletin = DB::table('buletin_iklims')
				->orderBy('created_at', 'desc')
				->first();

		$pram = DB::table('prakiraan_musims')
				->orderBy('created_at', 'desc')
				->first();

		$prahd = DB::table('prakiraan_hujan_dasarians')
				->orderBy('created_at', 'desc')
				->first();

		$ptnbd = DB::table('potensi_banjir_dasarians')
				->orderBy('created_at', 'desc')
				->first();

		return view('user.profil', compact('data', 'infohth', 'buletin', 'pram', 'prahd', 'ptnbd'));
	}

	public function tugasfungsi()
	{
		$data = TugasFungsi::first();

		$infohth = DB::table('info_hths')
				->orderBy('created_at', 'desc')
				->first();

		$buletin = DB::table('buletin_iklims')
				->orderBy('created_at', 'desc')
				->first();

		$pram = DB::table('prakiraan_musims')
				->orderBy('created_at', 'desc')
				->first();

		$prahd = DB::table('prakiraan_hujan_dasarians')
				->orderBy('created_at', 'desc')
				->first();

		$ptnbd = DB::table('potensi_banjir_dasarians')
				->orderBy('created_at', 'desc')
				->first();

		return view('user.profil', compact('data', 'infohth', 'buletin', 'pram', 'prahd', 'ptnbd'));
	}

	public function strukturorganisasi()
	{
		$data = StrukturOrganisasi::first();

		$infohth = DB::table('info_hths')
				->orderBy('created_at', 'desc')
				->first();

		$buletin = DB::table('buletin_iklims')
				->orderBy('created_at', 'desc')
				->first();

		$pram = DB::table('prakiraan_musims')
				->orderBy('created_at', 'desc')
				->first();

		$prahd = DB::table('prakiraan_hujan_dasarians')
				->orderBy('created_at', 'desc')
				->first();

		$ptnbd = DB::table('potensi_banjir_dasarians')
				->orderBy('created_at', 'desc')
				->first();

		return view('user.profil', compact('data', 'infohth', 'buletin', 'pram', 'prahd', 'ptnbd'));
	}

	public function logobmkg()
	{
		$data = LogoBmkg::first();

		$infohth = DB::table('info_hths')
				->orderBy('created_at', 'desc')
				->first();

		$buletin = DB::table('buletin_iklims')
				->orderBy('created_at', 'desc')
				->first();

		$pram = DB::table('prakiraan_musims')
				->orderBy('created_at', 'desc')
				->first();

		$prahd = DB::table('prakiraan_hujan_dasarians')
				->orderBy('created_at', 'desc')
				->first();

		$ptnbd = DB::table('potensi_banjir_dasarians')
				->orderBy('created_at', 'desc')
				->first();

		return view('user.profil', compact('data', 'infohth', 'buletin', 'pram', 'prahd', 'ptnbd'));
	}

    public function informasiHTH()
    {
        $infohth = DB::table('info_hths')
                    ->latest()
                    ->take(5)
                    ->get();
        $latest = $infohth->splice(0, 1);
        $others = $infohth->splice(0, 4);

        $buletin = DB::table('buletin_iklims')
                    ->orderBy('created_at', 'desc')
                    ->first();
        
        $pram = DB::table('prakiraan_musims')
                    ->orderBy('created_at', 'desc')
                    ->first();

        $prahd = DB::table('prakiraan_hujan_dasarians')
                    ->orderBy('created_at', 'desc')
                    ->first();

        $ptnbd = DB::table('potensi_banjir_dasarians')
                    ->orderBy('created_at', 'desc')
                    ->first();

        // dd($latest);

        return view('user.informasi-hth', compact('latest', 'others', 'buletin', 'prahd', 'pram', 'ptnbd'));
    }

	
	public function viewinfoHTH($slug)
	{
		$data = InfoHth::where('slug', $slug)
					->first();

		$others = InfoHth::where('slug', '!=', $slug)
					->latest()
					->take(4)
					->get();

        $buletin = DB::table('buletin_iklims')
                    ->orderBy('created_at', 'desc')
                    ->first();

        $pram = DB::table('prakiraan_musims')
                    ->orderBy('created_at', 'desc')
                    ->first();

        $prahd = DB::table('prakiraan_hujan_dasarians')
                    ->orderBy('created_at', 'desc')
                    ->first();

        $ptnbd = DB::table('potensi_banjir_dasarians')
                    ->orderBy('created_at', 'desc')
                    ->first();

		return view('user.viewpage', compact('data', 'others', 'buletin', 'pram', 'prahd', 'ptnbd'));
	}

    public function buletinI()
    {
        $buletin = DB::table('buletin_iklims')
                    ->latest()
                    ->take(5)
                    ->get();
        $latest = $buletin->splice(0, 1);
        $others = $buletin->splice(0, 4);

        $pram = DB::table('prakiraan_musims')
                    ->orderBy('created_at', 'desc')
                    ->first();

        $prahd = DB::table('prakiraan_hujan_dasarians')
                    ->orderBy('created_at', 'desc')
                    ->first();

        $ptnbd = DB::table('potensi_banjir_dasarians')
                    ->orderBy('created_at', 'desc')
                    ->first();

        $infohth = DB::table('info_hths')
                    ->orderBy('created_at', 'desc')
                    ->first();

        // dd($latest);

        return view('user.buletin-i', compact('latest', 'others', 'prahd', 'pram', 'ptnbd', 'infohth'));
    }

	public function viewbuletinI($slug)
	{
		$data = BuletinIklim::where('slug', $slug)
					->first();

		$others = BuletinIklim::where('slug', '!=', $slug)
					->latest()
					->take(4)
					->get();

        $infohth = DB::table('info_hths')
                    ->orderBy('created_at', 'desc')
                    ->first();

        $pram = DB::table('prakiraan_musims')
                    ->orderBy('created_at', 'desc')
                    ->first();

        $prahd = DB::table('prakiraan_hujan_dasarians')
                    ->orderBy('created_at', 'desc')
                    ->first();

        $ptnbd = DB::table('potensi_banjir_dasarians')
                    ->orderBy('created_at', 'desc')
                    ->first();

		return view('user.viewpage', compact('data', 'others', 'infohth', 'pram', 'prahd', 'ptnbd'));
	}

    public function informasiHB()
    {
        $infohb = DB::table('informasi_hujan_bulanans')
                ->latest()
                ->take(5)
                ->get();
        $latest = $infohb->splice(0, 1);
        $others = $infohb->splice(0, 4);

        $pram = DB::table('prakiraan_musims')
                ->orderBy('created_at', 'desc')
                ->first();

        $prahd = DB::table('prakiraan_hujan_dasarians')
                ->orderBy('created_at', 'desc')
                ->first();

        $ptnbd = DB::table('potensi_banjir_dasarians')
                ->orderBy('created_at', 'desc')
                ->first();

        $infohth = DB::table('info_hths')
                ->orderBy('created_at', 'desc')
                ->first();

        $buletin = DB::table('buletin_iklims')
                ->orderBy('created_at', 'desc')
                ->first();

        // dd($latest);

        return view('user.informasi-hb', compact('latest', 'others', 'prahd', 'pram', 'ptnbd', 'infohth', 'buletin'));
    }

	public function viewinfoHB($slug)
	{
		$data = InformasiHujanBulanan::where('slug', $slug)
					->first();

		$others = InformasiHujanBulanan::where('slug', '!=', $slug)
					->latest()
					->take(4)
					->get();

		$buletin = DB::table('buletin_iklims')
                    ->orderBy('created_at', 'desc')
                    ->first();

        $infohth = DB::table('info_hths')
                    ->orderBy('created_at', 'desc')
                    ->first();

        $pram = DB::table('prakiraan_musims')
                    ->orderBy('created_at', 'desc')
                    ->first();

        $prahd = DB::table('prakiraan_hujan_dasarians')
                    ->orderBy('created_at', 'desc')
                    ->first();

        $ptnbd = DB::table('potensi_banjir_dasarians')
                    ->orderBy('created_at', 'desc')
                    ->first();

		return view('user.viewpage', compact('data', 'others', 'buletin', 'infohth', 'pram', 'prahd', 'ptnbd'));
	}

    public function informasiHD()
    {
        $infohd = DB::table('informasi_hujan_dasarians')
                ->latest()
                ->take(5)
                ->get();
        $latest = $infohd->splice(0, 1);
        $others = $infohd->splice(0, 4);

        $pram = DB::table('prakiraan_musims')
                ->orderBy('created_at', 'desc')
                ->first();

        $prahd = DB::table('prakiraan_hujan_dasarians')
                ->orderBy('created_at', 'desc')
                ->first();

        $ptnbd = DB::table('potensi_banjir_dasarians')
                ->orderBy('created_at', 'desc')
                ->first();

        $infohth = DB::table('info_hths')
                ->orderBy('created_at', 'desc')
                ->first();

        $buletin = DB::table('buletin_iklims')
                ->orderBy('created_at', 'desc')
                ->first();

        // dd($latest);

        return view('user.informasi-hd', compact('latest', 'others', 'prahd', 'pram', 'ptnbd', 'infohth', 'buletin'));
    }

	public function viewinfoHD($slug)
	{
		$data = InformasiHujanDasarian::where('slug', $slug)
					->first();

		$others = InformasiHujanDasarian::where('slug', '!=', $slug)
					->latest()
					->take(4)
					->get();

		$buletin = DB::table('buletin_iklims')
                    ->orderBy('created_at', 'desc')
                    ->first();

        $infohth = DB::table('info_hths')
                    ->orderBy('created_at', 'desc')
                    ->first();

        $pram = DB::table('prakiraan_musims')
                    ->orderBy('created_at', 'desc')
                    ->first();

        $prahd = DB::table('prakiraan_hujan_dasarians')
                    ->orderBy('created_at', 'desc')
                    ->first();

        $ptnbd = DB::table('potensi_banjir_dasarians')
                    ->orderBy('created_at', 'desc')
                    ->first();

		return view('user.viewpage', compact('data', 'others', 'buletin', 'infohth', 'pram', 'prahd', 'ptnbd'));
	}

    public function indeksPT()
    {
        $indekspt = DB::table('indeks_presipitasi_terstandarisasis')
                ->latest()
                ->take(5)
                ->get();
        $latest = $indekspt->splice(0, 1);
        $others = $indekspt->splice(0, 4);

        $pram = DB::table('prakiraan_musims')
                ->orderBy('created_at', 'desc')
                ->first();

        $prahd = DB::table('prakiraan_hujan_dasarians')
                ->orderBy('created_at', 'desc')
                ->first();

        $ptnbd = DB::table('potensi_banjir_dasarians')
                ->orderBy('created_at', 'desc')
                ->first();

        $infohth = DB::table('info_hths')
                ->orderBy('created_at', 'desc')
                ->first();

        $buletin = DB::table('buletin_iklims')
                ->orderBy('created_at', 'desc')
                ->first();

        // dd($latest);

        return view('user.indeks-pt', compact('latest', 'others', 'prahd', 'pram', 'ptnbd', 'infohth', 'buletin'));
    }

	public function viewindeksPT($slug)
	{
		$data = IndeksPresipitasiTerstandarisasi::where('slug', $slug)
					->first();

		$others = IndeksPresipitasiTerstandarisasi::where('slug', '!=', $slug)
					->latest()
					->take(4)
					->get();

		$buletin = DB::table('buletin_iklims')
                    ->orderBy('created_at', 'desc')
                    ->first();

        $infohth = DB::table('info_hths')
                    ->orderBy('created_at', 'desc')
                    ->first();

        $pram = DB::table('prakiraan_musims')
                    ->orderBy('created_at', 'desc')
                    ->first();

        $prahd = DB::table('prakiraan_hujan_dasarians')
                    ->orderBy('created_at', 'desc')
                    ->first();

        $ptnbd = DB::table('potensi_banjir_dasarians')
                    ->orderBy('created_at', 'desc')
                    ->first();

		return view('user.viewpage', compact('data', 'others', 'buletin', 'infohth', 'pram', 'prahd', 'ptnbd'));
	}

    public function prakiraanHB()
    {
        $date = date('Y-m-d');

        $date1 = date('Y-m', strtotime('+1 month', strtotime($date)));
        $month_name1 = Carbon::parse($date1)->locale('ID')->format('F Y');

        $date2 = date('Y-m', strtotime('+2 month', strtotime($date)));
        $month_name2 = Carbon::parse($date2)->locale('ID')->format('F Y');

        $date3 = date('Y-m', strtotime('+3 month', strtotime($date)));
        $month_name3 = Carbon::parse($date3)->locale('ID')->format('F Y');

        $month_curah1 = DB::table('prakiraan_hujan_bulanans')
                            ->where('bulan_tahun', $date1)
                            ->where('kategori', 'curah')
                            ->first();

        $month_sifat1 = DB::table('prakiraan_hujan_bulanans')
                            ->where('bulan_tahun', $date1)
                            ->where('kategori', 'sifat')
                            ->first();

        $month_curah2 = DB::table('prakiraan_hujan_bulanans')
                            ->where('bulan_tahun', $date2)
                            ->where('kategori', 'curah')
                            ->first();
        
        $month_sifat2 = DB::table('prakiraan_hujan_bulanans')
                            ->where('bulan_tahun', $date2)
                            ->where('kategori', 'sifat')
                            ->first();

        $month_curah3 = DB::table('prakiraan_hujan_bulanans')
                            ->where('bulan_tahun', $date3)
                            ->where('kategori', 'curah')
                            ->first();
        
        $month_sifat3 = DB::table('prakiraan_hujan_bulanans')
                            ->where('bulan_tahun', $date3)
                            ->where('kategori', 'sifat')
                            ->first();

        $month_peluang1 = DB::table('prakiraan_hujan_bulanans')
                            ->where('bulan_tahun', $date1)
                            ->where('kategori', 'peluang')
                            ->get();
        
        $month_peluang2 = DB::table('prakiraan_hujan_bulanans')
                            ->where('bulan_tahun', $date2)
                            ->where('kategori', 'peluang')
                            ->get();

        $month_peluang3 = DB::table('prakiraan_hujan_bulanans')
                            ->where('bulan_tahun', $date3)
                            ->where('kategori', 'peluang')
                            ->get();


        $buletin = DB::table('buletin_iklims')
                    ->orderBy('created_at', 'desc')
                    ->first();

        $infohth = DB::table('info_hths')
                    ->orderBy('created_at', 'desc')
                    ->first();

        $prahd = DB::table('prakiraan_hujan_dasarians')
                    ->orderBy('created_at', 'desc')
                    ->first();

        $pram = DB::table('prakiraan_musims')
                    ->orderBy('created_at', 'desc')
                    ->first();

        $ptnbd = DB::table('potensi_banjir_dasarians')
                    ->orderBy('created_at', 'desc')
                    ->first();

        // dd($month_curah1);
        return view('user.prakiraan-hb', compact('month_name1', 'month_name2', 'month_name3', 'month_curah1', 'month_curah2', 'month_curah3', 'month_sifat1', 'month_sifat2', 'month_sifat3', 'month_peluang1', 'month_peluang2', 'month_peluang3', 'buletin', 'prahd', 'pram', 'ptnbd', 'infohth'));
    }

    public function prakiraanHD()
    {
        $prahd = DB::table('prakiraan_hujan_dasarians')
                    ->latest()
                    ->take(5)
                    ->get();
        $latest = $prahd->splice(0, 1);
        $others = $prahd->splice(0, 4);

        $buletin = DB::table('buletin_iklims')
                    ->orderBy('created_at', 'desc')
                    ->first();

        $pram = DB::table('prakiraan_musims')
                    ->orderBy('created_at', 'desc')
                    ->first();

        $ptnbd = DB::table('potensi_banjir_dasarians')
                    ->orderBy('created_at', 'desc')
                    ->first();

        $infohth = DB::table('info_hths')
                    ->orderBy('created_at', 'desc')
                    ->first();

        // dd($latest);

        return view('user.prakiraan-hd', compact('latest', 'others', 'pram', 'buletin', 'ptnbd', 'infohth'));
    }

	public function viewpraHD($slug)
	{
		$data = PrakiraanHujanDasarian::where('slug', $slug)
					->first();

		$others = PrakiraanHujanDasarian::where('slug', '!=', $slug)
					->latest()
					->take(4)
					->get();

		$buletin = DB::table('buletin_iklims')
                    ->orderBy('created_at', 'desc')
                    ->first();

        $infohth = DB::table('info_hths')
                    ->orderBy('created_at', 'desc')
                    ->first();

        $pram = DB::table('prakiraan_musims')
                    ->orderBy('created_at', 'desc')
                    ->first();

        $ptnbd = DB::table('potensi_banjir_dasarians')
                    ->orderBy('created_at', 'desc')
                    ->first();

		return view('user.viewpage', compact('data', 'others', 'buletin', 'infohth', 'pram', 'ptnbd'));
	}

    public function prakiraanM()
    {
        $pram = DB::table('prakiraan_musims')
                    ->latest()
                    ->take(5)
                    ->get();
        $latest = $pram->splice(0, 1);
        $others = $pram->splice(0, 4);

        $buletin = DB::table('buletin_iklims')
                    ->orderBy('created_at', 'desc')
                    ->first();

        $prahd = DB::table('prakiraan_hujan_dasarians')
                    ->orderBy('created_at', 'desc')
                    ->first();

        $ptnbd = DB::table('potensi_banjir_dasarians')
                    ->orderBy('created_at', 'desc')
                    ->first();

        $infohth = DB::table('info_hths')
                    ->orderBy('created_at', 'desc')
                    ->first();            

        // dd($latest);

        return view('user.prakiraan-m', compact('latest', 'others', 'prahd', 'buletin', 'ptnbd', 'infohth'));
    }

	public function viewpraM($slug)
	{
		$data = PrakiraanMusim::where('slug', $slug)
					->first();

		$others = PrakiraanMusim::where('slug', '!=', $slug)
					->latest()
					->take(4)
					->get();

		$buletin = DB::table('buletin_iklims')
                    ->orderBy('created_at', 'desc')
                    ->first();

        $infohth = DB::table('info_hths')
                    ->orderBy('created_at', 'desc')
                    ->first();

        $prahd = DB::table('prakiraan_hujan_dasarians')
                    ->orderBy('created_at', 'desc')
                    ->first();

        $ptnbd = DB::table('potensi_banjir_dasarians')
                    ->orderBy('created_at', 'desc')
                    ->first();

		return view('user.viewpage', compact('data', 'others', 'buletin', 'infohth', 'prahd', 'ptnbd'));
	}

    public function potensiBD()
    {
        $ptnbd = DB::table('potensi_banjir_dasarians')
                    ->latest()
                    ->take(5)
                    ->get();
        $latest = $ptnbd->splice(0, 1);
        $others = $ptnbd->splice(0, 4);

        $buletin = DB::table('buletin_iklims')
                    ->orderBy('created_at', 'desc')
                    ->first();

        $pram = DB::table('prakiraan_musims')
                    ->orderBy('created_at', 'desc')
                    ->first();

        $prahd = DB::table('prakiraan_hujan_dasarians')
                    ->orderBy('created_at', 'desc')
                    ->first();

        $infohth = DB::table('info_hths')
                    ->orderBy('created_at', 'desc')
                    ->first();

        // dd($latest);

        return view('user.potensi-bd', compact('latest', 'others', 'pram', 'buletin', 'prahd', 'infohth'));
    }

	public function viewptnBD($slug)
	{
		$data = PotensiBanjirDasarian::where('slug', $slug)
					->first();

		$others = PotensiBanjirDasarian::where('slug', '!=', $slug)
					->latest()
					->take(4)
					->get();

		$buletin = DB::table('buletin_iklims')
                    ->orderBy('created_at', 'desc')
                    ->first();

        $infohth = DB::table('info_hths')
                    ->orderBy('created_at', 'desc')
                    ->first();

        $prahd = DB::table('prakiraan_hujan_dasarians')
                    ->orderBy('created_at', 'desc')
                    ->first();

        $pram = DB::table('prakiraan_musims')
                    ->orderBy('created_at', 'desc')
                    ->first();

		return view('user.viewpage', compact('data', 'others', 'buletin', 'infohth', 'prahd', 'pram'));
	}
}