<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use Illuminate\Http\Request;

class CampaignController extends Controller
{
    // 1. Menampilkan semua kampanye
    public function index()
    {
        $campaigns = Campaign::all();
        return response()->json(["data" => $campaigns]);
    }

    // 2. Menambahkan kampanye baru
    public function store(Request $request)
    {
        $request->validate([
            "nameCampaign" => "required",
            "target"       => "required|numeric|min:1",
            "discount"     => "required|numeric|min:1",
        ]);

        // Buat Campaign
        $campaign = Campaign::create([
            "nameCampaign" => $request->input("nameCampaign"),
            "target"       => $request->input("target"),
            "discount"     => $request->input("discount"),
        ]);



        return response()->json(["message" => "Campaign and Product created successfully", "data" => ["campaign" => $campaign]], 201);
    }

    public function show($id)
{
    try {
        $campaign = Campaign::findOrFail($id);
        return response()->json(["data" => $campaign]);
    } catch (\Exception $e) {
        return response()->json(["error" => $e->getMessage()], 404);
    }
}

    // 3. Memperbarui kampanye berdasarkan ID
    public function update(Request $request, $id)
    {
        $request->validate([
            "nameCampaign" => "required",
            "target"       => "required|numeric|min:1",
            "discount"     => "required|numeric|min:1|max:100",
        ]);

        try {
            $campaign = Campaign::findOrFail($id);
            $campaign->update($request->all());
            return response()->json(["message" => "Campaign updated successfully", "data" => $campaign]);
        } catch (\Exception $e) {
            return response()->json(["error" => $e->getMessage()], 500);
        }
    }

    // 4. Menghapus kampanye berdasarkan ID
    public function destroy($id)
    {
        $campaign = Campaign::findOrFail($id);
        $campaign->delete();
        return response()->json(["message" => "Campaign deleted successfully"]);
    }
}
