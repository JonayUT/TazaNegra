<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class InstagramController extends Controller
{
    public function getInstagramFeed()
    {
        try {
            $businessId = env('INSTAGRAM_BUSINESS_ID');
            $accessToken = env('INSTAGRAM_ACCESS_TOKEN');

            if (!$businessId || !$accessToken) {
                Log::error('Faltan variables de entorno para Instagram.');
                return [];
            }

            $url = "https://graph.instagram.com/{$businessId}/media?fields=id,caption,media_type,media_url,permalink&access_token={$accessToken}";

            $response = Http::get($url);

            if ($response->successful()) {
                return $response->json()['data'] ?? [];
            }

            Log::error('Error en respuesta de Instagram', ['status' => $response->status(), 'body' => $response->json()]);
            return [];
        } catch (\Exception $e) {
            Log::error('Excepción al obtener feed de Instagram: ' . $e->getMessage());
            return [];
        }
    }
}