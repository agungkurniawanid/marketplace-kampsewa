<?php

namespace App\Http\Controllers\Developer;

use App\Http\Controllers\Controller;
use App\Models\BalasFeedback;
use App\Models\Feedback;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use RealRashid\SweetAlert\Facades\Alert;

class NotificationController extends Controller
{
    public function __construct()
    {
        $this->middleware('dev');
    }
    public function index()
    {
        // Ambil user berdasarkan yang baru saja terdaftar
        $user_baru_terdaftar = User::select('users.*')
            ->join('status_notifikasi_user', 'users.id', '=', 'status_notifikasi_user.id_user')
            ->where('users.type', 0)
            ->whereDate('users.created_at', Carbon::today())
            ->where('status_notifikasi_user.status', 'unread')
            ->orderByDesc('users.created_at')
            ->limit(10)
            ->get();

        $all_data_feedback = Feedback::leftJoin('users', 'users.id', '=', 'feedback.id_user')
            ->select('feedback.*', 'users.name', 'users.foto');

        $feedback = clone $all_data_feedback;
        $feedback = $feedback->where('feedback.status', 'Belum Dibalas')
            ->paginate(20);

        $feedback_reply = clone $all_data_feedback;
        $feedback_reply = $feedback_reply->where('feedback.status', 'Dibalas')
            ->paginate(20);

        return view('developers.notification')->with([
            'title' => 'Dashboard | Notification',
            'user_baru_terdaftar' => $user_baru_terdaftar,
            'feedback' => $feedback,
            'reply' => $feedback_reply,
        ]);
    }

    public function balasSemuaFeedback(Request $request)
    {
        try {
            $request->validate([
                'balasan' => 'required|string',
            ]);

            $feedbackBelumDijawab = Feedback::where('status', 'Belum dibalas')->get();
            $idUserBalas = Auth::id();

            foreach ($feedbackBelumDijawab as $feedback) {
                BalasFeedback::create([
                    'id_feedback' => $feedback->id,
                    'id_user' => $idUserBalas,
                    'balasan' => $request->input('balasan'),
                ]);
                $feedback->status = 'Dibalas';
                $feedback->save();
            }

            Log::info('Berhasil membalas semua feedback yang belum dijawab.');

            Alert::toast('Balasan telah berhasil dikirimkan', 'success');
            return redirect()->back();
        } catch (ValidationException $e) {
            Log::error('Validasi gagal saat membalas feedback: ' . $e->getMessage());
            return redirect()->back()->withErrors($e->validator->errors())->withInput();
        } catch (\Exception $e) {
            Log::error('Terjadi kesalahan saat membalas feedback: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan saat membalas feedback.');
        }
    }
}
