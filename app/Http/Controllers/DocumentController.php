<?php

namespace App\Http\Controllers;

use App\Models\ProjectInvestorDocument;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    public function investor($hash)
    {
        $error = false;
        $hashParts = explode('o', $hash);

        if (count($hashParts) !== 3) {
            abort(404, 'Invalid document link');
        }

        [$authHash, $timestamp, $documentHash] = $hashParts;

        // Validate auth hash
        if ($authHash !== sha1('jaevee')) {
            $error = true;
        }

        // Validate timestamp (expires after 1 hour)
        $now = Carbon::now();
        $expiry = Carbon::createFromTimestamp($timestamp)->addHour();

        if ($now->gt($expiry)) {
            $error = true;
        }

        if ($error) {
            abort(404, 'Document link has expired or is invalid');
        }

        // Find the document
        $document = ProjectInvestorDocument::where('hash', $documentHash)->first();

        if (!$document) {
            abort(404, 'Document not found');
        }

        // Try multiple possible file locations
        // The legacy system stores files at: /App/Cache/Docs/Investor/{proposal_id}/{hash}.pdf
        $legacyBasePath = config('app.legacy_docs_path', base_path('../jvsystem/App/Cache/Docs/Investor'));
        
        $possiblePaths = [
            // Legacy system path (if accessible from Laravel)
            $legacyBasePath . '/' . $document->proposal_id . '/' . $document->hash . '.pdf',
            // Alternative: relative to base path
            base_path('../jvsystem/App/Cache/Docs/Investor/' . $document->proposal_id . '/' . $document->hash . '.pdf'),
            // Alternative: absolute path if jvsystem is in parent directory
            dirname(base_path()) . '/jvsystem/App/Cache/Docs/Investor/' . $document->proposal_id . '/' . $document->hash . '.pdf',
            // If stored in Laravel storage
            storage_path('app/documents/investor/' . $document->proposal_id . '/' . $document->hash . '.pdf'),
        ];

        $filePath = null;
        foreach ($possiblePaths as $path) {
            if (file_exists($path)) {
                $filePath = $path;
                break;
            }
        }

        if (!$filePath || !file_exists($filePath)) {
            abort(404, 'Document file not found on server');
        }

        $fileName = ($document->name ?? 'document') . '.pdf';
        if (!str_ends_with(strtolower($fileName), '.pdf')) {
            $fileName .= '.pdf';
        }

        return response()->file($filePath, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="' . $fileName . '"',
        ]);
    }
}

