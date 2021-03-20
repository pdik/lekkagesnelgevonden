<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class NotificationsComponent extends Component
{
    public function render()
    {
        $data['notifications'] = Auth::user()->notifications->whereNull('read_at');
        return view('livewire.notifications-component', $data);
    }

      public function markNotification($notification_id)
    {
        $notification = Auth::user()->notifications()->where('id', $notification_id)->firstOrFail();
        $notification->markAsRead();
    }
      public function markAllNotifications()
    {
        foreach (Auth::user()->notifications as $notification) {
            $notification->markAsRead();
        }
    }
}
