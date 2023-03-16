<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;

trait UploadFile
{
    use SystemLog;

    /**
     * Set path root when upload file.
     */
    protected $baseDisk = 'public';

    /**
     * Set path root when unkown file.
     */
    protected $unkownPath = 'unkown';

    /**
     * Set path image folder when upload image.
     */
    protected $imagePath = 'image';

    /**
     * Set path excel folder when upload image.
     */
    protected $excelPath = 'excel';

    /**
     * Set path pdf folder when upload image.
     */
    protected $pdfPath = 'pdf';

    /**
     * Set path word folder when upload image.
     */
    protected $qrcodePath = 'qrcode';

    /**
     * Set path for storage when upload file.
     */
    protected function storageDisk($type)
    {
        try {
            if ($type == 'image') {
                return '/' . $this->baseDisk . '/' . $this->imagePath . '/';
            } elseif ($type == 'excel') {
                return '/' . $this->baseDisk . '/' . $this->excelPath . '/';
            } elseif ($type == 'pdf') {
                return '/' . $this->baseDisk . '/' . $this->pdfPath . '/';
            } elseif ($type == 'qrcode') {
                return '/' . $this->baseDisk . '/' . $this->qrcodePath . '/';
            } else {
                return '/' . $this->baseDisk . '/' . $this->unkownPath . '/';
            }
        } catch (\Throwable $th) {
            $this->sendReportLog('error', $th->getMessage());

            return null;
        }
    }

    /**
     * Transform name file
     */
    protected function transformName($file)
    {
        try {
            $name = request()->getSchemeAndHttpHost() . '/storage/image/' . $file;

            return $name;
        } catch (\Throwable $th) {
            $this->sendReportLog('error', $th->getMessage());

            return null;
        }
    }

    /**
     * Parse image name
     */
    protected function parseImage($file)
    {
        try {
            $parse = parse_url($file);
            $name = explode('/', $parse['path'])[3];

            return $name;
        } catch (\Throwable $th) {
            $this->sendReportLog('error', $th->getMessage());

            return null;
        }
    }

    /**
     * Save file in storage app
     */
    protected function putFile($type, $file)
    {
        try {
            if (auth()->check()) {
                $user = auth()->user();
                $clientCode = $user->id . '_' . $user->created_at->format('dmY');
            } else {
                $clientCode = rand(1, 999) . '_' . date('His');
            }

            $fileName = preg_replace('/\s+/', '_', uniqid() . '_' . date('dmY') . '_' . $clientCode . '.' . $file->getClientOriginalExtension());

            if ($this->checkFile($type, $fileName, true)) {
                return $this->putFile($type, $file);
            }

            $file->storeAs($this->storageDisk($type), $fileName);

            $fileName = $this->transformName($fileName);

            return $fileName;
        } catch (\Throwable $th) {
            $this->sendReportLog('error', $th->getMessage());

            return null;
        }
    }

    /**
     * Delete file in storage app
     */
    protected function deleteFile($type, $file)
    {
        try {
            if ($this->checkFile($type, $file)) {
                $parsedFile = $this->parseImage($file);

                Storage::delete($this->storageDisk($type) . $parsedFile);

                return true;
            }

            return false;
        } catch (\Throwable $th) {
            $this->sendReportLog('error', $th->getMessage());

            return false;
        }
    }

    /**
     * Check file in storage app
     */
    protected function checkFile($type, $file, $save = false)
    {
        try {
            if ($save) {
                $parsedFile = $file;
            } else {
                $parsedFile = $this->parseImage($file);
            }

            if (Storage::exists($this->storageDisk($type) . $parsedFile)) {
                return true;
            }

            return false;
        } catch (\Throwable $th) {
            $this->sendReportLog('error', $th->getMessage());

            return null;
        }
    }

    /**
     * Save single file to storage app
     */
    protected function saveSingleFile($type, $file)
    {
        try {
            if (is_null($file)) {
                return null;
            }

            return $this->putFile($type, $file);
        } catch (\Throwable $th) {
            $this->sendReportLog('error', $th->getMessage());

            return null;
        }
    }

    /**
     * Update old file with the new one
     */
    protected function updateSingleFile($type, $file, $old_file)
    {
        try {
            if (is_null($file)) {
                return null;
            }

            if (!$this->checkFile($type, $old_file)) {
                return $this->putFile($type, $file);
            }

            $this->deleteFile($type, $old_file);

            return $this->updateSingleFile($type, $file, $old_file);
        } catch (\Throwable $th) {
            $this->sendReportLog('error', $th->getMessage());

            return null;
        }
    }
}
