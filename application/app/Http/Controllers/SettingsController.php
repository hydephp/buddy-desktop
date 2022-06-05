<?php

namespace App\Http\Controllers;

use App\Core\Contracts\BuddyConfiguration;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index(BuddyConfiguration $configuration)
    {
        return view('dashboard.settings', [
            'configuration' => $configuration,
            'config' => $configuration->getConfigurationObject(),
        ]);
    }

    public function update(Request $request, BuddyConfiguration $configuration)
    {
        //
    }

    public function destroy(BuddyConfiguration $configuration)
    {
        unlink($configuration->getConfigurationFilePath());

        return redirect()->back();
    }
}
