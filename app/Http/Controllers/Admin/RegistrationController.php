<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Registration;
use App\Models\Event;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function dbeventadmin()
    {
        $totalEvents = Event::count();
        $totalParticipans = Registration::distinct('id')->count('id');

        return view('admin.dashboard_admin', compact('totalEvents', 'totalParticipans'));
    }

    public function dbevent()
    {
        // Hitung jumlah event
        $totalEvents = Event::count();

        // Hitung jumlah event yang didaftar
        $totalRegisteredEvents = Registration::count();

        // Kirim data ke view
        return view('user.dashboard_user', compact('totalEvents', 'totalRegisteredEvents'));
    }

    // Menampilkan daftar partisipan
    public function listEvent()
    {
        // Ambil data event dengan status 'success'
        $events = Registration::where('status', 'success')->get();

        // Kirim data ke view
        return view('user.lihat_event', compact('events'));
    }

    public function index()
    {
        $registrations = Registration::with('event')->get();
        // dd($registrations); // Debug data
        // dd($registrations->first()->event);

        return view('admin.partisipan', compact('registrations'));
    }


    // Menampilkan form pendaftaran untuk event
    public function create()
    {
        $events = Event::all();

        return view('admin.registration.create', compact('events'));
    }

    // Menyimpan data registrasi partisipan
    public function store(Request $request)
    {

        Registration::create([
            'id' => $request->id,
            'id_event' => $request->event_id,
            'status' => $request->status,
            'alamat' => $request->alamat,
            'nama' => $request->nama,
            'nama_event' => $request->nama_event,
            'lokasi_event' => $request->LokasiEvent,
            'harga_tiket' => $request->harga_tiket,
            'deskripsi' => $request->deskripsi
        ]);

        return view('user.daftar_event');
    }

    // Menampilkan form untuk mengedit registrasi partisipan
    public function edit(Registration $registration)
    {
        $events = Event::all();
        return view('admin.registrations.edit', compact('registration', 'events'));
    }

    // Mengupdate data registrasi partisipan
    public function update(Request $request, Registration $registration)
    {
        $registration->update([
            'id_user' => $request->user_id,
            'id_event' => $request->event_id,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.registrations.index')->with('success', 'Pendaftaran berhasil diupdate!');
    }
    public function updatepartisipan(Request $request)
    {
        $registration = Registration::find($request->id);
        $registration->update([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.partisipan.index')->with('success', 'Data berhasil diperbarui');
    }


    // Menghapus registrasi partisipan
    public function destroy(Registration $registration)
    {
        $registration->delete();
        return redirect()->route('admin.registrations.index')->with('success', 'Pendaftaran berhasil dihapus!');
    }
    public function destroypartisipan($id)
    {
        $registration = Registration::findOrFail($id);
        $registration->delete();

        return redirect()->route('admin.partisipan.index')->with('success', 'Data berhasil dihapus');
    }

    public function getAllEvents()
    {
        $events = Event::all([
            'id',
            'nama_event',
            'harga_tiket',
            'deskripsi',
            'lokasi_event',
            'tanggal'
        ]);

        return response()->json($events);
    }
}
