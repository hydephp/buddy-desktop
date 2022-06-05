<?php

namespace App\Http\Livewire;

use App\Core\Navigation\NavigationItem;
use Illuminate\Support\Collection;
use Livewire\Component;

class Sidebar extends Component
{
    public Collection $items;

    public function mount()
    {
        $this->items = new Collection();

        $this->items->push(new NavigationItem(
            'Dashboard',
            'dashboard',
            '<svg xmlns="http://www.w3.org/2000/svg" height="18px" viewBox="0 0 24 24" width="18px" fill="#000000"><path d="M0 0h24v24H0z" fill="none"/><path d="M3 13h8V3H3v10zm0 8h8v-6H3v6zm10 0h8V11h-8v10zm0-18v6h8V3h-8z"/></svg>'
        ));

        $this->items->push(new NavigationItem(
            'Site Browser',
            'dashboard.browser',
            '<svg xmlns="http://www.w3.org/2000/svg" height="18px" viewBox="0 0 24 24" width="18px" fill="#000000"><path d="M0 0h24v24H0z" fill="none"/><path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm-5 14H4v-4h11v4zm0-5H4V9h11v4zm5 5h-4V9h4v9z"/></svg>'
        ));

        $this->items->push(new NavigationItem(
            'Blog Posts',
            'posts.index',
            '<svg xmlns="http://www.w3.org/2000/svg" height="18px" viewBox="0 0 24 24" width="18px" fill="#000000"><path d="M0 0h24v24H0z" fill="none"/><circle cx="6.18" cy="17.82" r="2.18"/><path d="M4 4.44v2.83c7.03 0 12.73 5.7 12.73 12.73h2.83c0-8.59-6.97-15.56-15.56-15.56zm0 5.66v2.83c3.9 0 7.07 3.17 7.07 7.07h2.83c0-5.47-4.43-9.9-9.9-9.9z"/></svg>'
        ));


        $this->items->push(new NavigationItem(
            'Terminal',
            'dashboard.terminal',
            '<svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 20 20" height="20" viewBox="0 0 20 20" width="20"><g><rect fill="none" height="20" width="20"/></g><g><path d="M16.5,4h-13C2.67,4,2,4.67,2,5.5v9C2,15.33,2.67,16,3.5,16h13c0.83,0,1.5-0.67,1.5-1.5v-9C18,4.67,17.33,4,16.5,4z M3.5,14.5V7h13v7.5H3.5z M15,13.5h-5V12h5V13.5z M6.25,13.5l-1.06-1.06l1.69-1.69L5.19,9.06L6.25,8L9,10.75L6.25,13.5z"/></g></svg>'
        ));
    }

    public function render()
    {
        return view('livewire.sidebar', [
            'active' => request()->route()->getName(),
            'items' => $this->items,
        ]);
    }
}
