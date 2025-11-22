<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class PengajuanApprovedNotification extends Notification
{
    use Queueable;

    protected $pengajuan;

    /**
     * Buat notifikasi baru
     */
    public function __construct($pengajuan)
    {
        $this->pengajuan = $pengajuan;
    }

    /**
     * Tentukan channel pengiriman notifikasi
     */
    public function via($notifiable)
    {
        return ['mail']; // bisa diganti ['database'] kalau mau disimpan di DB
    }

    /**
     * Format pesan email
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Pengajuan Disetujui oleh GA')
            ->greeting('Halo, ' . ($this->pengajuan->user->name ?? 'User') . '!')
            ->line('Pengajuan kamu dengan judul **' . $this->pengajuan->judul_pengajuan . '** telah disetujui oleh GA.')
            ->line('Jumlah barang: ' . ($this->pengajuan->jumlah ?? '-'))
            ->line('Status: ' . strtoupper($this->pengajuan->status))
            ->action('Lihat Pengajuan', url('/pengajuan'))
            ->line('Terima kasih sudah melakukan pengajuan!');
    }

    /**
     * Data notifikasi jika disimpan ke database
     */
    public function toArray($notifiable)
    {
        return [
            'id' => $this->pengajuan->id,
            'judul_pengajuan' => $this->pengajuan->judul_pengajuan,
            'status' => $this->pengajuan->status,
            'user' => $this->pengajuan->user->name ?? 'User',
        ];
    }
}
