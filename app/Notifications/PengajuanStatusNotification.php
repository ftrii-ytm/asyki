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
     * Create a new notification instance.
     */
    public function __construct($pengajuan)
    {
        $this->pengajuan = $pengajuan;
    }

    /**
     * Get the notification's delivery channels.
     */
    public function via($notifiable)
    {
        return ['mail']; // atau ['database'] kalau mau disimpan di DB
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Pengajuan Disetujui oleh GA')
            ->greeting('Halo, ' . $this->pengajuan->nama_pengaju . '!')
            ->line('Pengajuan kamu dengan judul **' . $this->pengajuan->judul_pengajuan . '** telah disetujui oleh GA.')
            ->line('Jumlah barang: ' . $this->pengajuan->jumlah)
            ->line('Status: ' . strtoupper($this->pengajuan->status))
            ->action('Lihat Pengajuan', url('/pengajuan'))
            ->line('Terima kasih sudah melakukan pengajuan!');
    }
}
